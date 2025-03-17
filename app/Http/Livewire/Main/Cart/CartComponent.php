<?php

namespace App\Http\Livewire\Main\Cart;

use App\Models\Gig;
use Livewire\Component;
use App\Models\GigUpgrade;
use WireUi\Traits\Actions;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CartComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $cart;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Set cart
        $this->cart = session('cart', []);
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
        $title       = __('messages.t_my_cart') . " $separator " . settings('general')->title;
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

        return view('livewire.main.cart.cart')->extends('livewire.main.layout.app')->section('content');
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
     * Calculate subtotal price
     *
     * @return integer
     */
    public function subtotal()
    {
        // Calculate subtotal
        $subtotal = $this->total();

        // Return subtotal
        return $subtotal;
    }


    /**
     * Calculate taxes
     *
     * @return integer
     */
    public function taxes()
    {
        // Get commission settings
        $settings = settings('commission');

        // Check if taxes enabled
        if ($settings->enable_taxes) {
            
            // Check if type of taxes percentage
            if ($settings->tax_type === 'percentage') {
                
                // Get tax amount
                $tax = bcmul($this->total(), $settings->tax_value) / 100;

                // Return tax amount
                return $tax;

            } else {
                
                // Fixed price
                $tax = $settings->tax_value;

                // Return tax
                return $tax;

            }

        } else {

            // Taxes not enabled
            return 0;

        }
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
     * Now time to checkout
     *
     * @return void
     */
    public function checkout()
    {
        // First we need to validate data in cart
        // We need to do this to make sure cart items are exists with their upgrades
        $cart = $this->cart;

        // Loop through items in cart
        foreach ($cart as $key => $item) {
            
            // Get gig
            $gig = Gig::where('uid', $item['id'])->where('status', 'active')->first();

            // Check if gig exists
            if ($gig) {
                
                // Check if cart item has upgrades
                if (is_array($item['upgrades']) && count($item['upgrades'])) {
                    
                    // We need to loop inside upgrades to make sure they exist
                    foreach ($item['upgrades'] as $index => $upgrade_id) {
                        
                        // Get upgrade
                        $upgrade = GigUpgrade::where('uid', $upgrade_id['id'])->where('gig_id', $gig->id)->first();

                        // Check if upgrade exists
                        if ($upgrade) {
                            
                            // Check if upgrade selected
                            if ($upgrade_id['checked']) {
                                
                                // Upgrade exist, update price, title, extra days
                                $cart[$key]['upgrades'][$index]['id']       = $upgrade->uid;
                                $cart[$key]['upgrades'][$index]['title']    = $upgrade->title;
                                $cart[$key]['upgrades'][$index]['price']    = $upgrade->price;
                                $cart[$key]['upgrades'][$index]['delivery'] = $upgrade->extra_days;

                            } else {

                                // Upgrade no longer selected
                                unset($cart[$key]['upgrades'][$index]);

                                // Refresh upgrades array
                                array_values($cart[$key]['upgrades']);

                            }

                        } else {

                            // Upgrade no longer exists
                            // We have to update buyer cart and notify him
                            unset($cart[$key]['upgrades'][$index]);

                            // Refresh upgrades array
                            array_values($cart[$key]['upgrades']);

                            // Forget old session
                            session()->forget('cart');

                            // Refresh session
                            session()->put('cart', $cart);

                            // Show error message
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_an_upgrade_in_item_in_cart_not_found'),
                                'icon'        => 'error'
                            ]);

                            // Return back
                            return;

                        }

                    }

                } else {

                    // Set empty upgrades
                    $cart[$key]['upgrades'] = [];

                }

                // Check quantity must be between 1 and 10
                if (!in_array($cart[$key]['quantity'], range(1, 10))) {
                    
                    // Quantity must be between 1 and 10
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_selected_quantity_is_not_correct'),
                        'icon'        => 'error'
                    ]);

                    // Return back
                    return;

                }
                
            } else {

                // In this case this item no longer exists
                // Why? because may be buyer added this item to his cart and come back later to make checkout
                // But the gig no longer exists
                // So we have to delete it from session and refresh it
                unset($cart[$key]);

                // Refresh cart
                array_values($cart);

                // Forget old session
                session()->forget('cart');

                // Refresh session
                session()->put('cart', $cart);

                // Show error message
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_an_item_in_your_cart_doesnot_exist'),
                    'icon'        => 'error'
                ]);

                // Return back
                return;

            }

        }

        // Now we have set correct cart
        // Forget old cart
        session()->forget('cart');

        // Refresh current cart values
        array_values($cart);

        // Update cart
        session()->put('cart', $cart);

        // Now go to checkout
        return redirect('checkout');
    }
    
}
