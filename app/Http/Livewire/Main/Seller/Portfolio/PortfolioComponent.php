<?php

namespace App\Http\Livewire\Main\Seller\Portfolio;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\UserPortfolio;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PortfolioComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_portfolio') . " $separator " . settings('general')->title;
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

        return view('livewire.main.seller.portfolio.portfolio', [
            'projects' => $this->projects
        ])->extends('livewire.main.seller.layout.app')->section('content');
    }


    /**
     * Get seller's projects
     *
     * @return object
     */
    public function getProjectsProperty()
    {
        // Get projects by this seller
        $projects = UserPortfolio::where('user_id', auth()->id())->orderByDesc('id')->paginate(42);

        // Return projects
        return $projects;
    }


    /**
     * Delete project
     *
     * @param string $id
     * @return void
     */
    public function delete($id)
    {
        // Get project
        $project = UserPortfolio::where('uid', $id)->where('user_id', auth()->id())->firstOrFail();

        // Let's delete gallery
        foreach ($project->gallery as $image) {
            
            // Delete image from local storage
            deleteModelFile($image->image);

            // Delete image from database
            $image->delete();

        }

        // Delete thumbnail
        deleteModelFile($project->thumbnail);

        // Delete project
        $project->delete();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_project_deleted_success'),
            'icon'        => 'success'
        ]);
    }
    
}