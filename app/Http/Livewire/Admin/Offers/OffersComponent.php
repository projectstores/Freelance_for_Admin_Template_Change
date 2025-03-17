<?php

namespace App\Http\Livewire\Admin\Offers;

use File;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\CustomOffer;
use Livewire\WithPagination;
use App\Http\Validators\Admin\Offers\RejectValidator;
use App\Notifications\User\Freelancer\NewOfferReceived;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Notifications\User\Employer\YourOfferNeedsChanges;
use App\Notifications\User\Freelancer\OfferPaymentReleased;

class OffersComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    public $rejection_reason;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_offers'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.offers.offers', [
            'offers' => $this->offers
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of offers
     *
     * @return object
     */
    public function getOffersProperty()
    {
        return CustomOffer::whereHas('freelancer')
                            ->whereHas('buyer')
                            ->with(['freelancer', 'buyer', 'attachments', 'work'])
                            ->latest()
                            ->paginate(42);
    }


    /**
     * Approve a offer
     *
     * @param int $id
     * @return void
     */
    public function approve($id)
    {
        try {
                
            // Get offer
            $offer = CustomOffer::where('admin_status', 'pending')
                                ->where('uid', $id)
                                ->with(['buyer', 'freelancer'])
                                ->firstOrFail();

            // Aprove offer
            $offer->admin_status = 'approved';
            $offer->save();

            // Send a notification to the freelancer via webapp
            notification([
                'text'    => 't_a_new_custom_offer_received',
                'action'  => url('seller/offers'),
                'user_id' => $offer->freelancer_id
            ]);

            // Send notification to the freelancer via email
            $offer->freelancer->notify(new NewOfferReceived($offer));

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-approve-offer-container-' . $offer->uid);

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
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Reject offer
     *
     * @param int $id
     * @return void
     */
    public function reject($id)
    {
        try {
                
            // Get offer
            $offer = CustomOffer::where('uid', $id)
                                ->where('admin_status', 'pending')
                                ->with(['freelancer', 'buyer'])
                                ->firstOrFail();

            // Validate form
            RejectValidator::validate($this);

            // Reject offer
            $offer->admin_status           = 'rejected';
            $offer->admin_rejection_reason = $this->rejection_reason;
            $offer->save();

            // Send notification to the employer via email
            $offer->buyer->notify(new YourOfferNeedsChanges($offer));

            // Send employer a notification via webapp
            notification([
                'text'    => 't_an_offer_needs_changes_rejected_admin',
                'action'  => url('account/offers'),
                'user_id' => $offer->buyer_id
            ]);

            // Reset rejection form
            $this->reset('rejection_reason');

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-reject-offer-container-' . $offer->uid);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        }catch (\Illuminate\Validation\ValidationException $e) {

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
                                ->where('payment_status', 'funded')
                                ->with('freelancer')
                                ->firstOrFail();

            // Confirm dialog
            $this->dialog()->confirm([
                'title'          => '<h1 class="text-base font-bold tracking-wide">'. __('messages.t_confirm_release_of_payment_for_username', ['username' => $offer->freelancer->username]) .'</h1>',
                'description'    => __('messages.t_use_this_option_only_if_employer_forgot_release'),
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
                                ->where('payment_status', 'funded')
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
     * Confirm offer delete
     *
     * @param string $id
     * @return void
     */
    public function confirmDelete($id)
    {
        try {
            
            // Get offer
            $offer = CustomOffer::where('uid', $id)->firstOrFail();

            // Confirm delete
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_delete'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_this_offer_admin') . "</div>",
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
                                ->with(['attachments', 'buyer', 'freelancer', 'work'])
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

            // Delete delivered work
            if ($offer->work) {
                
                // Loop through attachments
                foreach ($offer->work as $file) {
                    
                    // Get local path
                    $path = public_path("storage/offers-work/" . $file->uid . "." . $file->file_extension);

                    // Delete if from local storage
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    // Delete if from database
                    $file->delete();

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
    
}
