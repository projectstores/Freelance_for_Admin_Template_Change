<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Schema;
use WireUi\Traits\Actions;

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
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_orders'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.orders.orders', [
            'orders' => $this->orders
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of orders
     *
     * @return object
     */
    public function getOrdersProperty()
    {
        return Order::latest('placed_at')->paginate(42);
    }


    /**
     * Delete order
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        // Get order
        $order = Order::whereId($id)->firstOrFail();

        // disable foreign key check
        Schema::disableForeignKeyConstraints();

        // Get order items
        $items = $order->items;

        // Loop through items
        foreach ($items as $item) {
            
            // Check status of this item
            if (in_array($item->status, ['pending', 'proceeded', 'delivered']) && !$item->is_finished) {
                
                // Update orders in queue
                if ($item->gig->total_orders_in_queue() > 0) {
                    $item->gig()->decrement('orders_in_queue');
                }

                // Give buyer his money
                $item->order->buyer()->update([
                    'balance_available' => $item->order->buyer->balance_available + $item->subtotal_value
                ]);

                // Update seller balance
                $item->owner()->update([
                    'balance_pending' => $item->owner->balance_pending - $item->profit_value
                ]);

            }

            // Delete requirements
            $item->requirements()->delete();

            // Delete upgrades
            $item->upgrades()->delete();

            // Delete delivered work
            $item->delivered_work()->delete();

            // Delete conversation in this delivered work
            $item->conversation()->delete();

            // Get refund for this item is exists
            $refund = $item->refund;

            // Check if refund exists
            if ($refund) {
                
                // Delete refund conversation
                $refund->conversation()->delete();

                // Delete refund
                $refund->delete();

            }

        }

        // Delete invoice
        $order->invoice->delete();

        // Delete order
        $order->delete();

        // enable foreign key check
        Schema::enableForeignKeyConstraints();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }

}
