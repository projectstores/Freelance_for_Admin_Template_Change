<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use App\Models\User;

class StripeController extends Controller
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
            
            // Set Stripe key
            $stripe                      = new \Stripe\StripeClient(config('stripe.secret_key'));

            $payment                     = $stripe->paymentIntents->retrieve( $request->get('payment_intent'), [] );

            // Get default currency exchange rate
            $default_currency_exchange   = settings('currency')->exchange_rate;

            // Get payment gateway exchange rate
            $gateway_currency_exchange   = settings('stripe')->exchange_rate;

            // Get gateway default currency
            $gateway_currency            = settings('stripe')->currency;

            // Set provider name
            $provider_name               = 'stripe';

            // Let's see if payment suuceeded
            if ( $payment && $payment->status && $payment->status === 'succeeded' ) {

                // Get paid amount
                $amount                  = $payment->amount / 100;

                // Calculate fee
                $fee                     = $this->calculateFee($amount);

                // Set transaction id
                $transaction_id          = $payment->id;

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
            $fee_rate = settings('stripe')->deposit_fee;

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