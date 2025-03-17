<?php

namespace App\Http\Livewire\Admin\Projects\Bids\Subscriptions;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\ProjectBidUpgrade;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SubscriptionsComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_bids_subscriptions'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.bids.subscriptions.subscriptions', [
            'subscriptions' => $this->subscriptions
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of subscriptions
     *
     * @return object
     */
    public function getSubscriptionsProperty()
    {
        return ProjectBidUpgrade::with('bid')->with('bid.user')->latest()->paginate(42);
    }


    /**
     * Approve an offline subscription
     *
     * @param int $id
     * @return void
     */
    public function approve($id)
    {
        try {
            
            // Get subscription
            $subscription         = ProjectBidUpgrade::where('id', $id)
                                                    ->where('payment_method', 'offline_payment')
                                                    ->where('status', 'pending')
                                                    ->with('bid')
                                                    ->firstOrFail();

            // Set bid
            $bid                  = $subscription->bid;

            // Update subscription status
            $subscription->status = 'paid';
            $subscription->save();

            // Update bid status
            if ($bid->status === 'pending_payment') {
                
                // Mark it as active
                $bid->status = "active";
                $bid->save();

            }

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

            // close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-approve-payment-container-' . str_replace('-', '_', $subscription->uid));

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
     * Reject an offline subscription
     *
     * @param int $id
     * @return void
     */
    public function reject($id)
    {
        try {
            
            // Get subscription
            $subscription         = ProjectBidUpgrade::where('id', $id)
                                                    ->where('payment_method', 'offline_payment')
                                                    ->where('status', 'pending')
                                                    ->with('bid')
                                                    ->firstOrFail();

            // Set bid
            $bid                  = $subscription->bid;

            // Update subscription status
            $subscription->status = 'rejected';
            $subscription->save();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

            // close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-reject-payment-container-' . str_replace('-', '_', $subscription->uid));

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
     * Delete a subscription
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        try {
            
            // Get subscription
            $subscription = ProjectBidUpgrade::where('id', $id)->firstOrFail();

            // Get bid
            $bid      = $subscription->bid;

            // Check if this subscription not paid yet
            if ($subscription->status === 'pending') {
                
                // We have to update bid first
                if ($bid->status === 'pending_payment') {
                    
                    // Update this bid
                    $bid->is_sponsored = false;
                    $bid->is_sealed    = false;
                    $bid->is_highlight = false;
                    $bid->status       = settings('bids')->auto_approve_bids ? 'active' : 'pending_approval';
                    $bid->save();

                }

            }

            // Delete subscription
            $subscription->delete();

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-delete-payment-container-' . str_replace('-', '_', $subscription->uid));

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
