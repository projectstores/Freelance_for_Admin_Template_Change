<?php

namespace App\Http\Livewire\Main\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PortfolioComponent extends Component
{

    use WithPagination, SEOToolsTrait;

    public $user;

    /**
     * Init component
     *
     * @return void
     */
    public function mount($username)
    {
        // Get user
        $user       = User::where('username', $username)->whereIn('status', ['verified', 'active'])->firstOrFail();

        // Set user
        $this->user = $user;
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
        $title       = __('messages.t_username_portfolio', ['username' => $this->user->username]) . " $separator " . settings('general')->title;
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

        return view('livewire.main.profile.portfolio', [
            'projects' => $this->projects
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get user projects
     *
     * @return object
     */
    public function getProjectsProperty()
    {
        return $this->user->projects()->where('status', 'active')->orderByRaw('RAND()')->paginate(42);
    }
    
}