<?php

namespace App\Http\Livewire\Main\Hire;

use App\Models\User;
use App\Models\UserSkill;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class HireComponent extends Component
{

    use WithPagination, SEOToolsTrait;
    
    public $keyword;
    public $skill;

    /**
     * Init component
     *
     * @return void
     */
    public function mount($keyword)
    {
        // Set skill
        $this->keyword = $keyword;

        // Set skill
        $skill         = UserSkill::where('slug', $keyword)->first();

        // Check if skill exists
        if ($skill) {
            
            // Set skill
            $this->skill = $skill;

        } else {

            // No skills found with that name
            // Redirect user to search page
            $query = Str::slug($this->keyword, '+');

            // Redirect
            return redirect('search?q=' . $query);

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
        $title       = __('messages.t_hire_the_best_skill_name_experts', ['skill' => $this->skill->name]) . " $separator " . settings('general')->title;
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

        return view('livewire.main.hire.hire', [
            'sellers' => $this->sellers 
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get seller
     *
     * @return object
     */
    public function getSellersProperty()
    {
        return User::where('account_type', 'seller')
                    ->whereIn('status', ['active', 'verified'])
                    ->whereHas('skills', function($query) {
                        return $query->where('slug', 'LIKE', "%{$this->keyword}%")->orWhere('name', 'LIKE', "%{$this->keyword}%");
                    })
                    ->orderByRaw('RAND()')
                    ->paginate(42);
    }
    
}