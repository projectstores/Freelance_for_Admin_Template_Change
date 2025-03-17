<?php

namespace App\Http\Livewire\Admin\Reports;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\ReportedProject;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ProjectsComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_reported_projects'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.reports.projects', [
            'reports' => $this->reports
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of reports
     *
     * @return object
     */
    public function getReportsProperty()
    {
        return ReportedProject::with(['project', 'user'])->latest()->paginate(42);
    }


    /**
     * Mark report as seen
     *
     * @param int $id
     * @return void
     */
    public function mark($id)
    {
        try {
            
            // Update status
            ReportedProject::where('id', $id)->where('is_seen', false)->update([
                'is_seen' => true
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
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Get report details
     *
     * @param int $id
     * @return void
     */
    public function details($id)
    {
        try {
            
            // Get report
            $report  = ReportedProject::where('id', $id)->firstOrFail();

            // Set details
            $details = clean($report->description);

            // Show dialog
            $this->dialog()->confirm([
                'title'          => '<h1 class="text-base font-bold tracking-wide -mt-1 mb-4">'. __('messages.t_report_project_' . $report->reason) .'</h1>',
                'description'    => "<div class='leading-relaxed'>" . nl2br($details) . "</div>",
                'icon'           => "clipboard-list",
                'iconColor'      => "text-slate-500 dark:text-secondary-400 p-1",
                'iconBackground' => "bg-slate-100 rounded-full p-3 dark:bg-secondary-700",
                'accept'         => [
                    'label'  => __('messages.t_confirm'),
                    'color'  => 'secondary'
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
    
}
