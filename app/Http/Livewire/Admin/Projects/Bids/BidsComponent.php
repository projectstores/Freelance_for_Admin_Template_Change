<?php

namespace App\Http\Livewire\Admin\Projects\Bids;

use Livewire\Component;
use App\Models\ProjectBid;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\ProjectBidUpgrade;
use App\Models\ProjectReportedBid;
use App\Notifications\User\Everyone\YourBidApproved;
use App\Notifications\User\Everyone\YourBidRejected;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Projects\Bids\RejectValidator;
use App\Notifications\User\Everyone\NewBidReceived;

class BidsComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_bids'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.bids.bids', [
            'bids' => $this->bids
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of bids
     *
     * @return object
     */
    public function getBidsProperty()
    {
        return ProjectBid::with(['project', 'user', 'upgrades'])->latest()->paginate(42);
    }


    /**
     * Approve a bid
     *
     * @param int $id
     * @return void
     */
    public function approve($id)
    {
        try {
                
            // Get bid
            $bid = ProjectBid::whereStatus('pending_approval')->whereId($id)->firstOrFail();

            // Aprove project
            $bid->status = 'active';
            $bid->save();

            // Send notification to the freelancer
            $bid->user->notify(new YourBidApproved($bid));

            // Send notification to the employer
            // Via web app
            notification([
                'text'    => 't_u_received_new_bid_on_ur_project',
                'action'  => url('project/' . $this->bid->project->pid . '/' . $this->bid->project->slug),
                'user_id' => $this->bid->project->user_id
            ]);

            // Send a notification via email to the employer
            $this->bid->project->client->notify(new NewBidReceived($bid, $this->bid->project));

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-approve-bid-container-' . $bid->uid);

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
     * Reject bid
     *
     * @param int $id
     * @return void
     */
    public function reject($id)
    {
        try {
                
            // Get bid
            $bid = ProjectBid::whereStatus('pending_approval')->whereId($id)->firstOrFail();

            // Validate form
            RejectValidator::validate($this);

            // Reject bid
            $bid->status                 = 'rejected';
            $bid->admin_rejection_reason = $this->rejection_reason;
            $bid->save();

            // Send notification to the employer
            $bid->user->notify(new YourBidRejected($bid));

            // Reset rejection form
            $this->reset('rejection_reason');

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-reject-bid-container-' . $bid->uid);

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
     * Delete bid
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        try {
            
            // Get bid
            $bid = ProjectBid::where('id', $id)->firstOrFail();
            
            // Delete reports
            ProjectReportedBid::where('bid_id', $id)->delete();

            // Delete upgrades
            ProjectBidUpgrade::where('bid_id', $id)->delete();

            // Now delete this bid
            $bid->delete();

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-delete-bid-container-' . $bid->uid);

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
    
}
