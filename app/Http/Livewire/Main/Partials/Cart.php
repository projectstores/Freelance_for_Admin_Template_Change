<?php

namespace App\Http\Livewire\Main\Partials;

use Livewire\Component;
use WireUi\Traits\Actions;

class Cart extends Component
{
    use Actions;
    
    public $cart    = [];
    protected $listeners = ['cart-updated' => 'cartUpdated'];
    

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Set items in cart
        $this->cart = session('cart', []);
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.partials.cart');
    }


    /**
     * Count total price of an item in cart
     *
     * @param string $id
     * @return integer
     */
    public function itemTotalPrice($id)
    {
        // Set empty var total price
        $total = 0;

        // Loop throug items in cart
        foreach ($this->cart as $key => $item) {
            
            // Check if item exists
            if ($item['id'] === $id) {
                
                // Get quantity
                $quantity = (int) $item['quantity'];

                // Sum upgrades total price
                if (is_array($item['upgrades']) && count($item['upgrades'])) {
                    
                    $total_upgrades_price = array_reduce($item['upgrades'], function($i, $obj)
                    {
                        // Calculate only selected upgrades
                        if ($obj['checked'] == true) {
                            return $i += $obj['price'];
                        } else {
                            return $i;
                        }

                    });

                } else {

                    // No upgrades selected
                    $total_upgrades_price = 0;

                }

                // Set new total
                $total = ($quantity * $item['gig']['price']) + ($total_upgrades_price * $quantity);

            }

        }

        // Return total price
        return $total;

    }


    /**
     * Remove item from cart
     *
     * @param string $id
     * @return void
     */
    public function remove($id)
    {
        // Get cart
        $cart = $this->cart;

        // Loop through cart
        foreach ($cart as $key => $item) {
            
            // Check if item exists in cart
            if ($item['id'] === $id) {
                
                // Delete item from cart
                unset($cart[$key]);
                
                // Break
                break;

            }

        }

        // Refresh cart
        array_values($cart);

        // Forget old session
        session()->forget('cart');

        // Set new cart
        session()->put('cart', $cart);

        // Update cart
        $this->cart = $cart;

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_item_removed_from_cart_success'),
            'icon'        => 'success'
        ]);

        // Update cart
        $this->dispatchBrowserEvent('cart-updated');
    }


    /**
     * Calculate total price
     *
     * @return integer
     */
    public function total()
    {
        // Set total empty variable
        $total = 0;

        // Loop through items in cart
        foreach ($this->cart as $key => $item) {
            
            // Update total price
            $total += $this->itemTotalPrice($item['id']);

        }

        // Return total price
        return $total;
    }


    /**
     * Check if cart updated
     *
     * @return void
     */
    public function cartUpdated()
    {
        $this->cart = session('cart', []);
    }
    
}
