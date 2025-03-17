<?php

namespace App\Http\Livewire\Admin\Gigs;

use App\Http\Validators\Admin\Gigs\RejectValidator;
use App\Models\Gig;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Notifications\User\Everyone\GigPublished;
use App\Notifications\User\Freelancer\YourGigNeedsChanges;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class GigsComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_gigs'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.gigs.gigs', [
            'gigs' => $this->gigs
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of gigs
     *
     * @return object
     */
    public function getGigsProperty()
    {
        return Gig::whereHas('category')
                    ->whereHas('subcategory')
                    ->whereHas('owner')
                    ->with(['category', 'subcategory'])
                    ->latest()
                    ->paginate(42);
    }


    /**
     * Confirm delete
     *
     * @param string $id
     * @return void
     */
    public function confirmDelete($id)
    {
        try {
            
            // Get gig
            $gig = Gig::where('uid', $id)->firstOrFail();

            // Check of gig has pending orders
            if ($gig->total_orders_in_queue()) {
                
                // You can't delete this
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_cant_delete_this_gig_pending_orders'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Confirm delete
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_delete'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_gig') . "</div>",
                'icon'        => 'error',
                'accept'      => [
                    'label'  => __('messages.t_delete'),
                    'method' => 'delete',
                    'params' => $gig->id,
                ],
                'reject' => [
                    'label'  => __('messages.t_cancel')
                ],
            ]);

        } catch (\Throwable $th) {

            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }    
    }


    /**
     * Delete gig
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get gig
        $gig = Gig::where('id', $id)->firstOrFail();

        // Check of gig has pending orders
        if ($gig->total_orders_in_queue()) {
            
            // You can't delete this
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_u_cant_delete_this_gig_pending_orders'),
                'icon'        => 'error'
            ]);

            return;

        }

        // Delete it
        $gig->delete();

        // success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_gig_deleted_successfull'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Publish gig
     *
     * @param integer $id
     * @return void
     */
    public function publish($id)
    {
        try {
            
            // Get gig
            $gig = Gig::where('id', $id)->where('status', 'pending')->firstOrFail();

            // Activate gig
            $gig->status = 'active';
            $gig->save();

            // Send notification to owner
            $gig->owner->notify( (new GigPublished($gig))->locale(config('app.locale')) );

            // Send notification
            notification([
                'text'    => 't_ur_gig_title_has_been_published',
                'action'  => url('service', $gig->slug),
                'user_id' => $gig->user_id,
                'params'  => ['title' => $gig->title]
            ]);

            // success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_gig_published_success'),
                'icon'        => 'success'
            ]);

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-approve-gig-container-' . $gig->uid);

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
     * Reject gig
     *
     * @param int $id
     * @return void
     */
    public function reject($id)
    {
        try {
                
            // Get gig
            $gig = Gig::where('id', $id)
                        ->where('status', 'pending')
                        ->with('owner')
                        ->firstOrFail();

            // Validate form
            RejectValidator::validate($this);

            // Reject gig
            $gig->status           = 'rejected';
            $gig->rejection_reason = $this->rejection_reason;
            $gig->save();

            // Send notification to the freelancer via email
            $gig->owner->notify(new YourGigNeedsChanges($gig));

            // Send freelancer a notification via webapp
            notification([
                'text'    => 't_ur_gig_needs_changes_rejected_admin',
                'action'  => url('seller/gigs'),
                'user_id' => $gig->user_id
            ]);

            // Reset rejection form
            $this->reset('rejection_reason');

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-reject-gig-container-' . $gig->uid);

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

}
