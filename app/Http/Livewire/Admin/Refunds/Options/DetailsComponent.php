<?php

namespace App\Http\Livewire\Admin\Refunds\Options;

use App\Models\User;
use App\Models\Refund;
use Livewire\Component;
use App\Models\OrderItem;
use WireUi\Traits\Actions;
use App\Models\RefundConversation;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class DetailsComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $refund;
    public $messages;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get refund
        $refund         = Refund::where('uid', $id)->firstOrFail();

        // Get refund conversation
        $messages       = RefundConversation::where('refund_id', $refund->id)->latest()->get();

        // Set data
        $this->refund   = $refund;
        $this->messages = $messages;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_refund_details'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.refunds.options.details')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Accept refund
     *
     * @return void
     */
    public function accept()
    {
        // Check refund status
        if ($this->refund->status !== 'rejected_by_seller' && !$this->refund->request_admin_intervention) {
            
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_u_cant_do_action_for_this_refund'),
                'icon'        => 'error'
            ]);

            return;

        }
        
        // Update refund status
        $this->refund->status = 'accepted_by_admin';
        $this->refund->save();

        // Get refund item
        $item = $this->refund->item;

        // Update item status
        OrderItem::where('id', $item->id)->update([
            'status'      => 'refunded',
            'is_finished' => true,
            'refunded_at' => now()
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
        notification([
            'text'    => 't_app_name_has_approved_ur_refund_request',
            'action'  => url('account/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->buyer_id,
            'params'  => ['app_name' => config('app.name')]
        ]);

        // Send notification to seller
        notification([
            'text'    => 't_app_name_has_approved_refund_request_from_buyer',
            'action'  => url('seller/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->seller_id,
            'params'  => ['app_name' => config('app.name'), 'username' => $this->refund->buyer->username]
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
     * Decline dispute
     *
     * @return void
     */
    public function decline()
    {
        // Check refund status
        if ($this->refund->status !== 'rejected_by_seller' && !$this->refund->request_admin_intervention) {
            
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_u_cant_do_action_for_this_refund'),
                'icon'        => 'error'
            ]);

            return;

        }

        // Get refund item
        $item                 = $this->refund->item;

        // Update refund status
        $this->refund->status = 'rejected_by_admin';
        $this->refund->save();

        // Check if order not finished yet
        if (!$item->is_finished) {
            
            // Get seller
            $seller                    = User::where('id', $this->refund->seller_id)->firstOrFail();

            // Give seller his money
            $seller->balance_pending   = $seller->balance_pending - $item->profit_value;
            $seller->balance_available = $seller->balance_available + $item->profit_value;
            $seller->save();

            // Mark item as finished
            $item->is_finished         = true;
            $item->save();

        }

        // Refresh refund
        $this->refund->refresh();

        // Send notification to buyer
        notification([
            'text'    => 't_app_name_has_declined_ur_refund_request',
            'action'  => url('account/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->buyer_id,
            'params'  => ['app_name' => config('app.name')]
        ]);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_u_have_declined_this_refund'),
            'icon'        => 'success'
        ]);
    }
    
}
