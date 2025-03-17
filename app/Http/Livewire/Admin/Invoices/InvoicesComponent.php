<?php

namespace App\Http\Livewire\Admin\Invoices;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\OrderInvoice;
use Livewire\WithPagination;
use App\Notifications\User\Seller\PendingOrder;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class InvoicesComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_invoices'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.invoices.invoices', [
            'invoices' => $this->invoices
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of invoices
     *
     * @return object
     */
    public function getInvoicesProperty()
    {
        return OrderInvoice::latest()->paginate(42);
    }


    /**
     * Invoice paid
     *
     * @param integer $id
     * @return void
     */
    public function paid($id)
    {
        // Get invoice
        $invoice = OrderInvoice::where('id', $id)->where('status', 'pending')->firstOrFail();

        // Update buyer balance used for purchases
        $invoice->order->buyer()->update([
            'balance_purchases' => $invoice->order->total_value
        ]);

        // Get order items
        $items = $invoice->order->items;

        // Loop throug items in order
        foreach ($items as $item) {
            
            // Get gig
            $gig = $item->gig;

            // Update seller pending balance
            $gig->owner()->update([
                'balance_pending' => $gig->owner->balance_pending + $item->profit_value
            ]);

            // Increment orders in queue
            $gig->increment('orders_in_queue');

            // Order item placed successfully
            // Let's notify the seller about new order
            $gig->owner->notify( (new PendingOrder($item))->locale(config('app.locale')) );

            // Send notification
            notification([
                'text'    => 't_u_received_new_order_seller',
                'action'  => url('seller/orders/details', $item->uid),
                'user_id' => $item->owner_id
            ]);

        }

        // Mark invoice as paid
        $invoice->status = 'paid';
        $invoice->save();

        // Send notification to buyer
        notification([
            'text'    => 't_ur_payment_has_been_received_offline',
            'action'  => url('account/orders'),
            'user_id' => $invoice->order->buyer_id
        ]);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
    
}
