<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use App\Models\User;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class PaytabsController extends Controller
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

            // Get user deposit transaction id
            $t_id        = $request->get('t');

            // Get transaction
            $transaction = DepositTransaction::where('user_id', auth()->id())->where('transaction_id', $t_id)->whereStatus('pending')->first();

            // Check if transaction exists
            if (!$transaction) {
                
                // Not found
                return redirect('account/deposit/history')->with('error', __('messages.t_toast_something_went_wrong'));

            }

            // Get payment
            $payment = paypage::queryTransaction($request->get('tranRef'));

            // Check payment status
            if ( $payment && $payment->success && $payment->payment_result->response_status === 'A' ) {

                // Get default currency exchange rate
                $default_currency_exchange   = settings('currency')->exchange_rate;

                // Get payment gateway exchange rate
                $gateway_currency_exchange   = settings('paytabs')->exchange_rate;

                // Get paid amount
                $amount                      = $payment->tran_total;

                // Calculate fee
                $fee                         = $this->calculateFee($amount);

                // Set transaction id
                $transaction_id              = $payment->tran_ref;

                // Update transaction
                $transaction->transaction_id = $transaction_id;
                $transaction->status         = 'paid';
                $transaction->save();

                // Add funds to account
                $this->addFunds(round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 ));

                // Redirect to transactions history
                return redirect('account/deposit/history')->with('success', __('messages.t_ur_transaction_has_completed'));

            } else {

                // Payment failed
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
            $fee_rate = settings('paytabs')->deposit_fee;

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