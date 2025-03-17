<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use App\Models\User;

class CashfreeController extends Controller
{
   
    /**
     * Get cashfree token
     *
     * @param Request $request
     * @return mixed
     */
    public function token(Request $request)
    {
        // Check if ajax request
        if ($request->ajax()) {

            // Set api url
            $api_url       = config('cashfree.isLive') ? "https://api.cashfree.com/pg/orders" : "https://sandbox.cashfree.com/pg/orders";

            // Set client id
            $client_id     = config('cashfree.appID');

            // Set client secret
            $client_secret = config('cashfree.secretKey');

            // Set user id
            $user_id       = auth()->user()->uid;
            
            // Init curl request
            $curl          = curl_init();

            // Set customer details
            $customer      = [
                'customer_details' => [
                    'customer_id'    => "$user_id",
                    'customer_email' => auth()->user()->email,
                    'customer_phone' => $request->get('phone'),
                    'customer_name'  => auth()->user()->username
                ],
                'order_amount'   => $request->get('amount'),
                'order_currency' => settings('cashfree')->currency,
                'order_note'     => __('messages.t_add_funds'),
            ];

            // Set config
            curl_setopt_array($curl, [
                CURLOPT_URL            => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "POST",
                CURLOPT_POSTFIELDS     => json_encode($customer),
                CURLOPT_HTTPHEADER     => [
                    "Accept: application/json",
                    "Content-Type: application/json",
                    "x-api-version: 2022-01-01",
                    "x-client-id: $client_id",
                    "x-client-secret: $client_secret"
                ],
            ]);

            // Get response
            $response = curl_exec($curl);

            // Get error
            $error    = curl_error($curl);

            // Close connection
            curl_close($curl);
            
            // Check if request has error
            if ($error) {
            
                // Return response
                return response()->json([
                    'success' => false,
                    'message' => $error
                ], 422);

            } else {

                // Decode results
                $result = json_decode($response, true);

                // Check if there is any error
                if (isset($result['type']) && in_array($result['type'], ['authentication_error', 'invalid_request_error', 'rate_limit_error', 'api_error'])) {
                    
                    // Check type of error
                    switch ($result['type']) {

                        case 'authentication_error':
                            
                            // Return response
                            return response()->json([
                                'success' => false,
                                'message' => __('messages.t_cashfre_error_authentication_error')
                            ], 422);

                            break;

                        case 'invalid_request_error':
                            
                            // Return response
                            return response()->json([
                                'success' => false,
                                'message' => __('messages.t_cashfre_error_invalid_request_error')
                            ], 422);

                            break;

                        case 'rate_limit_error':
                            
                            // Return response
                            return response()->json([
                                'success' => false,
                                'message' => __('messages.t_cashfre_error_rate_limit_error')
                            ], 422);

                            break;

                        case 'api_error':
                            
                            // Return response
                            return response()->json([
                                'success' => false,
                                'message' => __('messages.t_cashfre_error_api_error')
                            ], 422);

                            break;

                    }

                } else if (isset($result['order_token'])) {
                    
                    // Success
                    return response()->json([
                        'success'     => true,
                        'order_token' => $result["order_token"]
                    ]);

                } else {

                    // Something went wrong
                    return response()->json([
                        'success' => false,
                        'message' => __('messages.t_toast_something_went_wrong')
                    ], 422);

                }

            } 

        }
    }


    /**
     * Stripe callback
     *
     * @param Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        try {

            // Check if ajax request
            if ($request->ajax()) {

                // Get order id
                $order_id      = $request->get('order_id');

                // Set api url
                $api_url       = config('cashfree.isLive') ? "https://api.cashfree.com/pg/orders/$order_id" : "https://sandbox.cashfree.com/pg/orders/$order_id";

                // Set client id
                $client_id     = config('cashfree.appID');

                // Set client secret
                $client_secret = config('cashfree.secretKey');
                
                // Init curl request
                $curl          = curl_init();

                // Set config
                curl_setopt_array($curl, [
                    CURLOPT_URL            => $api_url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING       => "",
                    CURLOPT_MAXREDIRS      => 10,
                    CURLOPT_TIMEOUT        => 30,
                    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST  => "GET",
                    CURLOPT_HTTPHEADER     => [
                        "Accept: application/json",
                        "Content-Type: application/json",
                        "x-api-version: 2022-01-01",
                        "x-client-id: $client_id",
                        "x-client-secret: $client_secret"
                    ],
                ]);

                // Get response
                $response = curl_exec($curl);

                // Get error
                $error    = curl_error($curl);

                // Close connection
                curl_close($curl);
                
                // Check if request has error
                if ($error) {
                
                    // Flash session message
                    session()->flash('error', $error);

                    // Return response
                    return response()->json([
                        'success'  => false,
                        'redirect' => url('account/deposit/history')
                    ]);

                } else {

                    // Decode results
                    $payment                     = json_decode($response, true);

                    // Get default currency exchange rate
                    $default_currency_exchange   = settings('currency')->exchange_rate;

                    // Get payment gateway exchange rate
                    $gateway_currency_exchange   = settings('cashfree')->exchange_rate;

                    // Get gateway default currency
                    $gateway_currency            = settings('cashfree')->currency;

                    // Set provider name
                    $provider_name               = 'cashfree';

                    // Let's see if payment suuceeded
                    if ( is_array($payment) && isset($payment['order_status']) && $payment['order_status'] === 'PAID' ) {

                        // Get paid amount
                        $amount                  = $payment['order_amount'];

                        // Calculate fee
                        $fee                     = $this->calculateFee($amount);

                        // Set transaction id
                        $transaction_id          = $payment['cf_order_id'];

                        // Make transaction
                        $deposit                 = new DepositTransaction();
                        $deposit->user_id        = auth()->id();
                        $deposit->transaction_id = $transaction_id;
                        $deposit->payment_method = $provider_name;
                        $deposit->amount_total   = round( ($amount * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                        $deposit->amount_fee     = round( ($fee * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                        $deposit->amount_net     = round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 );
                        $deposit->currency       = $gateway_currency;
                        $deposit->exchange_rate  = $gateway_currency_exchange;
                        $deposit->status         = 'paid';
                        $deposit->ip_address     = $request->ip();
                        $deposit->save();

                        // Add funds to account
                        $this->addFunds(round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 ));

                        // Flash session message
                        session()->flash('success', __('messages.t_ur_transaction_has_completed'));

                        // Return response
                        return response()->json([
                            'success'  => true,
                            'redirect' => url('account/deposit/history')
                        ]);

                    } else {

                        // Flash session message
                        session()->flash('error', __('messages.t_we_could_not_handle_ur_deposit_payment'));

                        // Return response
                        return response()->json([
                            'success'  => false,
                            'redirect' => url('account/deposit/history')
                        ]);

                    }

                } 

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
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
            $fee_rate = settings('cashfree')->deposit_fee;

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

}