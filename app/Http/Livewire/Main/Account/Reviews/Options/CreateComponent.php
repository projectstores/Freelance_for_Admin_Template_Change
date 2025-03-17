<?php

namespace App\Http\Livewire\Main\Account\Reviews\Options;

use App\Models\Gig;
use App\Models\Review;
use Livewire\Component;
use App\Models\OrderItem;
use WireUi\Traits\Actions;
use App\Notifications\User\Seller\ReviewReceived;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Account\Reviews\CreateValidator;

class CreateComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $item;
    public $rating;
    public $message;

    /**
     * Init component
     *
     * @param string $itemId
     * @return void
     */
    public function mount($itemId)
    {
        // Get item
        $item = OrderItem::where('uid', $itemId)
                        ->whereHas('order', function($query) {
                            return $query->where('buyer_id', auth()->id());
                        })
                        ->where('status', 'delivered')
                        ->where('is_finished', true)
                        ->first();

        // Check if order item exists
        if (!$item) {
            return redirect('account/reviews')->with('message', __('messages.t_order_item_could_not_be_found'));
        }

        // Get review if eists
        $review = Review::where('user_id', auth()->id())
                        ->where('gig_id', $item->gig_id)
                        ->where('order_item_id', $item->id)
                        ->first();

        // Check if review exists
        if ($review) {
            return redirect('account/reviews/edit/' . $review->uid);
        }

        // Set item
        $this->item = $item;
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
        $title       = __('messages.t_submit_new_review') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.reviews.options.create')->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Create new review
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Create new review
            $review                = new Review();
            $review->uid           = uid();
            $review->user_id       = auth()->id();
            $review->seller_id     = $this->item->owner_id;
            $review->gig_id        = $this->item->gig_id;
            $review->order_item_id = $this->item->id;
            $review->rating        = $this->rating;
            $review->message       = clean($this->message);
            $review->save();

            // Count total stars for this gig
            $total_stars       = Review::where('gig_id', $this->item->gig_id)->sum('rating');

            // Count total reviews for this gig
            $total_reviews     = Review::where('gig_id', $this->item->gig_id)->count();

            // Set gig rating
            $gig_rating        = $total_stars / $total_reviews;

            // Let's update gig rating
            Gig::where('id', $this->item->gig_id)->update([
                'counter_reviews' => $total_reviews,
                'rating'          => $gig_rating
            ]);

            // Now let's send seller a notification message
            $this->item->owner->notify( (new ReviewReceived($this->item, $review))->locale(config('app.locale')) );

            // Send notification
            notification([
                'text'    => 't_u_have_received_new_rating',
                'action'  => url('seller/reviews/details', $review->uid),
                'user_id' => $this->item->owner_id
            ]);

            // Redirect to review preview
            return redirect('account/reviews/preview/' . $review->uid);


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
