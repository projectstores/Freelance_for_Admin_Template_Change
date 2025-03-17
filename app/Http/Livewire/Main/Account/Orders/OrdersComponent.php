<?php

namespace App\Http\Livewire\Main\Account\Orders;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Notifications\User\Seller\OrderItemCanceled;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class OrdersComponent extends Component
{

    use WithPagination, SEOToolsTrait, Actions;


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_my_orders') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.orders.orders', [
            'orders' => $this->orders
        ])->extends('livewire.main.layout.app2')->section('content');
    }


    /**
     * Get list of orders
     *
     * @return object
     */
    public function getOrdersProperty()
    {
        return Order::where('buyer_id', auth()->id())->orderByDesc('id')->paginate(42);
    }


    /**
     * Cancel order 
     *
     * @param string $id
     * @return void
     */
    public function cancel($id)
    {
        // Get item
        $item = OrderItem::where('uid', $id)
                        ->whereHas('order', function($query) {
                            return $query->where('buyer_id', auth()->id());
                        })
                        ->where('status', 'pending')
                        ->firstOrFail();

        // Remove item price from seller balance
        $item->owner()->update([
            'balance_pending' => convertToNumber($item->owner->balance_pending) - convertToNumber($item->profit_value)
        ]);

        // Add item price to buyer balance
        $item->order->buyer()->update([
            'balance_available' => convertToNumber($item->order->buyer->balance_available) + convertToNumber($item->total_value)
        ]);

        // Update item
        $item->status      = 'canceled';
        $item->canceled_by = 'buyer';
        $item->canceled_at = now();
        $item->is_finished = true;
        $item->save();

        // Decrement orders in queue
        if ($item->gig->total_orders_in_queue() > 0) {
            $item->gig()->decrement('orders_in_queue');
        }

        // Check if item has any opened refund
        if ($item->refund && $item->refund?->status === 'pending') {
            
            // Let's close this refund
            $item->refund->status = 'closed';
            $item->refund->save();

        }

        // Send notification to seller
        $item->owner->notify( (new OrderItemCanceled($item))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_buyer_has_canceled_order',
            'action'  => url('seller/orders/details', $item->uid),
            'user_id' => $item->owner_id,
            'params'  => ['buyer' => auth()->user()->username]
        ]);

        // success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_order_has_been_successfully_canceled'),
            'icon'        => 'success'
        ]);
    }
    
}