<?php

namespace App\Http\Livewire\Main\Account\Offers;

use File;
use App\Models\Admin;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\CustomOffer;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\CustomOfferAttachment;
use App\Notifications\Admin\NewCustomOfferPending;
use App\Notifications\User\Freelancer\OfferFunded;
use App\Notifications\User\Freelancer\NewOfferReceived;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Account\Offers\EditValidator;
use App\Notifications\User\Freelancer\OfferPaymentReleased;

class OffersComponent extends Component
{
    use WithPagination, WithFileUploads, SEOToolsTrait, Actions;

    public $edit_form = [];

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Check if custom offers enabled
        if (!settings('publish')->enable_custom_offers) {
            return redirect('/');
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
        $title       = __('messages.t_submitted_offers') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.offers.offers', [
            'offers' => $this->offers
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get list of offers
     *
     * @return object
     */
    public function getOffersProperty()
    {
        return CustomOffer::where('buyer_id', auth()->id())
                            ->whereHas('freelancer')
                            ->select('id', 'uid', 'freelancer_id', 'buyer_id', 'message', 'budget_amount', 'budget_buyer_fee', 'delivery_time', 'freelancer_status', 'admin_status as status', 'freelancer_rejection_reason', 'admin_rejection_reason as rejection_reason', 'payment_status', 'created_at as submitted_at', 'expires_at', 'delivered_at')
                            ->orderByDesc('id')
                            ->paginate(42);
    }


    /**
     * Confirm offer delete
     *
     * @param string $id
     * @return void
     */
    public function confirmDelete($id)
    {
        try {
            
            // Get offer
            $offer = CustomOffer::where('uid', $id)
                                ->where('buyer_id', auth()->id())
                                ->whereIn('admin_status', ['approved', 'rejected'])
                                ->whereIn('freelancer_status', ['pending', 'rejected', 'canceled', 'approved'])
                                ->firstOrFail();

            // Must be expired and not delivered if this case
            if (!$offer->isExpired() || $offer->isDelivered()) {
                
                // Something went wrong
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_toast_something_went_wrong'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Confirm delete
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_delete'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_this_offer') . "</div>",
                'icon'        => 'error',
                'accept'      => [
                    'label'  => __('messages.t_delete'),
                    'method' => 'delete',
                    'params' => $offer->uid,
                ],
                'reject' => [
                    'label'  => __('messages.t_cancel')
                ],
            ]);

        } catch (\Throwable $th) {

            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Delete offer
     *
     * @param string $id
     * @return void
     */
    public function delete($id)
    {
        try {
            
            // Get offer
            $offer = CustomOffer::where('uid', $id)
                                ->where('buyer_id', auth()->id())
                                ->whereIn('admin_status', ['approved', 'rejected'])
                                ->whereIn('freelancer_status', ['pending', 'rejected', 'canceled'])
                                ->with(['attachments', 'buyer', 'freelancer'])
                                ->firstOrFail();

            // Check if has attachments
            if ($offer->attachments) {
                
                // Loop through attachments
                foreach ($offer->attachments as $attachment) {
                    
                    // Get local path
                    $path = public_path("storage/offers-attachments/" . $attachment->uid . "." . $attachment->file_extension);

                    // Delete if from local storage
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    // Delete if from database
                    $attachment->delete();

                }

            }

            // Check if employer already added funds for this offer
            // In this case we have to give him back his money
            if ($offer->payment_status === 'funded') {
                
                // Update his available credits
                $offer->buyer->update([
                    'balance_available' => convertToNumber($offer->buyer->balance_available) + convertToNumber($offer->budget_amount) + convertToNumber($offer->budget_buyer_fee)
                ]);

            }

            // Delete offer
            $offer->delete();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_offer_has_been_deleted'),
                'icon'        => 'success'
            ]);

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Edit offer
     *
     * @param string $id
     * @return void
     */
    public function edit($id)
    {
        try {
            
            // Get offer
            $offer = CustomOffer::where('uid', $id)
                                ->where('buyer_id', auth()->id())
                                ->where(function($query) {
                                    return $query->where('admin_status', 'rejected')
                                                 ->orWhere('freelancer_status', 'rejected');
                                })
                                ->where('payment_status', 'pending')
                                ->firstOrFail();

            // Must not be expired and not delivered if this case
            if ($offer->isDelivered()) {
                
                // Something went wrong
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_toast_something_went_wrong'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Set form
            $this->edit_form = [
                'id'                => $offer->uid,
                'message'           => $offer->message,
                'budget'            => $offer->budget_amount,
                'expected_duration' => $offer->delivery_time,
                'attachments'       => []
            ];

            // Open modal
            $this->dispatchBrowserEvent('open-modal', 'modal-edit-custom-offer-container-' . $offer->uid);

        } catch (\Throwable $th) {

            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Update offer
     *
     * @param string $id
     * @return void
     */
    public function update()
    {
        try {
            
            // Validate form
            EditValidator::validate($this);

            // Get offer
            $offer    = CustomOffer::where('uid', $this->edit_form['id'])
                                ->where('buyer_id', auth()->id())
                                ->where(function($query) {
                                    return $query->where('admin_status', 'rejected')
                                                 ->orWhere('freelancer_status', 'rejected');
                                })
                                ->where('payment_status', 'pending')
                                ->with('freelancer')
                                ->firstOrFail();

            // Get settings
            $settings = settings('publish');

            // Must not delivered if this case
            if ($offer->isDelivered()) {
                
                // Something went wrong
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_toast_something_went_wrong'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // User must be a freelancer
            if ($offer->freelancer->account_type !== 'seller') {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_cannot_submit_custom_offer_to_this_user'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Let's check if user available
            if ($offer->freelancer->availability) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_this_user_is_not_available_right_now_msg', ['date' => $offer->freelancer->availability->expected_available_date]),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Get commission from the freelancer
            if ($settings->custom_offers_commission_value_freelancer > 0) {
                
                // Check commission type
                if ($settings->custom_offers_commission_type === 'percentage') {
                    
                    // Set commission
                    $budget_freelancer_fee = ($settings->custom_offers_commission_value_freelancer / 100) * convertToNumber($this->edit_form['budget']);

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
                    $budget_buyer_fee = ($settings->custom_offers_commission_value_buyer / 100) * convertToNumber($this->edit_form['budget']);

                } else {

                    // Set commission
                    $budget_buyer_fee = $settings->custom_offers_commission_value_buyer;

                }

            } else {

                // No commission
                $budget_buyer_fee = 0;

            }

            // Create a new offer
            $offer->message               = clean($this->edit_form['message']);
            $offer->budget_amount         = $this->edit_form['budget'];
            $offer->budget_buyer_fee      = $budget_buyer_fee;
            $offer->budget_freelancer_fee = $budget_freelancer_fee;
            $offer->delivery_time         = $this->edit_form['expected_duration'];
            $offer->freelancer_status     = "pending";
            $offer->admin_status          = $settings->custom_offers_require_approval ? 'pending' : 'approved';
            $offer->expires_at            = now()->addDays($settings->custom_offers_expiry_days);
            $offer->save();

            // Upload attachments
            if (count($this->edit_form['attachments'])) {
                
                // Loop through attachments
                foreach ($this->edit_form['attachments'] as $file) {
                    
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

            // Send a notification to the freelancer via webapp
            notification([
                'text'    => 't_a_new_custom_offer_received',
                'action'  => url('seller/offers'),
                'user_id' => $offer->freelancer->id
            ]);

            // Send a new notification via email
            $offer->freelancer->notify(new NewOfferReceived($offer));


            // Send email to admin if offer pending approval
            if ($offer->admin_status === 'pending') {
                
                // Send the notification
                Admin::first()->notify(new NewCustomOfferPending($offer));

                // Success message
                $success_msg = __('messages.t_ur_custom_offer_has_been_sent_pending_admin_approval');

            } else {

                // Set success message
                $success_msg = __('messages.t_ur_custom_offer_has_been_sent_to_freelancer');

            }

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-edit-custom-offer-container-' . $offer->uid);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => $success_msg,
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
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Confirm removing attachment
     *
     * @param string $id
     * @return void
     */
    public function confirmRemoveAttachment($id)
    {
        try {

            // Get attachment
            $attachment = CustomOfferAttachment::where('uid', $id)
                                                ->whereHas('offer', function($builder) {
                                                    return $builder->where('buyer_id', auth()->id())
                                                                    ->where(function($query) {
                                                                        return $query->where('admin_status', 'rejected')
                                                                                    ->orWhere('freelancer_status', 'rejected');
                                                                    });

                                                })
                                                ->firstOrFail();

            // Confirm delete
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_delete'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_this_attachment') . "</div>",
                'icon'        => 'error',
                'accept'      => [
                    'label'  => __('messages.t_remove'),
                    'method' => 'removeAttachment',
                    'params' => $attachment->uid,
                ],
                'reject' => [
                    'label'  => __('messages.t_cancel')
                ],
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
     * Remove attachment
     *
     * @param string $id
     * @return void
     */
    public function removeAttachment($id)
    {
        try {

            // Get attachment
            $attachment = CustomOfferAttachment::where('uid', $id)
                                                ->whereHas('offer', function($builder) {
                                                    return $builder->where('buyer_id', auth()->id())
                                                                    ->where(function($query) {
                                                                        return $query->where('admin_status', 'rejected')
                                                                                    ->orWhere('freelancer_status', 'rejected');
                                                                    });

                                                })
                                                ->firstOrFail();

            // Get attachment path
            $path       = public_path('storage/offers-attachments/' . $attachment->uid . '.' . $attachment->file_extension);

            // Check if file exists in storage
            if (File::exists($path)) {
                
                // Delete it
                File::delete($path);

            }

            // Delete it now from database
            $attachment->delete();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
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
     * Confirm adding funds to this order
     *
     * @param string $id
     * @return void
     */
    public function confirmAddFunds($id)
    {
        try {
            
            // Get offer
            $offer = CustomOffer::where('uid', $id)
                                ->where('freelancer_status', 'approved')
                                ->where('admin_status', 'approved')
                                ->where('payment_status', 'pending')
                                ->where('buyer_id', auth()->id())
                                ->firstOrFail();

            // Get user available balance
            $available_funds = auth()->user()->balance_available;

            // Get offer budget with fee
            $total_amount    = convertToNumber($offer->budget_amount) + convertToNumber($offer->budget_buyer_fee);

            // Check if user has this amount
            if ($available_funds < $total_amount) {
                
                // Confirm deposit
                $this->dialog()->confirm([
                    'title'          => '<h1 class="text-base font-bold tracking-wide -mt-1 mb-2">'. __('messages.t_insufficient_funds_in_your_account') .'</h1>',
                    'description'    => __('messages.t_employer_u_dont_have_milestone_amount'),
                    'icon'           => "exclamation",
                    'iconColor'      => "text-red-600 dark:text-secondary-400 p-1",
                    'iconBackground' => "bg-red-50 rounded-full p-3 dark:bg-secondary-700",
                    'accept'         => [
                        'label'  => __('messages.t_deposit'),
                        'method' => 'deposit',
                        'color'  => 'negative'
                    ],
                    'reject' => [
                        'label'  => __('messages.t_cancel')
                    ],
                ]);

                return;

            } else {

                // Show confirmation dialog
                $this->dialog()->confirm([
                    'title'          => '<h1 class="text-base font-bold tracking-wide">'. __('messages.t_confirm_payment') .'</h1>',
                    'description'    => "<div class='leading-relaxed'>" . __('messages.t_freelancer_wont_receive_amount_until_finish_order') . "<br></div>
                    <div class='rounded border dark:border-secondary-600 my-8'>
                    <dl class='divide-y divide-gray-200 dark:divide-gray-600'>
                        <div class='grid grid-cols-3 gap-4 py-3 px-4'>
                            <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-500 ltr:text-left rtl:text-right'>". __('messages.t_the_amount_to_be_paid_to_freelancer') ."</dt>
                            <dd class='text-sm font-semibold text-zinc-900 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>". money($offer->budget_amount, settings('currency')->code, true) ."</dd>
                        </div>  
                        <div class='grid grid-cols-3 gap-4 py-3 px-4'>
                            <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-500 ltr:text-left rtl:text-right'>". __('messages.t_fee') ."</dt>
                            <dd class='text-sm font-semibold text-green-600 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>+ ". money(convertToNumber($offer->budget_buyer_fee), settings('currency')->code, true) ."</dd>
                        </div>  
                        <div class='grid grid-cols-3 gap-4 py-3 px-4 bg-gray-100/60 dark:bg-secondary-700 rounded-b'>
                            <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-400 ltr:text-left rtl:text-right'>". __('messages.t_total') ."</dt>
                            <dd class='text-sm font-semibold text-zinc-900 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>". money($total_amount, settings('currency')->code, true) ."</dd>
                        </div>  
                    </dl>
                    </div>
                    ",
                    'icon'           => "shield-check",
                    'iconColor'      => "text-slate-500 dark:text-secondary-400 p-1",
                    'iconBackground' => "bg-slate-100 rounded-full p-3 dark:bg-secondary-700",
                    'accept'         => [
                        'label'  => __('messages.t_confirm'),
                        'method' => 'addFunds',
                        'color'  => 'secondary',
                        'params' => $offer->uid
                    ],
                    'reject' => [
                        'label'  => __('messages.t_cancel')
                    ],
                ]);

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Add funds to this order
     *
     * @param string $id
     * @return void
     */
    public function addFunds($id)
    {
        try {
            
            // Get offer
            $offer           = CustomOffer::where('uid', $id)
                                            ->where('freelancer_status', 'approved')
                                            ->where('admin_status', 'approved')
                                            ->where('payment_status', 'pending')
                                            ->where('buyer_id', auth()->id())
                                            ->with('freelancer')
                                            ->firstOrFail();

            // Get settings
            $settings        = settings('publish');

            // Get user available balance
            $available_funds = auth()->user()->balance_available;

            // Get offer budget with fee
            $total_amount    = convertToNumber($offer->budget_amount) + convertToNumber($offer->budget_buyer_fee);

            // Check if user has this amount
            if ($available_funds < $total_amount) {
                
                // Confirm deposit
                $this->dialog()->confirm([
                    'title'          => '<h1 class="text-base font-bold tracking-wide -mt-1 mb-2">'. __('messages.t_insufficient_funds_in_your_account') .'</h1>',
                    'description'    => __('messages.t_employer_u_dont_have_milestone_amount'),
                    'icon'           => "exclamation",
                    'iconColor'      => "text-red-600 dark:text-secondary-400 p-1",
                    'iconBackground' => "bg-red-50 rounded-full p-3 dark:bg-secondary-700",
                    'accept'         => [
                        'label'  => __('messages.t_deposit'),
                        'method' => 'deposit',
                        'color'  => 'negative'
                    ],
                    'reject' => [
                        'label'  => __('messages.t_cancel')
                    ],
                ]);

                return;

            } else {

                // Take money from buyer's wallet
                auth()->user()->update([
                    'balance_available' => convertToNumber(auth()->user()->balance_available) - $total_amount
                ]);

                // Update offer
                $offer->payment_status = 'funded';
                $offer->expires_at     = now()->addDays($settings->custom_offers_expiry_days);
                $offer->save();

                // Send a notification via email to the freelancer
                $offer->freelancer->notify(new OfferFunded($offer));

                // Send the freelancer a notification via webapp
                notification([
                    'text'    => 't_a_custom_order_has_been_funded',
                    'action'  => url('seller/offers'),
                    'user_id' => $offer->freelancer_id
                ]);

                // Success
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_u_have_added_funds_to_this_order'),
                    'icon'        => 'success'
                ]);

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Confirm releasing payment
     *
     * @param string $id
     * @return void
     */
    public function confirmRelease($id)
    {
        try {
            
            // Get offer
            $offer = CustomOffer::where('uid', $id)
                                ->where('freelancer_status', 'completed')
                                ->where('admin_status', 'approved')
                                ->where('payment_status', 'funded')
                                ->where('buyer_id', auth()->id())
                                ->with('freelancer')
                                ->firstOrFail();

            // Confirm dialog
            $this->dialog()->confirm([
                'title'          => '<h1 class="text-base font-bold tracking-wide">'. __('messages.t_confirm_release_of_payment_for_username', ['username' => $offer->freelancer->username]) .'</h1>',
                'description'    => __('messages.t_pls_ensure_that_u_are_satisfied_with_work_freelancer', ['username' => $offer->freelancer->username]),
                'icon'           => "shield-check",
                'iconColor'      => "text-amber-600 dark:text-secondary-400 p-1",
                'iconBackground' => "bg-amber-100 rounded-full p-3 dark:bg-secondary-700",
                'accept'         => [
                    'label'  => __('messages.t_confirm'),
                    'method' => 'release',
                    'params' => $offer->uid,
                    'color'  => 'warning'
                ],
                'reject' => [
                    'label'  => __('messages.t_cancel')
                ],
            ]);

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Release payment
     *
     * @param string $id
     * @return void
     */
    public function release($id)
    {
        try {
            
            // Get offer
            $offer = CustomOffer::where('uid', $id)
                                ->where('freelancer_status', 'completed')
                                ->where('admin_status', 'approved')
                                ->where('payment_status', 'funded')
                                ->where('buyer_id', auth()->id())
                                ->with('freelancer')
                                ->firstOrFail();

            // Calculate amount earned by freelancer
            $freelancer_amount = convertToNumber($offer->budget_amount) - convertToNumber($offer->budget_freelancer_fee);

            // Give the freelancer his money
            $offer->freelancer->update([
                'balance_available' => convertToNumber($offer->freelancer->balance_available) + convertToNumber($freelancer_amount)
            ]);

            // Update offer
            $offer->payment_status = 'released';
            $offer->save();

            // Send an email to the freelancer
            $offer->freelancer->notify(new OfferPaymentReleased($offer));

            // Send him another notification via the webapp
            notification([
                'text'    => 't_u_received_a_new_payment_offer',
                'action'  => url('seller/offers'),
                'user_id' => $offer->freelancer_id,
            ]);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_u_have_released_this_payment_success'),
                'icon'        => 'success'
            ]);

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Go to deposit page
     *
     * @return void
     */
    public function deposit()
    {
        // Go to deposit page
        return redirect('account/deposit');
    }
    
}