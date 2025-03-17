<?php
 
namespace App\Http\Controllers\Main\Callback;
 
use App\Models\Gig;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\GigUpgrade;
use Illuminate\Support\Str;
use App\Models\OrderInvoice;
use Illuminate\Http\Request;
use App\Models\DepositWebhook;
use App\Models\CheckoutWebhook;
use App\Models\OrderItemUpgrade;
use App\Models\DepositTransaction;
use App\Http\Controllers\Controller;
use App\Notifications\User\Buyer\OrderPlaced;
use App\Notifications\User\Seller\PendingOrder;
use App\Notifications\User\Buyer\WebhookPaymentFailed;

class PaytrController extends Controller
{
    public $cart;


    /**
     * Redirect after the payment is
     *
     * @param Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        // Get status
        $status = $request->get('status');

        // Get action
        $action = $request->get('action');

        // Check if there is a status and action in request
        if ($status && $action) {
            
            // Check status
            if ($status === 'success') {
                
                // Check if checkout
                if ($action === 'checkout') {
                    
                    // Forget cart
                    session()->forget('cart');

                    // Succeeded checkout
                    return redirect('account/orders')->with('message', __('messages.t_ur_order_processed_once_catch_pyt'));

                } else if ($action === 'deposit') {

                    // Succeeded deposit
                    return redirect('account/deposit/history')->with('success', __('messages.t_ur_order_processed_once_catch_pyt'));

                } else {

                    // Nothing
                    return redirect('/');

                }

            } else if ($status === 'failed') {
                
                // Check if checkout
                if ($action === 'checkout') {
                    
                    // Failed checkout
                    return redirect('checkout')->with('error', __('messages.t_we_could_not_handle_ur_payment'));

                } else if ($action === 'deposit') {
                    
                    // Failed deposit
                    return redirect('account/deposit/history')->with('error', __('messages.t_we_could_not_handle_ur_payment'));

                } else {

                    // Nothing
                    return redirect('/');

                }

            } else {

                // Nothing
                return redirect('/');

            }

        } else {

            // Go home
            return redirect('/');

        }
    }
   

    /**
     * PayTR Notification webhook
     *
     * @param Request $request
     * @return void
     */
    public function webhook(Request $request)
    {
        try {

            // Get paytr response secure hash
            $paytr_hash   = $request->get('hash');

            // Get order id
            $order_id     = $request->get('merchant_oid');

            // Get status
            $status       = $request->get('status');

            // Get total amount
            $total_amount = $request->get('total_amount');

            // Now let's validate this hash
            $secure_hash  = base64_encode(hash_hmac( 'sha256', $order_id . config('paytr.merchant_salt') . $status . $total_amount, config('paytr.merchant_key'), true ));

            // Check both hash
            if ($paytr_hash === $secure_hash) {
                
                // Check if checkout callback
                if (Str::startsWith($order_id, 'CHECKOUT')) {
                    
                    // Get payment
                    $payment = CheckoutWebhook::wherePaymentId($order_id)->whereStatus('pending')->firstOrFail();

                    // Check if payment failed
                    if ($status === 'failed') {
                        
                        // Get buyer
                        $buyer = User::where('id', $payment->data['buyer_id'])->firstOrFail();

                        // Send  a notification to buyer
                        $buyer->notify(new WebhookPaymentFailed($payment->payment_id, $payment->payment_method, $request->get('failed_reason_msg')));

                        // Update payment
                        $payment->status = 'failed';
                        $payment->save();

                        // Return 
                        echo "OK";
                        exit;

                    } else if ($status === 'success') {
                       
                        // Set cart
                        $this->cart = $payment->data['cart'];

                        // Handle checkout callback
                        $response   = $this->checkout($order_id, $payment->data['buyer_id']);

                        // Check if succeeded
                        if (is_array($response) && $response['success'] === true) {
                            
                            // Success, delete webhook payload
                            $payment->status = 'succeeded';
                            $payment->save();

                            // Return
                            echo "OK";
                            exit;

                        } else  {

                            // Get buyer
                            $buyer = User::where('id', $payment->data['buyer_id'])->firstOrFail();

                            // Send  a notification to buyer
                            $buyer->notify(new WebhookPaymentFailed($payment->payment_id, $payment->payment_method, isset($response['message']) ? $response['message'] : __('messages.t_toast_something_went_wrong')));

                            // Return 
                            echo "OK";
                            exit;

                        }

                    }

                } else if (Str::startsWith($order_id, 'DEPOSIT')) {
                    
                    // Get payment
                    $payment = DepositWebhook::wherePaymentId($order_id)->whereStatus('pending')->firstOrFail();

                    // Check if payment failed
                    if ($status === 'failed') {
                        
                        // Get user
                        $user = User::where('id', $payment->user_id)->firstOrFail();

                        // Send  a notification to user
                        $user->notify(new WebhookPaymentFailed($payment->payment_id, $payment->payment_method, $request->get('failed_reason_msg')));

                        // Update payment
                        $payment->status = 'failed';
                        $payment->save();

                        // Return 
                        echo "OK";
                        exit;

                    } else if ($status === 'success') {

                        // Handle deposit
                        $deposit_succeeded = $this->deposit(($total_amount / 100), $order_id, $payment->user_id);

                        // Check if deposit succeeded
                        if ($deposit_succeeded) {

                            // Update payment
                            $payment->status = 'succeeded';
                            $payment->save();

                        }

                        echo "OK";
                        exit;

                    }

                }
                

            }

            echo "OK";
            exit;

        } catch (\Throwable $th) {
            
            echo "OK";
            exit;

        }
    }


