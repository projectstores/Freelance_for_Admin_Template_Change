<?php

namespace App\Http\Livewire\Main\Account\Refunds\Options;

use App\Models\Admin;
use App\Models\Refund;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\RefundConversation;
use App\Notifications\Admin\RefundDispute;
use App\Notifications\User\Seller\RefundClosed;
use App\Notifications\User\Seller\NewRefundMessage;
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
        $refund       = Refund::where('uid', $id)->where('buyer_id', auth()->id())->firstOrFail();

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

        return view('livewire.main.account.refunds.options.details', [
            'messages' => $this->messages
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get messages
     *
     * @return object
     */
    public function getMessagesProperty()
    {
        return RefundConversation::where('refund_id', $this->refund->id)->latest()->get();
    }


    /**
     * Send new message to seller
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
        $message->author_type = 'buyer';
        $message->author_id   = auth()->id();
        $message->message     = clean($this->message);
        $message->save();

        // Send notification to seller
        $this->refund->seller->notify( (new NewRefundMessage($this->refund, $message))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_new_message_about_refund',
            'action'  => url('seller/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->seller_id
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
     * Close refund
     *
     * @return void
     */
    public function close()
    {
        // Check if refund still in pending
        if ($this->refund->status !== 'pending') {
            return;
        }

        // Close this refund
        $this->refund->status = 'closed';
        $this->refund->save();
        
        // Refresh refund details
        $this->refund->refresh();

        // Send notification to seller
        $this->refund->item->owner->notify( (new RefundClosed($this->refund))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_a_refund_has_closed',
            'action'  => url('seller/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->seller_id,
            'params'  => ['buyer' => auth()->user()->username]
        ]);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_u_have_closed_refund_success'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Raise a dispute to admin
     *
     * @return void
     */
    public function raise()
    {
        // Refund must be declined by seller to raise a dispute
        if ($this->refund->status !== 'rejected_by_seller' && !$this->refund->request_admin_intervention) {
            return;
        }

        // Update refund
        $this->refund->request_admin_intervention = true;
        $this->refund->save();

        // Refresh refund
        $this->refund->refresh();

        // Send notification to admin
        Admin::first()->notify( (new RefundDispute($this->refund))->locale(config('app.locale')) );

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_raise_dispute_request_received_success'),
            'icon'        => 'success'
        ]);
    }
    
}
