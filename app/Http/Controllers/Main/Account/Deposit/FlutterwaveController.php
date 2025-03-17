<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use App\Models\User;

class FlutterwaveController extends Controller
{
   
    /**
     * Stripe callback
     *
     * @param Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        try {

            // Set secret key
            $secret_key                 = config('flutterwave.secret_key');

            // Get transaction id
            $flutterwave_transaction_id = $request->get('transaction_id');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $secret_key,
                'Accept'        => 'application/json',
            ])->get("https://api.flutterwave.com/v3/transactions/$flutterwave_transaction_id/verify");

            // Convert to json
            $payment                     = $response->json();

            // Get default currency exchange rate
            $default_currency_exchange   = settings('currency')->exchange_rate;

            // Get payment gateway exchange rate
            $gateway_currency_exchange   = settings('flutterwave')->exchange_rate;

            // Get gateway default currency
            $gateway_currency            = settings('flutterwave')->currency;

            // Set provider name
            $provider_name               = 'flutterwave';

            // Let's see if payment suuceeded
            if ( is_array($payment) && $payment['status'] === 'success' ) {

                // Get paid amount
                $amount                  = $payment['data']['amount'];

                // Calculate fee
                $fee                     = $this->calculateFee($amount);

                // Set transaction id
                $transaction_id          = $payment['data']['id'];

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

                // Success
                return redirect('account/deposit/history')->with('success', __('messages.t_ur_transaction_has_completed'));

            } else {

                // We couldn't process this payment
                return redirect('account/deposit/history')->with('error', __('messages.t_we_could_not_handle_ur_deposit_payment'));

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
            $fee_rate = settings('flutterwave')->deposit_fee;

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