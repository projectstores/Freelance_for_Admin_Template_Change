<?php

namespace App\Http\Livewire\Main\Checkout\Callback;

use App\Models\Gig;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\GigUpgrade;
use WireUi\Traits\Actions;
use App\Models\OrderInvoice;
use App\Models\OrderItemUpgrade;
use App\Notifications\User\Buyer\OrderPlaced;
use App\Notifications\User\Seller\PendingOrder;

class VnpayComponent extends Component
{    
    use Actions;
    
    public $cart;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        try {

            // Set cart
            $cart           = session('cart', []);

            // Set cart
            $this->cart     = $cart;

            // Set vnpay hash secret
            $vnp_HashSecret = config('vnpay.hash_secret');

            // Get secure hash from response
            $vnp_SecureHash = request()->get('vnp_SecureHash');

            // Set received data
            $inputData      = array(
                "vnp_Amount"            => request()->get('vnp_Amount'),
                "vnp_BankCode"          => request()->get('vnp_BankCode'),
                "vnp_BankTranNo"        => request()->get('vnp_BankTranNo'),
                "vnp_CardType"          => request()->get('vnp_CardType'),
                "vnp_OrderInfo"         => request()->get('vnp_OrderInfo'),
                "vnp_PayDate"           => request()->get('vnp_PayDate'),
                "vnp_ResponseCode"      => request()->get('vnp_ResponseCode'),
                "vnp_TmnCode"           => request()->get('vnp_TmnCode'),
                "vnp_TransactionNo"     => request()->get('vnp_TransactionNo'),
                "vnp_TransactionStatus" => request()->get('vnp_TransactionStatus'),
                "vnp_TxnRef"            => request()->get('vnp_TxnRef')
            );
            
            ksort($inputData);
            $i        = 0;
            $hashData = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
            }

            // Generate new secure hash
            $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

            // Check if generated secure hash matches the secure received from vnpay
            if ($vnp_SecureHash === $secureHash) {
                
                // Check payment status
                if (request()->get('vnp_TransactionStatus') === "00") {
                    
                    // Get payment gateway exchange rate
                    $gateway_currency_exchange = (float)settings('vnpay')->exchange_rate;

                    // Get total amount
                    $total_amount              = $this->calculateExchangeAmount($gateway_currency_exchange);

                    // Get paid amount
                    $amount                    = request()->get('vnp_Amount') / 100;

                    // This amount must equals amount in order
                    if ($amount != $total_amount) {
                        
                        // Error
                        return redirect('checkout')->with('error', __('messages.t_amount_in_cart_not_equals_received'));

                    }

                    // Place order 
                    $this->checkout(request()->get('vnp_TransactionNo'));

                } else {

                    // Payment failed
                    return redirect('checkout')->with('error', __('messages.t_we_could_not_handle_ur_payment'));

                }

            } else {
                
                // Does not match
                return redirect('checkout')->with('error', __('messages.t_we_could_not_handle_ur_payment'));

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            return redirect('checkout')->with('error', $th->getMessage());

        }
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
     * Calculate commission
     *
     * @param string $price
     * @return integer
     */
    public function commission($price)
    {
        // Get settings
        $settings = settings('commission');

        // Commission percentage
        if ($settings->commission_type === 'percentage') {
            
            // Calculate commission
            $commission = $settings->commission_value * $price / 100;

        } else {

            // Fixed amount
            $commission = $settings->commission_value;

        }

        // Return commission
        return $commission;
    }


