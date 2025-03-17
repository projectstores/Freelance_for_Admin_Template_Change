<?php

namespace App\Http\Livewire\Admin\Reviews;

use App\Models\Gig;
use App\Models\Review;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ReviewsComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_reviews'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.reviews.reviews', [
            'reviews' => $this->reviews
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of reviews
     *
     * @return object
     */
    public function getReviewsProperty()
    {
        return Review::latest()->paginate(42);
    }


    /**
     * Delete selected review
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get review
        $review        = Review::where('id', $id)->firstOrFail();

        // Calculate total stars
        $total_stars   = Review::where('gig_id', $review->gig_id)->where('id', '!=', $review->id)->sum('rating');

        // Calculate total reviews
        $total_reviews = Review::where('gig_id', $review->gig_id)->where('id', '!=', $review->id)->count();

        // Calculate rating
        $rating        = $total_reviews === 0 ? 0 : $total_stars / $total_reviews;

        // Update gig reviews
        Gig::where('id', $review->gig_id)->update([
            'rating'          => $rating,
            'counter_reviews' => $total_reviews
        ]);

        // Now we can delete review
        $review->delete();
    }
    
}
