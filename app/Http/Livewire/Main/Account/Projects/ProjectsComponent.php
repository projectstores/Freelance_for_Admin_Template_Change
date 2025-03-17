<?php

namespace App\Http\Livewire\Main\Account\Projects;

use Schema;
use App\Models\Project;
use Livewire\Component;
use App\Models\ProjectBid;
use WireUi\Traits\Actions;
use App\Models\ProjectVisit;
use Livewire\WithPagination;
use App\Models\ReportedProject;
use App\Models\ProjectMilestone;
use App\Models\ProjectBidUpgrade;
use App\Models\ProjectReportedBid;
use App\Models\ProjectSubscription;
use App\Models\ProjectRequiredSkill;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ProjectsComponent extends Component
{

    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Initialize component
     *
     * @return mixed
     */
    public function mount()
    {
        // Check if this section enabled
        if (!settings('projects')->is_enabled) {
        
            // Redirect to home page
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
        $title       = __('messages.t_my_projects') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.projects.projects', [
            'projects' => $this->projects
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get list of projects
     *
     * @return object
     */
    public function getProjectsProperty()
    {
        return Project::where('user_id', auth()->id())
                        ->withCount('bids')
                        ->with(['subscriptions' => function($query) {
                            return $query->where('status', 'pending')->latest()->first();
                        }])
                        ->latest()
                        ->paginate(42);
    }


    /**
     * Confirm deleting project
     *
     * @param string $id
     * @return mixed
     */
    public function confirmDelete($id)
    {
        // Get project
        $project = Project::where('uid', $id)
                        ->where('user_id', auth()->id())
                        ->whereIn('status', ['pending_approval', 'pending_payment', 'active', 'rejected', 'hidden'])
                        ->firstOrFail();

        // Confirm delete
        $this->dialog()->confirm([
            'title'       => __('messages.t_confirm_delete'),
            'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_this_project') . "<br><div class='font-semibold'>". $project->title ."</div>" . __('messages.t_all_records_related_to_project_will_erased') . "</div>",
            'icon'        => 'error',
            'accept'      => [
                'label'  => __('messages.t_delete'),
                'method' => 'delete',
                'params' => $project->uid,
            ],
            'reject' => [
                'label'  => __('messages.t_cancel')
            ],
        ]);
    }
    
    /**
     * Get category name based on app locale
     *
     * @param object $category
     * @return string
     */
    private function getCategoryTitle($category)
    {
        try {
        
            // Get current locale
            $locale = strtolower(app()->getLocale());
    
            // Check if category has translations
            if ($category->translation()->count()) {
                    
                // Get category translations
                $trans = $category->translation;

                // Set empty name value
                $name  = $category->name;

                // Loop through translations
                foreach ($trans as $t) {
                    
                    // Check if there is translation for current locale
                    if (strtolower($t->language_code) == $locale) {
                        
                        // Set name
                        $name = $t->language_value;
                        break;

                    }

                }

                // Return category name
                return $name;

            } else {

                // Has no translations
                return $category->name;

            }
    
        } catch (\Throwable $th) {
    
            // Something went wrong
            return $category->name;
    
        }
    }


    /**
     * Delete project
     *
     * @param string $id
     * @return mixed
     */
    public function delete($id)
    {
        try {
            
            // Get project
            $project = Project::where('uid', $id)
                            ->where('user_id', auth()->id())
                            ->whereIn('status', ['pending_approval', 'pending_payment', 'active', 'rejected', 'hidden'])
                            ->firstOrFail();
    
            // Disable foreign key check
            Schema::disableForeignKeyConstraints();
    
            // Get bids
            $bids = ProjectBid::where('project_id', $project->id)->get();
    
            // Loop through bids
            foreach ($bids as $bid) {
                
                // Delete upgrades for this bid
                ProjectBidUpgrade::where('bid_id', $bid->id)->delete();
    
                // Delete reported bid
                ProjectReportedBid::where('bid_id', $bid->id)->delete();
    
                // Delete bid
                $bid->delete();
    
            }
    
            // Delete milestone payments
            ProjectMilestone::where('project_id', $project->id)->delete();
    
            // Delete required skills
            ProjectRequiredSkill::where('project_id', $project->id)->delete();
    
            // Delete subscription
            ProjectSubscription::where('project_id', $project->id)->delete();
    
            // Delete visits stats
            ProjectVisit::where('project_id', $project->id)->delete();
    
            // Delete reports on this project
            ReportedProject::where('project_id', $project->id)->delete();
    
            // Delete project
            $project->delete();
    
            // Enable foreign key check
            Schema::enableForeignKeyConstraints();
    
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