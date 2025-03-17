<?php

namespace App\Http\Livewire\Main\Profile;

use DB;
use App\Models\Gig;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use WireUi\Traits\Actions;
use App\Models\CustomOffer;
use Illuminate\Support\Str;
use App\Models\ReportedUser;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\CustomOfferAttachment;
use App\Notifications\Admin\ProfileReported;
use App\Notifications\Admin\NewCustomOfferPending;
use App\Http\Validators\Main\Profile\OfferValidator;
use App\Http\Validators\Main\Profile\ReportValidator;
use App\Notifications\User\Freelancer\NewOfferReceived;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ProfileComponent extends Component
{
    use WithPagination, WithFileUploads, SEOToolsTrait, Actions;

    public $user;
    public $reason;
    public $last_delivery;
    public $gigs_per_page      = 6;
    public $seller_loyalty     = false;
    public $user_rating        = [
        'value'   => 0,
        'total'   => 0,
        'stars_5' => 0,
        'stars_4' => 0,
        'stars_3' => 0,
        'stars_2' => 0,
        'stars_1' => 0,
    ];

    // Custom offer form
    public $budget;
    public $message;
    public $expected_duration;
    public $attachments = [];


    /**
     * Init component
     *
     * @return void
     */
    public function mount($username)
    {
        // Get user
        $user                = User::where('username', $username)->whereIn('status', ['verified', 'active'])->firstOrFail();

        // Set user
        $this->user          = $user;

        // Set last delivery date
        $this->last_delivery = $this->getLastDelivery();

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

        // Get availability
        $availability = $user->availability()
                            ->where('expected_available_date', '<=', now())
                            ->first();

        // Check if user is unavailable
        if ($availability) {
            
            // Delete it
            $availability->delete();

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
        $title       = $this->user->username . " $separator " . settings('general')->title;
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

        return view('livewire.main.profile.profile', [
            'gigs' => $this->gigs
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get user's gigs
     *
     * @return object
     */
    public function getGigsProperty()
    {
        return Gig::where('user_id', $this->user->id)
                    ->active()
                    ->latest()
                    ->select('id', 'uid', 'title', 'slug', 'delivery_time', 'counter_reviews', 'price', 'rating', 'image_thumb_id')
                    ->with(['thumbnail' => function($query) {
                        return $query->select('id', 'file_folder', 'uid', 'file_extension');
                    }])
                    ->paginate($this->gigs_per_page);
    }


    /**
     * Report this profile
     *
     * @return void
     */
    public function report()
    {
        try {

            // User must be online
            if (auth()->guest()) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_info'),
                    'description' => __('messages.t_u_must_login_to_report_this_profile'),
                    'icon'        => 'info'
                ]);

                return;

            }

            // Can't report your own profile
            if (auth()->id() === $this->user->id) {
                return;
            }

            // Validate form
            ReportValidator::validate($this);

            // Report profile
            $report = ReportedUser::updateOrCreate(
                ['reporter_id' => auth()->id(), 'reported_id' => $this->user->id],
                [
                    'ip_address' => request()->ip(),
                    'reason'     => clean($this->reason),
                    'seen'       => false
                ]
            );

            // Send notification to admin
            Admin::first()->notify( (new ProfileReported($this->user))->locale(config('app.locale')) );

            // Reset reason
            $this->reset('reason');

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-report-container');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_profile_has_been_successfully_reported'),
                'icon'        => 'success'
            ]);

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
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            throw $th;

        }
    }


    /**
     * Get last delivered item
     *
     * @return mixed
     */
    public function getLastDelivery()
    {
        // Get last delivery item
        $item = OrderItem::where('owner_id', $this->user->id)->where('status', 'delivered')->latest()->first();

        // Check if user has item
        if ($item) {
            return $item->delivered_at;
        }

        // No item found
        return null;
    }


    /**
     * Get next page of gigs
     *
     * @return void
     */
    public function loadMoreGigs()
    {
        $this->gigs_per_page += 6;
    }


    /**
     * Send a custom offer to the freelancer
     *
     * @return mixed
     */
    public function sendCustomOffer()
    {
        try {

            // User must be authenticated
            if (!auth()->check()) {
                return;
            }
            
            // Get settings
            $settings = settings('publish');

            // Check if custom offers enabled
            if (!$settings->enable_custom_offers) {
                return;
            }

            // Validate form
            OfferValidator::validate($this);

            // User must be a freelancer
            if ($this->user->account_type !== 'seller') {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_cannot_submit_custom_offer_to_this_user'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Let's check if user available
            if ($this->user->availability) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_this_user_is_not_available_right_now_msg', ['date' => $this->user->availability->expected_available_date]),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Get commission from the freelancer
            if ($settings->custom_offers_commission_value_freelancer > 0) {
                
                // Check commission type
                if ($settings->custom_offers_commission_type === 'percentage') {
                    
                    // Set commission
                    $budget_freelancer_fee = ($settings->custom_offers_commission_value_freelancer / 100) * convertToNumber($this->budget);

                } else {

                    // Set commission
                    $budget_freelancer_fee = $settings->custom_offers_commission_value_freelancer;

                }

            } else {

                // No commission
                $budget_freelancer_fee = 0;

            }

            // Get commission from the buyer
            if ($settings->custom_offers_commission_value_buyer > 0) {
                
                // Check commission type
                if ($settings->custom_offers_commission_type === 'percentage') {
                    
                    // Set commission
                    $budget_buyer_fee = ($settings->custom_offers_commission_value_buyer / 100) * convertToNumber($this->budget);

                } else {

                    // Set commission
                    $budget_buyer_fee = $settings->custom_offers_commission_value_buyer;

                }

            } else {

                // No commission
                $budget_buyer_fee = 0;

            }

            // Create a new offer
            $offer                        = new CustomOffer();
            $offer->uid                   = uid();
            $offer->freelancer_id         = $this->user->id;
            $offer->buyer_id              = auth()->id();
            $offer->message               = clean($this->message);
            $offer->budget_amount         = $this->budget;
            $offer->budget_buyer_fee      = $budget_buyer_fee;
            $offer->budget_freelancer_fee = $budget_freelancer_fee;
            $offer->delivery_time         = $this->expected_duration;
            $offer->freelancer_status     = "pending";
            $offer->admin_status          = $settings->custom_offers_require_approval ? 'pending' : 'approved';
            $offer->expires_at            = now()->addDays($settings->custom_offers_expiry_days);
            $offer->save();

            // Upload attachments
            if (count($this->attachments)) {
                
                // Loop through attachments
                foreach ($this->attachments as $file) {
                    
                    // Set attachment unique id
                    $attachment_uid            = Str::uuid();

                    // Get attachment name
                    $attachment_original_title = substr(htmlentities(trim(clean($file->getClientOriginalName())), ENT_QUOTES, 'UTF-8'), 0, 300);

                    // Set new name for this attachment
                    $attachment_new_title      = $attachment_uid . "." . $file->extension();

                    // Upload attachment and store the new name
                    $file->storeAs('offers-attachments', $attachment_new_title, 'custom');

                    // Save file in database
                    $offer_attachment                     = new CustomOfferAttachment();
                    $offer_attachment->offer_id           = $offer->id;
                    $offer_attachment->uid                = $attachment_uid;
                    $offer_attachment->file_original_name = $attachment_original_title;
                    $offer_attachment->file_size          = $file->getSize();
                    $offer_attachment->file_extension     = $file->extension();
                    $offer_attachment->file_mime          = $file->getMimeType();
                    $offer_attachment->save();

                }

            }


            // Send email to admin if offer pending approval
            if ($offer->admin_status === 'pending') {
                
                // Send the notification
                Admin::first()->notify(new NewCustomOfferPending($offer));

                // Success message
                $success_msg = __('messages.t_ur_custom_offer_has_been_sent_pending_admin_approval');

            } else {

                // Set success message
                $success_msg = __('messages.t_ur_custom_offer_has_been_sent_to_freelancer');

                // Send a notification to the freelancer via webapp
                notification([
                    'text'    => 't_a_new_custom_offer_received',
                    'action'  => url('seller/offers'),
                    'user_id' => $this->user->id
                ]);

                // Send a new notification via email
                $this->user->notify(new NewOfferReceived($offer));

            }

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-send-custom-offer-container');

            // Redirect to offers
            return redirect('account/offers')->with('success', $success_msg);


        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }
    
}