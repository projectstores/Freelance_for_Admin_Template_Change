<?php
 
namespace App\Http\Controllers\Main\Callback;
 
use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gig;
use App\Models\GigUpgrade;
use App\Models\Order;
use App\Models\OrderInvoice;
use App\Models\OrderItem;
use App\Models\OrderItemUpgrade;
use App\Notifications\User\Buyer\OrderPlaced;
use App\Notifications\User\Seller\PendingOrder;
use Illuminate\Support\Facades\Http;

class JazzcashController extends Controller
{
    public $cart;
   
    /**
     * JazzCash callback
     *
     * @param Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        try {

            // Get session saved key
            $callback_type = session('jazzcash_callback', null);

            // Check if there is a saved key
            if ($callback_type) {

                // Check deposit callback
                if ($callback_type === 'deposit') {
                    
                    // Handle deposit payment
                    return $this->deposit($request);

                } else if ($callback_type === 'checkout') {
                    
                    // Set cart
                    $cart       = session('cart', []);

                    // Set cart
                    $this->cart = $cart;

                    // Handle checkout callback
                    $response   = $this->checkout($request);

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
            throw $th;

        }
    }


    /**
     * Handle deposit callback
     *
     * @param Request $request
     * @return mixed
     */
    protected function deposit(Request $request)
    {
        try {
        
            // Set payment gateway settings
            $gateway_currency      = settings('jazzcash')->currency;
            $gateway_exchange_rate = (float)settings('jazzcash')->exchange_rate;
            $jazzcash_env          = config('jazzcash.environment');
            $jazzcash_endpoint     = $jazzcash_env === 'sandbox' ? 'https://sandbox.jazzcash.com.pk/ApplicationAPI/API/PaymentInquiry/Inquire' : 'https://payments.jazzcash.com.pk/ApplicationAPI/API/PaymentInquiry/Inquire';
            $jazzcash_merchant_id  = config("jazzcash.$jazzcash_env.merchant_id");
            $jazzcash_password     = config("jazzcash.$jazzcash_env.password");

            // Set order details
            $jazzcash_order   =  array(
                "pp_MerchantId" => $jazzcash_merchant_id,
                "pp_Password"   => $jazzcash_password,
                "pp_TxnRefNo"   => $request->get('pp_TxnRefNo')
            );

            // Generate secure hash
            $pp_secure_hash   = generate_jazzcash_hash($jazzcash_order);

            // Send request to JazzCash
            $jazzcash_inquire = Http::post($jazzcash_endpoint, [
                "pp_Version"    => null,
                "pp_TxnType"    => null,
                "pp_MerchantId" => $jazzcash_merchant_id,
                "pp_Password"   => $jazzcash_password,
                "pp_TxnDateTime"=> null,
                "pp_TxnRefNo"   => $request->get('pp_TxnRefNo'),
                "pp_RRN"        => null,
                "pp_SecureHash" => $pp_secure_hash,
                "Source"        => "REST"
            ]);
        
            // Get response
            $jazzcash_response = $jazzcash_inquire->json();

            // Check if payment succeeded
            if (is_array($jazzcash_response) && isset($jazzcash_response['pp_ResponseCode']) && $jazzcash_response['pp_ResponseCode'] == "000") {

                // Get default currency exchange rate
                $default_currency_exchange = settings('currency')->exchange_rate;

                // Get payment gateway exchange rate
                $gateway_currency_exchange = settings('jazzcash')->exchange_rate;

                // Get gateway default currency
                $gateway_currency          = settings('jazzcash')->currency;

                // Set provider name
                $provider_name             = 'jazzcash';

                // Get paid amount
                $amount                    = $request->get('pp_Amount') / 100;

                // Calculate fee
                $fee                       = $this->calculateFee($amount);

                // Set transaction id
                $transaction_id            = $request->get('pp_TxnRefNo');

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
                session()->forget('jazzcash_callback');

                // Success
                return redirect('account/deposit/history')->with('success', __('messages.t_ur_transaction_has_completed'));

            } else {

                // Error
                return redirect('account/deposit/history')->with('error', __('messages.t_we_could_not_handle_ur_payment'));

            }

        } catch (\Throwable $th) {
            
            // Error
            return redirect('account/deposit/history')->with('error', $th->getMessage());

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
            $fee_rate = settings('jazzcash')->deposit_fee;

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
    public function checkout(Request $request)
    {
        try {

            // Set payment gateway settings
            $gateway_currency      = settings('jazzcash')->currency;
            $gateway_exchange_rate = (float)settings('jazzcash')->exchange_rate;
            $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);
            $jazzcash_env           = config('jazzcash.environment');
            $jazzcash_endpoint      = $jazzcash_env === 'sandbox' ? 'https://sandbox.jazzcash.com.pk/ApplicationAPI/API/PaymentInquiry/Inquire' : 'https://payments.jazzcash.com.pk/ApplicationAPI/API/PaymentInquiry/Inquire';
            $jazzcash_merchant_id   = config("jazzcash.$jazzcash_env.merchant_id");
            $jazzcash_password      = config("jazzcash.$jazzcash_env.password");

            // Set order details
            $jazzcash_order   =  array(
                "pp_MerchantId" => $jazzcash_merchant_id,
                "pp_Password"   => $jazzcash_password,
                "pp_TxnRefNo"   => $request->get('pp_TxnRefNo')
            );

            // Generate secure hash
            $pp_secure_hash   = generate_jazzcash_hash($jazzcash_order);

            // Send request to JazzCash
            $jazzcash_inquire = Http::post($jazzcash_endpoint, [
                "pp_Version"    => null,
                "pp_TxnType"    => null,
                "pp_MerchantId" => $jazzcash_merchant_id,
                "pp_Password"   => $jazzcash_password,
                "pp_TxnDateTime"=> null,
                "pp_TxnRefNo"   => $request->get('pp_TxnRefNo'),
                "pp_RRN"        => null,
                "pp_SecureHash" => $pp_secure_hash,
                "Source"        => "REST"
            ]);
        
            // Get response
            $jazzcash_response = $jazzcash_inquire->json();

            // Check if payment succeeded
            if (is_array($jazzcash_response) && isset($jazzcash_response['pp_ResponseCode']) && $jazzcash_response['pp_ResponseCode'] == "000") {
                
                // Get paid amount
                $amount   = $request->get('pp_Amount') / 100;

                // Get currency
                $currency = $request->get('pp_TxnCurrency');

                // Check currency
                if (strtolower($currency) != strtolower($gateway_currency)) {
                    
                    // Error
                    return [
                        'success' => false,
                        'message' => __('messages.t_checkout_currency_invalid')
                    ];

                }

                // This amount must equals amount in order
                if ($amount != $exchange_total_amount) {
                    
                    // Error
                    return [
                        'success' => false,
                        'message' => $amount . " / " . $exchange_total_amount 
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
                $invoice->payment_method = 'jazzcash';
                $invoice->payment_id     = $request->get('pp_TxnRefNo');
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
                session()->forget('jazzcash_callback');

                // Now let's notify the buyer that his order has been placed
                auth()->user()->notify( (new OrderPlaced($order, $total))->locale(config('app.locale')) );

                // After that the buyer has to send the seller the required form to start
                return [
                    'success' => true,
                    'message' => __('messages.t_u_have_send_reqs_asap_to_seller')
                ];

            } else {

                // Payment failed
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
                return (float)number_format( ($amount * $gateway_exchange_rate) / $default_exchange_rate , 2, '.', '');

            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}