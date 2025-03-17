<?php

namespace App\Http\Livewire\Main\Seller\Refunds;

use App\Models\Refund;
use Livewire\Component;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class RefundsComponent extends Component
{

    use WithPagination, SEOToolsTrait;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_refunds') . " $separator " . settings('general')->title;
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

        return view('livewire.main.seller.refunds.refunds', [
            'refunds' => $this->refunds
        ])->extends('livewire.main.seller.layout.app')->section('content');
    }


    /**
     * Get refunds history
     *
     * @return object
     */
    public function getRefundsProperty()
    {
        // Get refunds history
        $refunds = Refund::where('seller_id', auth()->id())
                                            ->orderBy('id', 'desc')
                                            ->paginate(42);

        // Return refunds history
        return $refunds;
    }
    
}