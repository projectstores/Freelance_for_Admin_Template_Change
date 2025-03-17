<?php

namespace App\Http\Livewire\Main\Seller\Refunds\Options;

use App\Models\User;
use App\Models\Admin;
use App\Models\Refund;
use Livewire\Component;
use App\Models\OrderItem;
use WireUi\Traits\Actions;
use App\Models\RefundConversation;
use App\Notifications\User\Buyer\RefundAccepted;
use App\Notifications\User\Buyer\RefundDeclined;
use App\Notifications\User\Buyer\NewRefundMessage;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Notifications\Admin\NewRefundMessage as AdminNewRefundMessage;

class DetailsComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $refund;
    public $message;


    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get refund
        $refund       = Refund::where('uid', $id)->where('seller_id', auth()->id())->firstOrFail();

        // Set refund
        $this->refund = $refund;
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
        $title       = __('messages.t_refund_details') . " $separator " . settings('general')->title;
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

        return view('livewire.main.seller.refunds.options.details')->extends('livewire.main.seller.layout.app')->section('content');
    }


    /**
     * Send new message to buyer
     *
     * @return void
     */
    public function send()
    {
        // Must insert message
        if (!$this->message || $this->refund->status !== 'pending') {
            return;
        }

        // Send new message
        $message              = new RefundConversation();
        $message->uid         = uid();
        $message->refund_id   = $this->refund->id;
        $message->author_type = 'seller';
        $message->author_id   = auth()->id();
        $message->message     = clean($this->message);
        $message->save();

        // Send notification to buyer
        $this->refund->buyer->notify( (new NewRefundMessage($this->refund, $message))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_seller_sent_u_msg_about_ur_refund_request',
            'action'  => url('account/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->buyer_id,
            'params'  => ['seller' => auth()->user()->username]
        ]);

        // Check if admin engaged
        if ($this->refund->request_admin_intervention) {
            
            // Send notification to admin
            Admin::first()->notify( (new AdminNewRefundMessage($this->refund, $message))->locale(config('app.locale')) );

        }

        // Reset form
        $this->reset('message');

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_refund_msg_posted_success'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Accept refund
     *
     * @return void
     */
    public function accept()
    {
        // Check if refund still in pending status
        if ($this->refund->status !== 'pending') {
            return;
        }

        // Get refund item
        $item = $this->refund->item;

        // Update item status
        OrderItem::where('id', $item->id)->update([
            'status'      => 'refunded',
            'is_finished' => true,
            'refunded_at' => now()
        ]);

        // Update refund
        $this->refund->update([
            'status' => 'accepted_by_seller'
        ]);

        // Update this gig
        if ($item->gig->total_orders_in_queue() > 0) {
            $item->gig()->decrement('orders_in_queue');
        }

        // Give buyer his money
        User::where('id', $this->refund->buyer_id)->update([
            'balance_available' => convertToNumber($this->refund->buyer->balance_available) + convertToNumber($item->total_value)
        ]);

        // Update seller balance
        User::where('id', $this->refund->seller_id)->update([
            'balance_pending' => convertToNumber($this->refund->seller->balance_pending) - convertToNumber($item->profit_value)
        ]);

        // Send notification to buyer
        $this->refund->buyer->notify( (new RefundAccepted($this->refund))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_seller_has_accepted_ur_refund',
            'action'  => url('account/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->buyer_id,
            'params'  => ['seller' => auth()->user()->username]
        ]);

        // Refresh refund
        $this->refund->refresh();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_u_have_approved_this_refund'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Decline refund
     *
     * @return void
     */
    public function decline()
    {
        // Must be pending
        if ($this->refund->status !== 'pending') {
            return;
        }

        // Update refund
        $this->refund->update([
            'status' => 'rejected_by_seller'
        ]);

        // Send notification to buyer
        $this->refund->buyer->notify( (new RefundDeclined($this->refund))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_seller_has_declined_ur_refund',
            'action'  => url('account/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->buyer_id,
            'params'  => ['seller' => auth()->user()->username]
        ]);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_u_have_declined_this_refund'),
            'icon'        => 'success'
        ]);
    }
    
}