    /**
     * Handle deposit payment
     *
     * @param string $amount
     * @param string $payment_id
     * @param int $user_id
     * @return void
     */
    protected function deposit($amount, $payment_id, $user_id)
    {
        try {
            

            // Get default currency exchange rate
            $default_currency_exchange = settings('currency')->exchange_rate;

            // Get payment gateway exchange rate
            $gateway_currency_exchange = settings('paytr')->exchange_rate;

            // Get gateway default currency
            $gateway_currency          = settings('paytr')->currency;

            // Set provider name
            $provider_name             = 'paytr';

            // Calculate fee
            $fee                       = $this->calculateFee($amount);

            // Set transaction id
            $transaction_id            = $payment_id;

            // Make transaction
            $deposit                   = new DepositTransaction();
            $deposit->user_id          = $user_id;
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
            $this->addFunds(round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 ), $user_id);

            // Success
            return true;

        } catch (\Throwable $th) {
            throw $th;
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
            $fee_rate = settings('paytr')->deposit_fee;

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
    protected function addFunds($amount, $user_id)
    {
        try {
            
            // Get user
            $user                    = User::where('id', $user_id)->first();

            // Add funds
            $user->balance_available = $user->balance_available + $amount;
            $user->save();

        } catch (\Throwable $th) {
            throw $th;
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
    public function checkout($payment_id, $buyer_id)
    {
        try {

            // Get user
            $buyer                 = User::where('id', $buyer_id)->firstOrFail();

            // Get user billing info
            $billing_info          = $buyer->billing;

            // Get commission settings
            $commission_settings   = settings('commission');

            // Set unique id for this order
            $uid                   = uid();

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
            $invoice->payment_method = 'paytr';
            $invoice->payment_id     = $payment_id;
            $invoice->firstname      = $billing_info->firstname ? $billing_info->firstname : $buyer->username;
            $invoice->lastname       = $billing_info->lastname ? $billing_info->lastname : $buyer->username;
            $invoice->email          = $buyer->email;
            $invoice->company        = $billing_info->company ? clean($billing_info->company) : null;
            $invoice->address        = clean($billing_info->address);
            $invoice->status         = 'paid';
            $invoice->save();

            // Update balance
            $buyer->update([
                'balance_purchases' => convertToNumber($buyer->balance_purchases) + convertToNumber($total)
            ]);

            // Now everything succeeded
            // Let's empty the cart
            session()->forget('cart');

            // Now let's notify the buyer that his order has been placed
            $buyer->notify( (new OrderPlaced($order, $total))->locale(config('app.locale')) );

            // After that the buyer has to send the seller the required form to start
            return [
                'success' => true,
                'message' => __('messages.t_u_have_send_reqs_asap_to_seller')
            ];

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
                return (float)number_format( ($amount * $gateway_exchange_rate) / $default_exchange_rate , 2, '.', '');

            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}