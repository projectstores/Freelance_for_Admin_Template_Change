<?php

namespace App\Http\Livewire\Main\Checkout\Callback;

use Livewire\Component;

class XenditComponent extends Component
{
    
    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        try {

            // Get cart
            $cart = session('cart', []);

            // Check if cart is empty
            if (count($cart) === 0) {
                
                // Go back to home page
                return redirect('/');

            }

            // Get status
            $status = request()->get('status');

            // Check if status is valid
            if (in_array($status, ['success', 'failed'])) {
                
                // Check if payment succeeded
                if ($status === 'success') {
                    
                    // Let's empty the cart
                    session()->forget('cart');

                    // Redirect to orders
                    return redirect('account/orders')->with('message', __('messages.t_ur_order_details_are_current_processed'));

                } else {

                    // Failed payment
                    return redirect('checkout')->with('error', __('messages.t_error_xendit_payment_failed'));

                }

            } else {

                // Go to orders page
                return redirect('account/orders');

            }
            
        } catch (\Throwable $th) {
            
            // Something went wrong
            return redirect('checkout')->with('error', $th->getMessage());

        }
    }
   
}
