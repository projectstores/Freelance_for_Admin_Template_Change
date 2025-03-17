<?php

namespace App\Http\Livewire\Main\Seller\Projects\Bids\Options;

use App\Models\Admin;
use Livewire\Component;
use App\Models\ProjectBid;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\ProjectBidUpgrade;
use App\Models\ProjectBiddingPlan;
use App\Notifications\Admin\BidPendingApproval;
use App\Http\Validators\Main\Project\BidValidator;
use App\Notifications\User\Everyone\NewBidReceived;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $bid;

    // Form
    public $bid_amount;
    public $bid_amount_paid;
    public $bid_days;
    public $bid_description;
    public $bid_sponsored;
    public $bid_sealed;
    public $bid_highlight;
    public $can_promote = false;

    /**
     * Initialize component
     *
     * @return mixed
     */
    public function mount($id)
    {
        // Get settings
        $settings = settings('projects');

        // Check if this section enabled
        if (!$settings->is_enabled) {
        
            // Redirect to home page
            return redirect('/');

        }

        // Get bid
        $bid       = ProjectBid::where('uid', $id)
                                ->where('user_id', auth()->id())
                                ->whereIn('status', ['active', 'rejected', 'pending_approval', 'pending_payment'])
                                ->where('is_awarded', false)
                                ->whereHas('project', function($query) {
                                    return $query->where('status', 'active')
                                                ->where('awarded_bid_id', null);
                                })
                                ->firstOrFail();

        // Set bid
        $this->bid = $bid;

        // Check if commission type
        if ($settings->commission_type === 'fixed') {
            
            // Set amount paid to the freelancer (Fixed amount)
            $bid_amount_paid = convertToNumber($bid->amount) - convertToNumber($settings->commission_from_freelancer);

        } else {

            // Set amount paid to the freelancer (Percentage amount)
            $bid_amount_paid = convertToNumber($bid->amount) - ((convertToNumber($settings->commission_from_freelancer) / 100) * convertToNumber($bid->amount));

        }

        // Fill form
        $this->fill([
            'bid_amount'      => $bid->amount,
            'bid_amount_paid' => $bid_amount_paid,
            'bid_days'        => $bid->days,
            'bid_description' => $bid->message
        ]);

        // Check if user can promote this bid
        $this->can_promote = $this->checkPromoting();
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
        $title       = __('messages.t_edit_my_proposal') . " $separator " . settings('general')->title;
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

        return view('livewire.main.seller.projects.bids.options.edit', [
            'plans' => $this->plans
        ])->extends('livewire.main.seller.layout.app')->section('content');
    }


    /**
     * Get bidding plans
     *
     * @return mixed
     */
    public function getPlansProperty()
    {
        // Check if promoting bids allowed
        if (settings('projects')->is_premium_bidding) {

            // Don't get sponsored plan, if already has a sponsored bid
            // Because only one sponsored bid is allowed
            if ($this->hasSponsoredBid()) {
                
                // Get plans without sponsored
                return ProjectBiddingPlan::where('is_active', true)->where('plan_type', '!=', 'sponsored')->get();

            }

            // Return all plans, no sponsored bid yet
            return ProjectBiddingPlan::where('is_active', true)->get();

        } else {

            // Promoting not enabled
            return null;

        }
    }

    
    /**
     * Update bid
     *
     * @return void
     */
    public function update()
    {
        try {
            
            // Get settings
            $settings = settings('projects');

            // Check if this section enabled
            if (!$settings->is_enabled) {
            
                // Redirect to home page
                return redirect('/');

            }

            // Get bid
            $bid = ProjectBid::where('uid', $this->bid->uid)
                                ->with('project')
                                ->where('user_id', auth()->id())
                                ->whereIn('status', ['active', 'rejected', 'pending_approval', 'pending_payment'])
                                ->where('is_awarded', false)
                                ->whereHas('project', function($query) {
                                    return $query->where('status', 'active')
                                                ->where('awarded_bid_id', null);
                                })
                                ->firstOrFail();

            // Validate form
            BidValidator::validate($this);

            // Bid amount must be between project's budget
            if (convertToNumber($this->bid_amount) < convertToNumber($bid->project->budget_min) || convertToNumber($this->bid_amount) > convertToNumber($bid->project->budget_max) ) {
                    
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_pls_insert_bid_value_between_budget'),
                    'icon'        => 'error'
                ]);
                
                return;

            }

            // Check if promoting bids enabled
            if ($settings->is_premium_bidding && $this->can_promote) {
                
                // Check if user selected sealed upgrade
                if ($this->bid_sealed) {
                    
                    // Get sealed upgrade
                    $upgrade_sealed = ProjectBiddingPlan::whereUid($this->bid_sealed)->wherePlanType('sealed')->first();
    
                } else {
    
                    // Not selected
                    $upgrade_sealed = null;
    
                }
    
                // Check if user selected sponsored upgrade
                if ($this->bid_sponsored && !$this->hasSponsoredBid()) {
                    
                    // Get sponsored upgrade
                    $upgrade_sponsored = ProjectBiddingPlan::whereUid($this->bid_sponsored)->wherePlanType('sponsored')->first();
    
                } else {
    
                    // Not selected
                    $upgrade_sponsored = null;
    
                }
    
                // Check if user selected highlight upgrade
                if ($this->bid_highlight) {
                    
                    // Get highlight upgrade
                    $upgrade_highlight = ProjectBiddingPlan::whereUid($this->bid_highlight)->wherePlanType('highlight')->first();
    
                } else {
    
                    // Not selected
                    $upgrade_highlight = null;
    
                }
    
            } else {
    
                // Not enabled, so not upgrades
                $upgrade_sponsored = null;
                $upgrade_sealed    = null;
                $upgrade_highlight = null;
    
            }
    
            // Get status of this bid
            if ($settings->is_premium_bidding && $this->can_promote && ($upgrade_sponsored || $upgrade_sealed || $upgrade_highlight)) {
    
                // Pending payment
                $status = 'pending_payment';
    
            } else if (!$settings->auto_approve_bids) {
                
                // Pending approval
                $status = 'pending_approval';
    
            } else {
    
                // Active
                $status = 'active';
    
            }

            // Update bid
            $bid->amount       = $this->bid_amount;
            $bid->days         = $this->bid_days;
            $bid->message      = clean($this->bid_description);
            $bid->is_sponsored = $upgrade_sponsored ? true : $bid->is_sponsored;
            $bid->is_sealed    = $upgrade_sealed ? true : $bid->is_sealed;
            $bid->is_highlight = $upgrade_highlight ? true : $bid->is_highlight;
            $bid->status       = $status;
            $bid->save();

            // If pending payment, we have to create a payment link
            if ($status === 'pending_payment') {

                // Set empty amount variable
                $amount = 0;
                
                // Let's check if there is sealed upgrade selected
                if ($upgrade_sealed) {
                    $amount += convertToNumber($upgrade_sealed->price);
                }
    
                // Let's check if there is sponsored upgrade selected
                if ($upgrade_sponsored) {
                    $amount += convertToNumber($upgrade_sponsored->price);
                }
    
                // Let's check if there is highlight upgrade selected
                if ($upgrade_highlight) {
                    $amount += convertToNumber($upgrade_highlight->price);
                }
    
                // Generate payment id
                $payment_id      = Str::uuid()->toString();
    
                // Set payment
                $payment         = new ProjectBidUpgrade();
                $payment->bid_id = $bid->id;
                $payment->uid    = $payment_id;
                $payment->amount = $amount;
                $payment->save();
    
            } else {
    
                // No payment
                $payment = null;
    
            }

            // Send notification to employer
            notification([
                'text'    => 't_u_received_new_bid_on_ur_project',
                'action'  => url('project/' . $bid->project->pid . '/' . $bid->project->slug),
                'user_id' => $bid->project->user_id
            ]);
    
            // Send a notification via email to the employer
            $bid->project->client->notify(new NewBidReceived($bid, $bid->project));
    
            // Send notification to admin if bid pending approval
            if ($bid->status === 'pending_approval') {
                
                // Send notification
                Admin::first()->notify(new BidPendingApproval($bid));

                // Set message
                $message = __('messages.t_ur_bid_has_been_posted_pending_approval');
    
            } else {

                // Set message
                $message = __('messages.t_ur_bid_has_been_posted');

            }

            // Check if has to pay for upgrades
            if ($payment) {
                
                // Go to checkout
                return redirect('seller/projects/bids/checkout/' . $payment->uid);

            }

            // Go back to bids
            return redirect('seller/projects/bids')->with('success', $message);
            
        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Check if this project has a sponsored bid
     *
     * @return boolean
     */
    private function hasSponsoredBid()
    {
        // Get any sponsored active bid
        $bid = ProjectBid::where('project_id', $this->bid->project->id)
                         ->where('is_sponsored', true)
                         ->where('status', 'active')
                         ->where('id', '!=', $this->bid->id)
                         ->first();

        // Return 
        return $bid ? $bid : false;
    }


    /**
     * Check if user can promote his bid
     *
     * @return boolean
     */
    private function checkPromoting() : bool
    {
        try {
            
            // Check if project has a sponsored bid
            if (!$this->hasSponsoredBid() && (!$this->bid->is_sponsored || !$this->bid->is_sealed || !$this->bid->is_highlight)) {
                return true;
            } else {
                return false;
            }

        } catch (\Throwable $th) {
            
            // Error
            return true;
            
        }
    }
}