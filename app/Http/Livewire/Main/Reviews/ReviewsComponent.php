<?php

namespace App\Http\Livewire\Main\Reviews;

use App\Models\Review;
use App\Models\Gig;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ReviewsComponent extends Component
{
    use SEOToolsTrait;
    
    public $gig;

    public $rating;

    protected $queryString = ['rating'];


    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get gig
        $gig = Gig::where('uid', $id)->active()->first();

        // Check if gig exists
        if (!$gig) {
            return redirect('/');
        }

        // Check if gig has reviews
        if ($gig->counter_reviews === 0) {
            return redirect('service/' . $gig->slug);
        }

        // Set gig
        $this->gig = $gig;
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
        $title       = __('messages.t_reviews') . " $separator " . settings('general')->title;
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

        return view('livewire.main.reviews.reviews', [
            'reviews' => $this->reviews
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get latest reviews
     *
     * @return object
     */
    public function getReviewsProperty()
    {
        // Get reviews based on selected rating
        if ($this->rating && in_array($this->rating , [1,2,3,4,5])) {
            $reviews = Review::where('gig_id', $this->gig->id)
                                ->where('status', 'active')
                                ->where('rating', $this->rating)
                                ->latest()
                                ->paginate(30);
        } else {
            $reviews = Review::where('gig_id', $this->gig->id)
                                ->where('status', 'active')
                                ->orderBy('rating', 'desc')
                                ->latest()
                                ->paginate(30);
        }

        // Return reviews
        return $reviews;
    }
    
}