<?php
 
namespace App\Http\Controllers\Main\Callback;

use App\Models\Gig;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\GigUpgrade;
use App\Models\OrderInvoice;
use Illuminate\Http\Request;
use App\Models\OrderItemUpgrade;
use App\Models\DepositTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Notifications\User\Buyer\OrderPlaced;
use App\Notifications\User\Seller\PendingOrder;

class PaymobController extends Controller
{
   
    public $cart;

    /**
     * Paymob callback
     *
     * @param Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        try {

            // Get session saved key
            $callback_type = session('paymob_callback', null);

            // Check if there is a saved key
            if ($callback_type) {
                
                // Get transaction id
                $transaction_id = $request->get('id');

                // Check deposit callback
                if ($callback_type === 'deposit') {
                    
                    // Handle deposit payment
                    $response = $this->deposit($transaction_id);

                    // Check if succeeded
                    if (is_array($response) && $response['success'] === true) {
                        
                        // Success
                        return redirect('account/deposit/history')->with('message', $response['message']);

                    } else if (is_array($response) && $response['success'] === false) {
                        
                        // Error
                        return redirect('account/deposit/history')->with('error', $response['message']);

                    } else {

                        // Error
                        return redirect('account/deposit/history')->with('error', __('messages.t_toast_something_went_wrong'));

                    }

                } else if ($callback_type === 'checkout') {
                    
                    // Handle checkout callback
                    $response = $this->checkout($transaction_id);

                    // Check if succeeded
                    if (is_array($response) && $response['success'] === true) {
                        
                        // Success
                        return redirect('account/orders')->with('message', $response['message']);

                    } else if (is_array($response) && $response['success'] === false) {
                        
                        // Error
                        return redirect('checkout')->with('error', $response['message']);

                    } else {

                        // Error
                        return redirect('checkout')->with('error', __('messages.t_toast_something_went_wrong'));

                    }

                } else {

                    // Not valid
                    return redirect('/');

                }

            } else {

                // No saved key
                return redirect('/');

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            return redirect('account/deposit/history')->with('error', $th->getMessage());

        }
    }


    /**
     * Handle deposit callback
     *
     * @return mixed
     */
    protected function deposit($id)
    {
        try {
            
            // Get auth token
            $auth    = Http::acceptJson()->post('https://accept.paymob.com/api/auth/tokens', [
                                'api_key' => config('paymob.api_key'),
                            ])->json();

            // Get payment details
            $payment = Http::withToken($auth['token'])
                            ->get("https://accept.paymob.com/api/acceptance/transactions/$id")
                            ->json();

            // Check payment status
            if (is_array($payment) && isset($payment['success']) && $payment['success']) {
                
                // Get default currency exchange rate
                $default_currency_exchange = settings('currency')->exchange_rate;

                // Get payment gateway exchange rate
                $gateway_currency_exchange = settings('paymob')->exchange_rate;

                // Get gateway default currency
                $gateway_currency          = settings('paymob')->currency;

                // Set provider name
                $provider_name             = 'paymob';

                // Get paid amount
                $amount                    = $payment['amount_cents'] / 100;

                // Calculate fee
                $fee                       = $this->calculateFee($amount);

                // Set transaction id
                $transaction_id            = $id;

                // Make transaction
                $deposit                   = new DepositTransaction();
                $deposit->user_id          = auth()->id();
                $deposit->transaction_id   = $transaction_id;
                $deposit->payment_method   = $provider_name;
                $deposit->amount_total     = round( ($amount * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                $deposit->amount_fee       = round( ($fee * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                $deposit->amount_net       = round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 );
                $deposit->currency         = $gateway_currency;
                $deposit->exchange_rate    = $gateway_currency_exchange;
                $deposit->status           = 'paid';
                $deposit->ip_address       = request()->ip();
                $deposit->save();

                // Add funds to account
                $this->addFunds(round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 ));

                // Forget session
                session()->forget('paymob_callback');

                return [
                    'success' => true,
                    'message' => __('messages.t_ur_transaction_has_completed')
                ];

            } else {

                // Failed payment
                return [
                    'success' => false,
                    'message' => __('messages.t_we_could_not_handle_ur_deposit_payment')
                ];

            }


        } catch (\Throwable $th) {
            
            // Error
            return [
                'success' => false,
                'message' => $th->getMessage()
            ];

        }
    }


    /**
     * Calculate fee
     *
     * @param mixed $amount
     * @return mixed
     */
    protected function calculateFee($amount)
    {
        try {
            
            // Get fee rate
            $fee_rate = settings('paymob')->deposit_fee;

            // Calculate fee
            return $amount * $fee_rate / 100;

        } catch (\Throwable $th) {
            
            // Something went wrong
            return 0;

        }
    }


    /**
     * Add funds
     *
     * @param float $amount
     * @return void
     */
    protected function addFunds($amount)
    {
        try {
            
            // Get user
            $user                    = User::where('id', auth()->id())->first();

            // Add funds
            $user->balance_available = $user->balance_available + $amount;
            $user->save();

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Handle checkout callback
     *
     * @param string $transaction_id
     * @return mixed
     */
    public function checkout($transaction_id)
    {
        try {

            // Set cart
            $cart                      = session('cart', []);

            // Set cart
            $this->cart                = $cart;

            // Get auth token
            $auth    = Http::acceptJson()->post('https://accept.paymob.com/api/auth/tokens', [
                'api_key' => config('paymob.api_key'),
            ])->json();

            // Get payment details
            $payment = Http::withToken($auth['token'])
                        ->get("https://accept.paymob.com/api/acceptance/transactions/$transaction_id")
                        ->json();

            // Get payment gateway exchange rate
            $gateway_currency_exchange = (float)settings('paymob')->exchange_rate;

            // Get total amount
            $total_amount              = $this->calculateExchangeAmount($gateway_currency_exchange);

            // Check payment status
            if (is_array($payment) && isset($payment['success']) && $payment['success']) {

                // Get paid amount
                $amount   = $payment['amount_cents'] / 100;

                // Get currency
                $currency = $payment['currency'];

                // Check currency
                if (strtolower($currency) != strtolower(settings('paymob')->currency)) {
                    
                    // Error
                    return [
                        'success' => false,
                        'message' => __('messages.t_checkout_currency_invalid')
                    ];

                }

                // This amount must equals amount in order
                if ($amount != $total_amount) {
                    
                    // Error
                    return [
                        'success' => false,
                        'message' => __('messages.t_amount_in_cart_not_equals_received')
                    ];

                }

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
                $invoice->payment_method = 'paymob';
                $invoice->payment_id     = $payment['id'];
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
                session()->forget('paymob_callback');

                // Now let's notify the buyer that his order has been placed
                auth()->user()->notify( (new OrderPlaced($order, $total))->locale(config('app.locale')) );

                // After that the buyer has to send the seller the required form to start
                return [
                    'success' => true,
                    'message' => __('messages.t_u_have_send_reqs_asap_to_seller')
                ];

            } else {
                
                // We couldn't process this payment
                return [
                    'success' => false,
                    'message' => __('messages.t_we_could_not_handle_ur_payment')
                ];

            }

        } catch (\Throwable $th) {

            // Error
            return [
                'success' => false,
                'message' => $th->getMessage()
            ];

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
                return (float)number_format( $amount * $gateway_exchange_rate / $default_exchange_rate, 2, '.', '');

            }

        } catch (\Throwable $th) {
            return $amount;
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

}