<?php

namespace App\Http\Livewire\Main\Become;

use App\Models\Level;
use App\Models\User;
use App\Notifications\User\Seller\YouBecameSeller;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SellerComponent extends Component
{
    use SEOToolsTrait;
    
    public $features = [];

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // User account type must be buyer
        if (auth()->check() && auth()->user()->account_type !== 'buyer') {
            return redirect('seller/home');
        }

        // Set features
        $this->features = [
            ['title' => __('messages.t_seller_feature_title_1'), 'description' => __('messages.t_seller_feature_desc_1')],
            ['title' => __('messages.t_seller_feature_title_2'), 'description' => __('messages.t_seller_feature_desc_2')],
            ['title' => __('messages.t_seller_feature_title_3'), 'description' => __('messages.t_seller_feature_desc_3')],
            ['title' => __('messages.t_seller_feature_title_4'), 'description' => __('messages.t_seller_feature_desc_4')],
            ['title' => __('messages.t_seller_feature_title_5'), 'description' => __('messages.t_seller_feature_desc_5')],
            ['title' => __('messages.t_seller_feature_title_6'), 'description' => __('messages.t_seller_feature_desc_6')],
            ['title' => __('messages.t_seller_feature_title_7'), 'description' => __('messages.t_seller_feature_desc_7')],
            ['title' => __('messages.t_seller_feature_title_8'), 'description' => __('messages.t_seller_feature_desc_8')],
            ['title' => __('messages.t_seller_feature_title_9'), 'description' => __('messages.t_seller_feature_desc_9')],
            ['title' => __('messages.t_seller_feature_title_10'), 'description' => __('messages.t_seller_feature_desc_10')],
            ['title' => __('messages.t_seller_feature_title_11'), 'description' => __('messages.t_seller_feature_desc_11')],
            ['title' => __('messages.t_seller_feature_title_12'), 'description' => __('messages.t_seller_feature_desc_12')],
        ];
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
        $title       = __('messages.t_become_a_seller') . " $separator " . settings('general')->title;
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

        return view('livewire.main.become.seller')->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * BEcome a seller now
     *
     * @return mixed
     */
    public function start()
    {
        // Get another level for seller
        $level              = Level::where('account_type', 'seller')->oldest('id')->first();

        // Update user account type
        $user               = User::where('id', auth()->id())->first();
        $user->account_type = 'seller';
        $user->level_id     = $level ? $level->id : $user->level_id;
        $user->save();

        // Send notification to this user
        auth()->user()->notify( (new YouBecameSeller())->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_u_became_a_seller',
            'action'  => url('seller/home'),
            'user_id' => auth()->id()
        ]);

        // Redirect to seller dashboard
        return redirect('seller/home');
    }
    
}