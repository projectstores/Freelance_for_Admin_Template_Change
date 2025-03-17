<?php

namespace App\Http\Livewire\Main\Account\Reviews\Options;

use App\Models\Gig;
use App\Models\Review;
use Livewire\Component;
use WireUi\Traits\Actions;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Account\Reviews\EditValidator;

class EditComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $rating;
    public $message;
    public $review;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get review
        $review       = Review::where('user_id', auth()->id())->where('uid', $id)->firstOrFail();

        // Set review
        $this->review = $review;

        // Fill form
        $this->fill([
            'rating'  => $review->rating,
            'message' => $review->message,
        ]);
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
        $title       = __('messages.t_edit_review') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.reviews.options.edit')->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Update review
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);

            // Update review
            Review::where('id', $this->review->id)->where('user_id', auth()->id())->update([
                'rating'  => $this->rating,
                'message' => clean($this->message)
            ]);

            // Calculate total stars
            $total_rating  = Review::where('gig_id', $this->review->gig_id)->sum('rating');

            // Calculate total reviews
            $total_reviews = Review::where('gig_id', $this->review->gig_id)->count();

            // Set rating
            $gig_rating    = $total_reviews > 0 ? $total_rating / $total_reviews : 0;

            // Update gig
            Gig::where('id', $this->review->gig_id)->update([
                'rating' => $gig_rating
            ]);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_review_updated_succes'),
                'icon'        => 'success'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            throw $th;

        }
    }
    
}
