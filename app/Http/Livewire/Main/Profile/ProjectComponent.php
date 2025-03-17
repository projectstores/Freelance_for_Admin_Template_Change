<?php

namespace App\Http\Livewire\Main\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserPortfolio;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ProjectComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    public $project;

    
    /**
     * Initialize component
     *
     * @param string $username
     * @param string $slug
     * @return void
     */
    public function mount($username, $slug)
    {
        // Get user
        $user    = User::where('username', $username)->whereIn('status', ['verified', 'active'])->firstOrFail();

        // Get project
        $project = UserPortfolio::where('user_id', $user->id)->where('slug', $slug)->firstOrFail();

        // Check if portfolio is pending approval
        if ($project->status === 'pending') {
            
            // Admin has right to see it
            if (auth('admin')->check()) {
                
                // Set project
                $this->project = $project;

            } else if (auth()->check() && auth()->id() === $project->user_id) {
                
                // Project owner has right to see it, even its status is pending
                $this->project = $project;

            } else {

                // Go back user's profile
                return redirect('profile/' . $user->username);

            }

        } else {

            // Set project
            $this->project = $project;

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
        $title       = $this->project->title . " $separator " . settings('general')->title;
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

        return view('livewire.main.profile.project')->extends('livewire.main.layout.app')->section('content');
    }
    
}