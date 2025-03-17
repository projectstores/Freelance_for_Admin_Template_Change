<?php

namespace App\Http\Livewire\Main\Service;

use DB;
use App\Models\Gig;
use App\Models\Review;
use Livewire\Component;
use App\Models\Favorite;
use App\Models\GigUpgrade;
use WireUi\Traits\Actions;
use App\Models\Order;
use App\Models\ReportedGig;
use App\Jobs\Main\Service\Track;
use App\Models\UserAvailability;
use App\Models\User;
use App\Http\Validators\Main\Service\ReportValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ServiceComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $all_reviews;
    public $gig;
    public $reason;
    public $upgrades   = [];
    public $quantity   = 1;
    public $inFavorite = false;
    public $related_gigs;
    public $user_rating        = [
        'value'   => 0,
        'total'   => 0,
        'stars_5' => 0,
        'stars_4' => 0,
        'stars_3' => 0,
        'stars_2' => 0,
        'stars_1' => 0,
    ];
    public $user;

    /**
     * Init component
     *
     * @return void
     */
    public function mount($slug)
    {
        // Get gig
        $gig              = Gig::where('slug', $slug)->firstOrFail();
            
        // Set gig
        $this->gig        = $gig;

        // Admin can access
        if (auth('admin')->check()) {

            $this->setGig();

        } else if ($gig->status == 'pending' && auth()->check() && auth()->id() == $gig->user_id ) {
            
            $this->setGig();

        } else if (in_array($gig->status, ['active', 'featured', 'boosted', 'trending'])) {
            
            $this->setGig();

        } else {

            // Error
            abort(404);

        }

        // Get availability
        $availability = $gig->owner->availability()
                                    ->where('expected_available_date', '<=', now())
                                    ->first();

        // Check if user is unavailable
        if ($availability) {
            
            // Delete it
            $availability->delete();

        }
        
        // Get user
        $user                = User::where('username', $gig->owner->username)->whereIn('status', ['verified', 'active'])->firstOrFail();
        
        // Set user
        $this->user          = $user;

        // Check if people keep coming to this freelancer
        if ($user->account_type === 'seller') {
            
            // Checking
            $seller_loyalty               = Order::whereHas('items', function($query) use ($user) {
                                                        return $query->where('owner_id', $user->id);
                                                    })
                                                    ->selectRaw('count(`buyer_id`) as `buyers`')
                                                    ->groupBy('buyer_id')
                                                    ->having('buyers', '>', 1)
                                                    ->count();

            // Set seller loyalty
            $this->seller_loyalty         = $seller_loyalty >= 1 ? true : false;

            // Get user rating value
            $user_rating_value            = $user->rating();

            // Set new user rating query
            $user_rating_query            = $user->reviews()
                                                    ->where('status', 'active')
                                                    ->select('rating',DB::raw('count(id)  as total_reviews'))
                                                    ->groupBy('rating')
                                                    ->get()
                                                    ->toArray();

            // Count total reviews
            $user_total_reviews           = array_sum( array_column($user_rating_query, 'total_reviews') );

            // Get stars keys
            $stars_5_key                  = array_search(5, array_column($user_rating_query, "rating"));
            $stars_4_key                  = array_search(4, array_column($user_rating_query, "rating"));
            $stars_3_key                  = array_search(3, array_column($user_rating_query, "rating"));
            $stars_2_key                  = array_search(2, array_column($user_rating_query, "rating"));
            $stars_1_key                  = array_search(1, array_column($user_rating_query, "rating"));

            // Set user rating values
            $this->user_rating['value']   = $user_rating_value + 0;
            $this->user_rating['total']   = $user_total_reviews;

            $this->user_rating['stars_5'] =  $stars_5_key !== false && isset($user_rating_query[$stars_5_key]) ? $user_rating_query[$stars_5_key]['total_reviews'] : 0;
            $this->user_rating['stars_4'] =  $stars_4_key !== false && isset($user_rating_query[$stars_4_key]) ? $user_rating_query[$stars_4_key]['total_reviews'] : 0;
            $this->user_rating['stars_3'] =  $stars_3_key !== false && isset($user_rating_query[$stars_3_key]) ? $user_rating_query[$stars_3_key]['total_reviews'] : 0;
            $this->user_rating['stars_2'] =  $stars_2_key !== false && isset($user_rating_query[$stars_2_key]) ? $user_rating_query[$stars_2_key]['total_reviews'] : 0;
            $this->user_rating['stars_1'] =  $stars_1_key !== false && isset($user_rating_query[$stars_1_key]) ? $user_rating_query[$stars_1_key]['total_reviews'] : 0;

        }
        
        $this->all_reviews = Review::where('seller_id', $gig->user_id)
                     ->orderBy('created_at', 'desc')
                     ->get();
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
        if ($this->gig->seo) {
            
            $title       = $this->gig->seo->title . " $separator " . settings('general')->title;
            $description = $this->gig->seo->description;

        } else {

            $title       = $this->gig->title . " $separator " . settings('general')->title;
            $description = settings('seo')->description;

        }
        
        $ogimage     = src( $this->gig->imageLarge );

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

        return view('livewire.main.service.service')->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Report this gig
     *
     * @return void
     */
    public function report()
    {
        // Validate form
        try {

            // Must be login
            if (auth()->guest()) {
                
                // Please login to report this gig
                $this->notification([
                    'title'       => __('messages.t_info'),
                    'description' => __('messages.t_pls_login_or_register_to_report_this_gig'),
                    'icon'        => 'info'
                ]);

                return;

            }

            // Gig owner cannot report his own gig
            if ($this->gig->user_id === auth()->id()) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_info'),
                    'description' => __('messages.t_gig_owner_cant_report_his_gig'),
                    'icon'        => 'info'
                ]);

                return;

            }

            // Validate form
            ReportValidator::validate($this);

            // Check if user already reported this gig
            $already_reported = ReportedGig::where('gig_id', $this->gig->id)
                                            ->where('user_id', auth()->id())
                                            ->first();

            // Check
            if ($already_reported) {
            
                // Reset form
                $this->reset('reason');

                // Error
                $this->notification([
                    'title'       => __('messages.t_info'),
                    'description' => __('messages.t_looks_like_alrdy_reported_this_gig'),
                    'icon'        => 'info'
                ]);

                return;

            }

            // Now save report
            ReportedGig::create([
                'gig_id'  => $this->gig->id,
                'user_id' => auth()->id(),
                'reason'  => clean($this->reason)
            ]);

            // Reset form
            $this->reset('reason');

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modals-report-container');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_gig_reported_successfully'),
                'icon'        => 'success'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_pricing',
                'component' => $this->id
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_pricing',
                'component' => $this->id
            ]);

            throw $th;

        }
    }


    /**
     * Add gig to cart
     *
     * @return void
     */
    public function addToCart()
    {
        try {
            
            // Get seller availability
            $availability = UserAvailability::where('user_id', $this->gig->user_id)->first();

            // Check if seller available to receive orders
            if ($availability) {
                
                // Not in range
                $this->notification([
                    'title'       => __('messages.t_error'),
                    "description" => __('messages.t_seller_wont_be_able_to_receive_orders_date_no_html', ['date' => format_date($availability->expected_available_date, config('carbon-formats.F_j,_Y'))]),
                    'icon'        => 'error'
                ]);

                return;

            }

            // You can't add your own gigs
            if (auth()->check() && auth()->id() === $this->gig->user_id) {
                
                // Not in range
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_cant_add_ur_own_gigs_to_shopping_cart'),
                    'icon'        => 'error'
                ]);

                return;

            }
            
            // Quantity must be between 1 and 10
            if (!in_array($this->quantity, range(1, 10))) {
                
                // Not in range
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_selected_quantity_is_not_correct'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Get cart
            $cart = session('cart', []);

            // Get items ids from this cart
            $ids  = array_column($cart, 'id');

            // Check if this gig already exists in cart
            if (in_array($this->gig->uid, $ids)) {
                
                // Remove item
                foreach ($cart as $key => $value) {
                    if ($value['id'] === $this->gig->uid) {
                        // Remove item from cart
                        unset($cart[$key]);

                        // Break
                        break;
                    }
                }

                // Refresh cart
                array_merge($cart);

            }

            // Item not exist in cart, set it
            $item                     = [];

            // Set gig uid
            $item['id']               = $this->gig->uid;

            // Set quantity
            $item['quantity']         = (int) $this->quantity;

            // Set gig
            $item['gig']['title']     = $this->gig->title;
            $item['gig']['slug']      = $this->gig->slug;
            $item['gig']['price']     = $this->gig->price;
            $item['gig']['delivery']  = $this->gig->delivery_time;
            $item['gig']['thumbnail'] = src($this->gig->thumbnail);
            $item['upgrades']         = [];

            // Check if has upgrades
            if (is_array($this->upgrades) && count($this->upgrades)) {
                
                // Loop through upgrades
                foreach ($this->upgrades as $key => $upgrade_id) {
                    
                    // Get upgrade
                    $upgrade = GigUpgrade::where('uid', $upgrade_id)->where('gig_id', $this->gig->id)->first();

                    // Check if upgrade exists
                    if ($upgrade) {
                        
                        // Add upgrade to cart
                        $item['upgrades'][$key]['id']       = $upgrade->uid;
                        $item['upgrades'][$key]['title']    = $upgrade->title;
                        $item['upgrades'][$key]['price']    = $upgrade->price;
                        $item['upgrades'][$key]['delivery'] = $upgrade->extra_days;
                        $item['upgrades'][$key]['checked']  = 1;

                    }

                }

            }

            // Add item to cart
            array_push($cart, $item);

            // Refresh cart
            array_merge($cart);

            // Update cart
            session()->put('cart', $cart);

            // Product added to cart successfully
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_gig_added_to_ur_cart'),
                'icon'        => 'success'
            ]);
            
            // Update cart
            $this->dispatchBrowserEvent('cart-updated');

        } catch (\Throwable $th) {
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);
        }
    }


    /**
     * Check if gig in favorite
     *
     * @return boolean
     */
    private function inFavorite()
    {
        // Check if auth connected
        if (auth()->guest()) {
            return false;
        }

        // Check if user is the owner of this gig
        if (auth()->id() === $this->gig?->user_id) {
            return false;
        }

        // Get favorite
        $favorite = Favorite::where('gig_id', $this->gig->id)->where('user_id', auth()->id())->first();

        // Check if gig in favorite
        if ($favorite) {
            return true;
        }

        // Not in favorite
        return false;
    }


    /**
     * Add gig to favorite list
     *
     * @return void
     */
    public function addToFavorite()
    {
        try {
            
            // User must login first
            if (auth()->guest()) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_pls_login_or_register_to_add_to_favovorite'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Check if gig already in favorite
            $in_favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $this->gig->id)->first();

            // Check if already exists
            if ($in_favorite) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_this_gig_already_in_favorite_list'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Add to list
            Favorite::create([
                'gig_id'  => $this->gig->id,
                'user_id' => auth()->id()
            ]);

            // Set status
            $this->inFavorite = true;

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_gig_has_been_added_to_favorite_list'),
                'icon'        => 'success'
            ]);

        } catch (\Throwable $th) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Remove gig from favorite list
     *
     * @return void
     */
    public function removeFromFavorite()
    {
        try {

            // Check if gig already in favorite
            $favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $this->gig->id)->first();

            // Check if already exists
            if ($favorite) {
                
                // Delete
                $favorite->delete();

                // Update status
                $this->inFavorite = false;

                // Success
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_gig_removed_from_ur_favorite_list'),
                    'icon'        => 'success'
                ]);

            }

        } catch (\Throwable $th) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Get related gigs
     *
     * @return object
     */
    private function relatedGigs()
    {
        // Get related gigs
        $gigs = Gig::where(function($query) {
                        return $query->where('title', 'LIKE', "%{$this->gig->title}%")
                                     ->orWhere('description', 'LIKE', "%{$this->gig->title}%")
                                     ->orWhere('description', 'LIKE', "%{$this->gig->description}%")
                                     ->orWhere('description', 'LIKE', "%{$this->gig->title}%")
                                     ->orWhere('subcategory_id', $this->gig->subcategory_id);
                    })
                    ->where('id', '!=', $this->gig->id)
                    ->active()
                    ->orderByRaw('RAND()')
                    ->limit(40)
                    ->get();

        // Return related gigs
        return $gigs;
    }


    /**
     * Set gig
     *
     * @return void
     */
    protected function setGig()
    {
        // Check if this gig in favorite
        $this->inFavorite = $this->inFavorite();

        // Track this visit
        Track::dispatch([
            'gig_id'       => $this->gig->id,
            'ip'           => request()->ip(),
            'ua'           => request()->server('HTTP_USER_AGENT'),
            'language'     => request()->server('HTTP_ACCEPT_LANGUAGE'),
            'utm_medium'   => request()->get('utm_medium') ? str_replace(array(':', '\\', '/', '*', ',', '"', "'", ";"), ' ', mb_convert_encoding(request()->get('utm_medium'), 'UTF-8', 'UTF-8')) : null,
            'utm_source'   => request()->get('utm_source') ? str_replace(array(':', '\\', '/', '*', ',', '"', "'", ";"), ' ', mb_convert_encoding(request()->get('utm_source'), 'UTF-8', 'UTF-8')) : null,
            'utm_campaign' => request()->get('utm_campaign') ? str_replace(array(':', '\\', '/', '*', ',', '"', "'", ";"), ' ', mb_convert_encoding(request()->get('utm_campaign'), 'UTF-8', 'UTF-8')) : null,
            'queries'      => count(request()->all()) ? http_build_query(request()->all()) : null,
            'referrer'     => request()->headers->get('referer') ? request()->headers->get('referer') : null,
        ]);

        // Get related gigs
        $this->related_gigs = $this->relatedGigs();
    }
    
}
