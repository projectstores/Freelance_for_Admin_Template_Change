<?php

namespace App\Http\Livewire\Main\Seller\Home;

use DB;
use App\Models\Gig;
use App\Models\Project;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\ProjectBid;
use WireUi\Traits\Actions;
use App\Models\ProjectMilestone;
use App\Models\ChMessage as Message;
use App\Models\CustomOffer;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class HomeComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $earnings              = 0;
    public $total_reach           = 0;
    public $total_gigs            = 0;
    public $awarded_projects      = 0;
    public $completed_orders      = 0;
    public $pending_orders        = 0;
    public $orders_under_progress = 0;
    public $canceled_orders       = 0;
    public $latest_messages       = [];
    public $latest_orders;
    public $latest_awarded_projects;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        try {
            
            // Get user id
            $user_id                           = auth()->id();

            // Calculate total earnings
            $earnings_from_gigs                = OrderItem::where('owner_id', $user_id)
                                                                ->where('is_finished', true)
                                                                ->where('status', 'delivered')
                                                                ->sum('profit_value');

            // Get total earning from projects without commission
            $earnings_from_projects_total      = ProjectMilestone::where('freelancer_id', $user_id)
                                                                ->where('status', 'paid')
                                                                ->sum('amount');

            // Get total earning from projects with commission
            $earnings_from_projects_commission = ProjectMilestone::where('freelancer_id', $user_id)
                                                                ->where('status', 'paid')
                                                                ->sum('freelancer_commission');

            // Calculate earnings from custom offers (budget)
            $earnings_from_offers_budget       = CustomOffer::where('freelancer_id', auth()->id())
                                                            ->where('payment_status', 'released')
                                                            ->sum('budget_amount');

            // Calculate earnings from custom offers (fee)
            $earnings_from_offers_fee          = CustomOffer::where('freelancer_id', auth()->id())
                                                            ->where('payment_status', 'released')
                                                            ->sum('budget_freelancer_fee');

            // Set total earnings
            $this->earnings                    = (convertToNumber($earnings_from_projects_total) - convertToNumber($earnings_from_projects_commission)) + convertToNumber($earnings_from_gigs) + ( convertToNumber($earnings_from_offers_budget) - convertToNumber($earnings_from_offers_fee) );

            // Caluclate total reach
            $this->total_reach                 = Gig::where('user_id', $user_id)->sum('counter_impressions');

            // Calculate total gigs
            $this->total_gigs                  = Gig::where('user_id', $user_id)->count();

            // Calculate awarded projects
            $this->awarded_projects            = ProjectBid::where('user_id', $user_id)
                                                                ->where('is_awarded', true)
                                                                ->where('is_freelancer_accepted', true)
                                                                ->count();

            // Calculate completed orders
            $this->completed_orders            = OrderItem::where('owner_id', $user_id)
                                                                ->where('status', 'delivered')
                                                                ->where('is_finished', true)
                                                                ->count();

            // Calculate pending orders
            $this->pending_orders              = OrderItem::where('owner_id', $user_id)
                                                                ->where('status', 'pending')
                                                                ->count();

            // Calculate order under progress
            $this->orders_under_progress       = OrderItem::where('owner_id', $user_id)
                                                                ->where('status', 'proceeded')
                                                                ->count();

            // Canceled orders
            $this->canceled_orders             = OrderItem::where('owner_id', $user_id)
                                                                ->where('status', 'canceled')
                                                                ->count();

            // Get latest contacts
            $contacts                          = Message::join('users',  function ($join) {
                                                                    $join->on('ch_messages.from_id', '=', 'users.id')
                                                                        ->orOn('ch_messages.to_id', '=', 'users.id');
                                                                })
                                                                ->where(function ($q) use ($user_id) {
                                                                    $q->where('ch_messages.from_id', $user_id)
                                                                    ->orWhere('ch_messages.to_id', $user_id);
                                                                })
                                                                ->with('avatar')
                                                                ->where('users.id', '!=', $user_id)
                                                                ->select('users.*', DB::raw('MAX(ch_messages.created_at) max_created_at'))
                                                                ->orderBy('max_created_at', 'desc')
                                                                ->groupBy('users.id')
                                                                ->take(6)
                                                                ->get();

            // Loop through contacts
            foreach ($contacts as $contact) {

                // Get latest message
                $latest_message = Message::where('from_id', $contact->id)
                                         ->where('to_id', $user_id)
                                         ->where('seen', false)
                                         ->latest()
                                         ->first();  

                // Check if message exists
                if ($latest_message) {

                    // Add formatted message to list
                    array_push($this->latest_messages, [
                        'uid'      => strtolower($contact->uid),
                        'username' => $contact->username,
                        'avatar'   => src($contact->avatar),
                        'message'  => [
                            'body'       => $latest_message->body,
                            'attachment' => $latest_message->attachment ? true : false,
                        ]
                    ]);

                }

            }

            // Get latest orders
            $this->latest_orders = OrderItem::where('owner_id', $user_id)
                                            ->whereHas('gig', function($query) {
                                                return $query->whereHas('category');
                                            })
                                            ->latest()
                                            ->take(8)
                                            ->get();

            // Check if projects enabled
            if (settings('projects')->is_enabled) {

                // Get latest awarded projects
                $this->latest_awarded_projects = Project::whereHas('bids', function($query) use ($user_id) {
                                                            return $query->where('user_id', $user_id)
                                                                        ->whereIsAwarded(true)
                                                                        ->whereStatus('active')
                                                                        ->latest('updated_at');
                                                        })
                                                        ->where('awarded_freelancer_id', $user_id)
                                                        ->whereIn('status', ['active', 'completed', 'under_development', 'pending_final_review', 'incomplete', 'closed'])
                                                        ->take(8)
                                                        ->get();

            } else {

                // Not enabled
                $this->latest_awarded_projects = null;

            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_seller_dashboard') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.seller.home.home')->extends('livewire.main.seller.layout.app')->section('content');
    }
    
}