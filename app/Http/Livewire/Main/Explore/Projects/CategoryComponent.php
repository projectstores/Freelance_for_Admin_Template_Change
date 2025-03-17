<?php

namespace App\Http\Livewire\Main\Explore\Projects;

use App\Models\Project;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ProjectSkill;
use App\Models\ProjectCategory;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CategoryComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $category;

    /**
     * Intialize component
     *
     * @return void
     */
    public function mount($category_slug)
    {
        // Check if this section enabled
        if (!settings('projects')->is_enabled) {
            return redirect('/');
        }   

        // Get category
        $category       = ProjectCategory::where('slug', $category_slug)->with('translation')->firstOrFail();

        // Set category
        $this->category = $category;
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
        $title       = category_title('projects', $this->category) . " $separator " . settings('general')->title;
        $description = $this->category->seo_desciption ?? settings('seo')->description;
        $ogimage     = src( $this->category->ogimage ?? settings('seo')->ogimage );

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

        return view('livewire.main.explore.projects.category', [
            'skills'   => $this->skills,
            'projects' => $this->projects
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
        return Project::whereIn('status', $status)
                        ->where('category_id', $this->category->id)
                        ->latest()
                        ->paginate(40);
    }


    /**
     * Get skills in this category
     *
     * @return object
     */
    public function getSkillsProperty()
    {
        return ProjectSkill::where('category_id', $this->category->id)->get();
    }
    
}