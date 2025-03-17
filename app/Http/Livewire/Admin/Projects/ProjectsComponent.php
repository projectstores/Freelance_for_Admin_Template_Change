<?php

namespace App\Http\Livewire\Admin\Projects;

use Schema;
use App\Models\Project;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\ReportedProject;
use App\Models\ProjectMilestone;
use App\Models\ProjectBidUpgrade;
use App\Models\ProjectReportedBid;
use App\Models\ProjectSubscription;
use App\Models\ProjectRequiredSkill;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Notifications\User\Employer\YourProjectApproved;
use App\Notifications\User\Employer\YourProjectRejected;
use App\Http\Validators\Admin\Projects\Options\RejectValidator;

class ProjectsComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_projects'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.projects', [
            'projects' => $this->projects
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of projects
     *
     * @return object
     */
    public function getProjectsProperty()
    {
        return Project::with('client')->withCount(['bids', 'milestones'])->latest()->paginate(42);
    }


    /**
     * Approve a project
     *
     * @param int $id
     * @return void
     */
    public function approve($id)
    {
        try {
                
            // Get project
            $project         = Project::whereStatus('pending_approval')->whereId($id)->firstOrFail();

            // Aprove project
            $project->status = 'active';
            $project->save();

            // Send notification to the employer
            $project->client->notify(new YourProjectApproved($project));

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-approve-project-container-' . $project->uid);

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
     * Reject project
     *
     * @param int $id
     * @return void
     */
    public function reject($id)
    {
        try {
                
            // Get project
            $project = Project::whereStatus('pending_approval')->whereId($id)->firstOrFail();

            // Validate form
            RejectValidator::validate($this);

            // Reject project
            $project->status           = 'rejected';
            $project->rejection_reason = $this->rejection_reason;
            $project->save();

            // Send notification to the employer
            $project->client->notify(new YourProjectRejected($project));

            // Reset rejection form
            $this->reset('rejection_reason');

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-reject-project-container-' . $project->uid);

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
     * Delete project
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        try {
            
            // Get project
            $project = Project::where('id', $id)->firstOrFail();

            // Disable foreign key check
            Schema::disableForeignKeyConstraints();

            // Get project bids
            $bids    = $project->bids;

            // Loop through bids
            foreach ($bids as $bid) {
                
                // Delete bid upgrades
                ProjectBidUpgrade::whereBidId($bid->id)->delete();

                // Delete bid in reported bids
                ProjectReportedBid::whereBidId($bid->id)->delete();

                // Delete this bid
                $bid->delete();

            }

            // Delete skills
            ProjectRequiredSkill::where('project_id', $project->id)->delete();

            // Delete subscriptions
            ProjectSubscription::where('project_id', $project->id)->delete();

            // Delete muilestones
            ProjectMilestone::where('project_id', $project->id)->delete();

            // Delete reports
            ReportedProject::where('project_id', $project->id)->delete();

            // Now delete this project
            $project->delete();

            // Enable foreign key check
            Schema::enableForeignKeyConstraints();

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-delete-project-container-' . $project->uid);

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
