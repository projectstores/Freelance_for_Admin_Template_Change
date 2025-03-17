<?php

namespace App\Http\Livewire\Main\Explore\Projects;

use App\Models\Project;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ProjectCategory;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ProjectsComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $q;
    protected $queryString = ['q'];

    /**
     * Intialize component
     *
     * @return void
     */
    public function mount()
    {
        // Clean query
        $this->q = clean($this->q);

        // Check if this section enabled
        if (!settings('projects')->is_enabled) {
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
        $title       = __('messages.t_explore_projects') . " $separator " . settings('general')->title;
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

        return view('livewire.main.explore.projects.projects', [
            'categories' => $this->categories,
            'projects'   => $this->projects
        ])->extends('livewire.main.layout.app')->section('content');
    }
    

    /**
     * Get projects
     *
     * @return object
     */
    public function getProjectsProperty()
    {
        // Set available status
        $status = ['active', 'completed'];

        // Return projects
        if ($this->q) {
            return Project::whereIn('status', $status)
                            ->latest()
                            ->where(function($query) {
                                return $query->where('title', 'LIKE', '%'.$this->q.'%')
                                             ->orWhere('description', 'LIKE', '%'.$this->q.'%');
                            })
                            ->paginate(40);
        } else {
            return Project::whereIn('status', $status)
                            ->latest()
                            ->paginate(40);
        }
    }


    /**
     * Get all projects categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return ProjectCategory::latest()
                                ->select('id', 'name', 'slug', 'thumbnail_id')
                                ->with([
                                    'thumbnail' => function($query) {
                                        return $query->select('id', 'uid', 'file_folder', 'file_extension');
                                    },
                                    'translation'
                                ])
                                ->get();
    }
    
}