<?php

namespace App\Http\Livewire\Admin\Projects\Subscriptions;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\ProjectSubscription;
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_projects_subscriptions'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.subscriptions.subscriptions', [
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
        return ProjectSubscription::with('project')->latest()->paginate(42);
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
            $subscription = ProjectSubscription::where('id', $id)->firstOrFail();

            // Get project
            $project      = $subscription->project;

            // Check if this subscription not paid yet
            if ($subscription->status === 'pending') {
                
                // We have to update project first
                if ($project->status === 'pending_payment') {
                    
                    // Update this project
                    $project->is_featured    = false;
                    $project->is_urgent      = false;
                    $project->is_highlighted = false;
                    $project->is_alert       = false;
                    $project->status         = settings('projects')->auto_approve_projects ? 'active' : 'pending_approval';
                    $project->save();

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
