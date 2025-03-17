<?php

namespace App\Http\Livewire\Main\Seller\Offers;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\CustomOffer;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\CustomOfferWork;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Seller\Offers\FileValidator;
use App\Notifications\User\Employer\NewFinishedOfferFile;
use App\Http\Validators\Main\Seller\Offers\RejectValidator;
use App\Notifications\User\Employer\FreelancerAcceptedYourOffer;
use App\Notifications\User\Employer\FreelancerCanceledYourOffer;
use App\Notifications\User\Employer\FreelancerRejectedYourOffer;

class OffersComponent extends Component
{
    use WithPagination, WithFileUploads, SEOToolsTrait, Actions;

    public $reject_reason;
    public $notes;
    public $file;
    public $is_completed;

    /**
     * Initialize component
     *
     * @return mixed
     */
    public function mount()
    {
        // Get settings
        $settings = settings('publish');

        // Check if this section enabled
        if (!$settings->enable_custom_offers) {
        
            // Redirect to home page
            return redirect('seller/home');

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
        $title       = __('messages.t_received_offers') . " $separator " . settings('general')->title;
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

        return view('livewire.main.seller.offers.offers', [
            'offers' => $this->offers
        ])->extends('livewire.main.seller.layout.app')->section('content');
    }


    /**
     * Get list of offers
     *
     * @return object
     */
    public function getOffersProperty()
    {
        return CustomOffer::where('freelancer_id', auth()->id())
                            ->where('admin_status', 'approved')
                            ->whereHas('freelancer')
                            ->latest('updated_at')
                            ->paginate(42);
    }


    /**
     * Reject this offer
     *
     * @param string $id
     * @return mixed
     */
    public function reject($id)
    {
        try {
            
            // Validate form
            RejectValidator::validate($this);

            // Get offer
            $offer = CustomOffer::where('freelancer_id', auth()->id())
                                ->where('freelancer_status', 'pending')
                                ->where('uid', $id)
                                ->with('buyer')
                                ->firstOrFail();

            // Let's reject this offer
            $offer->freelancer_status           = 'rejected';
            $offer->freelancer_rejection_reason = clean($this->reject_reason);
            $offer->save();

            // Send a notification to the employer
            $offer->buyer->notify(new FreelancerRejectedYourOffer($offer));

            // Send him a notification via webapp
            notification([
                'text'    => 't_notification_username_has_rejected_ur_offer',
                'action'  => url('account/offers'),
                'user_id' => $offer->buyer_id,
                'params'  => ['username' => auth()->user()->username]
            ]);

            // Reset form
            $this->reset('reject_reason');

            // Close modal
            $this->dispatchBrowserEvent('close-modal', "modal-reject-offer-container-$id");

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_freelancer_u_have_reject_this_offer_success'),
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
     * Accept this offer
     *
     * @param string $id
     * @return mixed
     */
    public function accept($id)
    {
        try {
            
            // Get offer
            $offer = CustomOffer::where('freelancer_id', auth()->id())
                                ->where('freelancer_status', 'pending')
                                ->where('uid', $id)
                                ->with('buyer')
                                ->firstOrFail();

            // Let's accept this offer
            $offer->freelancer_status = 'approved';
            $offer->save();

            // Send a notification to the employer
            $offer->buyer->notify(new FreelancerAcceptedYourOffer($offer));

            // Send him a notification via webapp
            notification([
                'text'    => 't_notification_username_has_accpted_ur_offer',
                'action'  => url('account/offers'),
                'user_id' => $offer->buyer_id,
                'params'  => ['username' => auth()->user()->username]
            ]);

            // Close modal
            $this->dispatchBrowserEvent('close-modal', "modal-approve-offer-container-$id");

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_freelancer_u_have_accepted_this_offer_success'),
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
     * Send a file to this 
     *
     * @return void
     * @param string $id
     */
    public function sendFile($id)
    {
        try {

            // Get offer
            $offer = CustomOffer::where('uid', $id)
                                ->where('freelancer_id', auth()->id())
                                ->whereIn('freelancer_status', ['completed', 'approved'])
                                ->whereIn('payment_status', ['funded', 'released'])
                                ->with('buyer')
                                ->firstOrFail();

            // Validate form
            FileValidator::validate($this);

            // Set attachment unique id
            $uid                  = Str::uuid();

            // Set new name for this attachment
            $attachment_new_title = $uid . "." . $this->file->extension();

            // Upload attachment and store the new name
            $this->file->storeAs('offers-work', $attachment_new_title, 'custom');

            // Save file in database
            $work                 = new CustomOfferWork();
            $work->offer_id       = $offer->id;
            $work->uid            = $uid;
            $work->notes          = clean($this->notes);
            $work->file_size      = $this->file->getSize();
            $work->file_extension = $this->file->extension();
            $work->file_mime      = $this->file->getMimeType();
            $work->save();

            // Check if this the final work
            if ($this->is_completed && $offer->freelancer_status !== 'completed') {
                
                // Mark offer as finished
                $offer->freelancer_status = 'completed';
                $offer->delivered_at      = now();
                $offer->save();

            }

            // Send a notification to the employer via email
            $offer->buyer->notify(new NewFinishedOfferFile($offer, $work));

            // Send him a new notification via the webapp
            notification([
                'text'    => 't_a_new_file_received_offer',
                'action'  => url('account/offers'),
                'user_id' => $offer->buyer_id
            ]);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_file_submitted_successfully_offer'),
                'icon'        => 'success'
            ]);

            // Reset the form
            $this->reset(['file', 'notes']);

            // Refresh the page
            $this->dispatchBrowserEvent('refresh');

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

        }
    }


    /**
     * Confirm cancellation of this offer
     *
     * @param string $id
     * @return void
     */
    public function confirmCancel($id)
    {
        try {
            
            // Get offer
            $offer = CustomOffer::where('uid', $id)
                                ->where('freelancer_id', auth()->id())
                                ->where('freelancer_status', 'approved')
                                ->whereIn('payment_status', ['pending', 'funded'])
                                ->firstOrFail();

            // Confirm cancel
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_cancellation'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_cancel_order') . "</div>",
                'icon'        => 'error',
                'accept'      => [
                    'label'  => __('messages.t_confirm'),
                    'method' => 'cancel',
                    'params' => $offer->uid,
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
     * Cancel this order
     *
     * @param string $id
     * @return void
     */
    public function cancel($id)
    {
        try {
            
            // Get offer
            $offer = CustomOffer::where('uid', $id)
                                ->where('freelancer_id', auth()->id())
                                ->where('freelancer_status', 'approved')
                                ->whereIn('payment_status', ['pending', 'funded'])
                                ->with('buyer')
                                ->firstOrFail();

            // Update offer
            $offer->freelancer_status = 'canceled';
            $offer->canceled_at       = now();
            $offer->save();

            // Check if employer already funded money into this order
            if ($offer->payment_status === 'funded') {
                
                // In this case we have to refund the employer
                $offer->buyer->update([
                    'balance_available' => convertToNumber($offer->buyer->balance_available) + convertToNumber($offer->budget_amount) + convertToNumber($offer->budget_buyer_fee)
                ]);

            }

            // Now let's send the employer an email
            $offer->buyer->notify(new FreelancerCanceledYourOffer($offer));

            // Send him also a notification via webapp
            notification([
                'text'    => 't_freelancer_has_canceled_ur_offer',
                'action'  => url('account/offers'),
                'user_id' => $offer->buyer_id
            ]);

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
    
}