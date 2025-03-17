<?php

namespace App\Http\Livewire\Main\Post\Project;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ProjectCategory;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Post\Project\CreateValidator;

class ProjectComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $title;
    public $description;
    public $category;

    public $currency_symbol;


    /**
     * Intialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get currency settings
        $currency              = settings('currency');

        // Get currency symbol
        $this->currency_symbol = config('money.' . strtoupper($currency->code))['symbol'];
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
        $title       = __('messages.t_post_project') . " $separator " . settings('general')->title;
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

        return view('livewire.main.post.project.project', [
            'categories' => $this->categories
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get projects categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return ProjectCategory::orderBy('name', 'asc')->get();
    }
    
}