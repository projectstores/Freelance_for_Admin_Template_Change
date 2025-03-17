<?php

namespace App\Http\Livewire\Main\Checkout\Callback;

use Livewire\Component;
use App\Models\CheckoutWebhook;

class MollieComponent extends Component
{
    public $cart;

    /**
     * Init component
     *
     * @return void
     */
    public function mount($id)
    {
        try {

            // Set cart
            $cart       = session('cart', []);

            // Set cart
            $this->cart = $cart;

            // Save data
            $this->checkoutWebhook(['payment_id' => $id, 'payment_method' => 'mollie']);

            // Let's empty the cart
            session()->forget('cart');

            // Redirect to orders
            return redirect('account/orders')->with('message', __('messages.t_ur_order_details_are_current_processed'));

        } catch (\Throwable $th) {
            
            // Something went wrong
            return redirect('checkout')->with('error', $th->getMessage());

        }
    }


    /**
     * Save checkout for webhook callback
     *
     * @param array $data
     * @return void
     */
    protected function checkoutWebhook($data)
    {
        try {
            
            // Set buyer id
            $buyer_id                = auth()->id();
            
            // Set cart
            $cart                    = $this->cart;

            // Set payment id
            $payment_id              = $data['payment_id'];

            // Set payment method 
            $payment_method          = $data['payment_method'];

            // Save
            $webhook                 = new CheckoutWebhook();
            $webhook->data           = ['buyer_id' => $buyer_id, 'cart' => $cart];
            $webhook->payment_id     = $payment_id;
            $webhook->payment_method = $payment_method;
            $webhook->save();

        } catch (\Throwable $th) {
            throw $th;
        }
    }
   
}