    /**
     * Place order now
     *
     * @return void
     */
    public function checkout($payment_id)
    {
        try {

            // Get user billing info
            $billing_info          = auth()->user()->billing;

            // Get commission settings
            $commission_settings   = settings('commission');

            // Set unique id for this order
            $uid                   = uid();

            // Get buyer id
            $buyer_id              = auth()->id();

            // Count taxes amount
            $taxes                 = $this->taxes();

            // Count subtotal amount
            $subtotal              = $this->subtotal();

            // Count total amount
            $total                 = $this->total() + $taxes;

            // Save order
            $order                 = new Order();
            $order->uid            = $uid;
            $order->buyer_id       = $buyer_id;
            $order->total_value    = $total;
            $order->subtotal_value = $subtotal;
            $order->taxes_value    = $taxes;
            $order->save();

            // Now let's loop through items in this cart and save them
            foreach ($this->cart as $key => $item) {
                
                // Get gig
                $gig = Gig::where('uid', $item['id'])->active()->first();

                // Check if gig exists
                if ($gig) {
                    
                    // Get item total price
                    $item_total_price                   = $this->itemTotalPrice($item['id']);

                    // Calculate commission first
                    $commisssion                        = $commission_settings->commission_from === 'orders' ? $this->commission($item_total_price) : 0;

                    // Save order item
                    $order_item                         = new OrderItem();
                    $order_item->uid                    = uid();
                    $order_item->order_id               = $order->id;
                    $order_item->gig_id                 = $gig->id;
                    $order_item->owner_id               = $gig->user_id;
                    $order_item->quantity               = (int) $item['quantity'];
                    $order_item->has_upgrades           = is_array($item['upgrades']) && count($item['upgrades']) ? true : false;
                    $order_item->total_value            = $item_total_price;
                    $order_item->profit_value           = $item_total_price - $commisssion;
                    $order_item->commission_value       = $commisssion;
                    $order_item->save();

                    // Check if this item has upgrades
                    if ( is_array($item['upgrades']) && count($item['upgrades']) ) {
                        
                        // Loop through upgrades
                        foreach ($item['upgrades'] as $index => $upg) {
                            
                            // Get upgrade
                            $upgrade = GigUpgrade::where('uid', $upg['id'])->where('gig_id', $gig->id)->first();

                            // Check if upgrade exists
                            if ($upgrade) {
                                
                                // Save item upgrade
                                $order_item_upgrade             = new OrderItemUpgrade();
                                $order_item_upgrade->item_id    = $order_item->id;
                                $order_item_upgrade->title      = $upgrade->title;
                                $order_item_upgrade->price      = $upgrade->price;
                                $order_item_upgrade->extra_days = $upgrade->extra_days;
                                $order_item_upgrade->save();

                            }
                            
                        }

                    }

                    // Update seller pending balance
                    $gig->owner()->update([
                        'balance_pending' => $gig->owner->balance_pending + $order_item->profit_value
                    ]);

                    // Increment orders in queue
                    $gig->increment('orders_in_queue');

                    // Order item placed successfully
                    // Let's notify the seller about new order
                    $gig->owner->notify( (new PendingOrder($order_item))->locale(config('app.locale')) );

                    // Send notification
                    notification([
                        'text'    => 't_u_received_new_order_seller',
                        'action'  => url('seller/orders/details', $order_item->uid),
                        'user_id' => $order_item->owner_id
                    ]);

                }

            }

            // Save invoice
            $invoice                 = new OrderInvoice();
            $invoice->order_id       = $order->id;
            $invoice->payment_method = 'vnpay';
            $invoice->payment_id     = $payment_id;
            $invoice->firstname      = $billing_info->firstname ? $billing_info->firstname : auth()->user()->username;
            $invoice->lastname       = $billing_info->lastname ? $billing_info->lastname : auth()->user()->username;
            $invoice->email          = auth()->user()->email;
            $invoice->company        = $billing_info->company ? clean($billing_info->company) : null;
            $invoice->address        = clean($billing_info->address);
            $invoice->status         = 'paid';
            $invoice->save();

            // Update balance
            auth()->user()->update([
                'balance_purchases' => convertToNumber(auth()->user()->balance_purchases) + convertToNumber($total)
            ]);

            // Now everything succeeded
            // Let's empty the cart
            session()->forget('cart');

            // Now let's notify the buyer that his order has been placed
            auth()->user()->notify( (new OrderPlaced($order, $total))->locale(config('app.locale')) );

            // After that the buyer has to send the seller the required form to start
            return redirect('account/orders')->with('message', __('messages.t_u_have_send_reqs_asap_to_seller'));

        } catch (\Throwable $th) {
            
            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Calculate exchange rate
     *
     * @param float $amount
     * @param float $gateway_exchange_rate
     * @return mixed
     */
    protected function calculateExchangeAmount($gateway_exchange_rate = null)
    {
        try {
            
            // Get total amount
            $amount                = $this->total() + $this->taxes();

            // Get default currency exchange rate
            $default_exchange_rate = (float) settings('currency')->exchange_rate;

            // Set gateway exchange rate
            $gateway_exchange_rate = is_null($gateway_exchange_rate) ? $default_exchange_rate : (float) $gateway_exchange_rate;
            
            // Check if same exchange rate
            if ($default_exchange_rate == $gateway_exchange_rate) {
                
                // No need to calculate amount
                return $amount;

            } else {

                // Return new amount
                return (float)number_format( ($amount * $gateway_exchange_rate) / $default_exchange_rate , 2, '.', '');

            }

        } catch (\Throwable $th) {
            return $amount;
        }
    }
   
}
