<?php
 
namespace App\Http\Controllers\Main\Checkout;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
                'order_note'     => __('messages.t_checkout'),
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

}