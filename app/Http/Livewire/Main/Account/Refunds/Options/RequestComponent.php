<?php

namespace App\Http\Livewire\Main\Account\Refunds\Options;

use Carbon\Carbon;
use App\Models\Refund;
use Livewire\Component;
use App\Models\OrderItem;
use WireUi\Traits\Actions;
use App\Notifications\User\Seller\RefundRequest;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Account\Refunds\RequestValidator;

class RequestComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $item;
    public $reason;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get item
        $item = OrderItem::where('uid', $id)
                         ->where('owner_id', '!=', auth()->id())
                         ->where('is_finished', false)
                         ->whereNotNull('expected_delivery_date')
                         ->whereHas('order', function($query) {
                            return $query->where('buyer_id', auth()->id());
                         })
                         ->firstOrFail();

        // Get refund
        $refund = Refund::where('item_id', $item->id)->where('buyer_id', auth()->id())->first();

        // Check if refund exists
        if ($refund) {
            return redirect('account/refunds/' . $refund->uid);
        }

        // Check item status
        if (!in_array($item->status, ['pending', 'proceeded', 'delivered'])) {
            
            // Error
            return redirect('account/refunds')->with('error', __('messages.t_u_cant_request_refund_for_this_item_now'));

        }

        // Parse ecpected delivery date
        $parsed_date = Carbon::parse($item->expected_delivery_date);

        // Check if expected delivery date in past
        if (!$parsed_date->isPast() && $item->status !== 'delivered') {
            
            // Error
            return redirect('account/refunds')->with('error', __('messages.t_u_can_request_refund_when_expected_date_finish'));

        }

        // set item
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
        $title       = __('messages.t_request_refund') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.refunds.options.request')->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Request refund
     *
     * @return void
     */
    public function request()
    {
        try {

            // Validate form
            RequestValidator::validate($this);

            // Create new refund
            $refund            = new Refund();
            $refund->uid       = uid();
            $refund->item_id   = $this->item->id;
            $refund->seller_id = $this->item->owner_id;
            $refund->buyer_id  = auth()->id();
            $refund->reason    = clean($this->reason);
            $refund->save();

            // Send notification to seller
            $this->item->owner->notify( (new RefundRequest($refund))->locale(config('app.locale')) );

            // Send notification
            notification([
                'text'    => 't_buyer_opened_new_refund_dispute',
                'action'  => url('seller/refunds/details', $refund->uid),
                'user_id' => $refund->seller_id,
                'params'  => ['buyer' => auth()->user()->username]
            ]);

            // Redirect to refund details
            return redirect('account/refunds/details/' . $refund->uid);


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
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }
    
}