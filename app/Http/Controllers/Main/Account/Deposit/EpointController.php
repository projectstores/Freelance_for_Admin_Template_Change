<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DepositTransaction;
use App\Http\Controllers\Controller;

class EpointController extends Controller
{
   
    /**
     * Epoint deposit callback
     *
     * @param Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        try {

            // Get order id
            $order_id = request()->get('order_id');

            // Check if order exists
            if (!$order_id) {

                // Go to checkout
                return redirect('account/deposit/history')->with('error', __('messages.t_toast_something_went_wrong'));

            }

            // Set Epoint settings
            $public_key     = config('epoint.public_key');
            $private_key    = config('epoint.private_key');
            $statusUrl      = "https://epoint.az/api/1/get-status";

            // Set values
            $values = [
                'public_key' => $public_key,
                'order_id'   => $order_id
            ];

            // Encode values
            $data      = base64_encode(json_encode($values));

            // Generate signature
            $signature = base64_encode(sha1($private_key . $data . $private_key, 1));

            // Set fields
            $fields    = http_build_query(array( 'data' => $data, 'signature' => $signature));

            // Send request
            $_ch = curl_init();
            curl_setopt($_ch, CURLOPT_URL, $statusUrl);
            curl_setopt($_ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($_ch, CURLOPT_RETURNTRANSFER, TRUE);
            $_response = curl_exec($_ch);
            
            // Decode response
            $results = json_decode($_response, true);

            // Check if payment succeeded
            if ( is_array($results) && isset($results['status']) && $results['status'] === 'success' ) {

                // Get default currency exchange rate
                $default_currency_exchange   = settings('currency')->exchange_rate;

                // Get payment gateway exchange rate
                $gateway_currency_exchange   = settings('epoint')->exchange_rate;

                // Get paid amount
                $amount                      = convertToNumber($results['amount']);

                // Calculate fee
                $fee                         = $this->calculateFee($amount);

                // Make transaction
                $deposit                     = new DepositTransaction();
                $deposit->user_id            = auth()->id();
                $deposit->transaction_id     = $order_id;
                $deposit->payment_method     = 'epoint';
                $deposit->amount_total       = round( ($amount * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                $deposit->amount_fee         = round( ($fee * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                $deposit->amount_net         = round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 );
                $deposit->currency           = settings('epoint')->currency;
                $deposit->exchange_rate      = $gateway_currency_exchange;
                $deposit->status             = 'paid';
                $deposit->ip_address         = $request->ip();
                $deposit->save();

                // Add funds to account
                $this->addFunds(round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 ));

                // Success
                return redirect('account/deposit/history')->with('success', __('messages.t_ur_transaction_has_completed'));

            } else {

                // We couldn't process this payment
                return redirect('account/deposit/history')->with('error', __('messages.t_we_could_not_handle_ur_payment'));

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
            $fee_rate = settings('epoint')->deposit_fee;

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