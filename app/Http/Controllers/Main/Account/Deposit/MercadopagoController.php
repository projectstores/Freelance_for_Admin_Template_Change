<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\DepositTransaction;
use App\Models\DepositWebhook;
use Illuminate\Http\Request;
use App\Models\User;

class MercadopagoController extends Controller
{
   
    /**
     * MercadoPago callback
     *
     * @param Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        try {

            // Initialize MercadoPago SDK
            \MercadoPago\SDK::setAccessToken(config('mercadopago.access_token'));

            // Get payment
            $payment = \MercadoPago\Payment::find_by_id($request->get('payment_id'));

            // Check if payment approved
            if ($payment && $payment->status === 'approved') {

                // Set transaction id
                $transaction_id              = $payment->id;

                // Check if already paid
                $already_paid                = DepositTransaction::where('transaction_id', $transaction_id)->first();
    
                // Verify
                if ($already_paid) {
                    return redirect('account/deposit/history');
                }
                
                // Get default currency exchange rate
                $default_currency_exchange   = settings('currency')->exchange_rate;

                // Get payment gateway exchange rate
                $gateway_currency_exchange   = settings('mercadopago')->exchange_rate;

                // Get gateway default currency
                $gateway_currency            = settings('mercadopago')->currency;

                // Set provider name
                $provider_name               = 'mercadopago';

                // Get paid amount
                $amount                      = $payment->transaction_amount;

                // Calculate fee
                $fee                         = $this->calculateFee($amount);

                // Make transaction
                $deposit                     = new DepositTransaction();
                $deposit->user_id            = auth()->id();
                $deposit->transaction_id     = $transaction_id;
                $deposit->payment_method     = $provider_name;
                $deposit->amount_total       = round( ($amount * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                $deposit->amount_fee         = round( ($fee * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                $deposit->amount_net         = round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 );
                $deposit->currency           = $gateway_currency;
                $deposit->exchange_rate      = $gateway_currency_exchange;
                $deposit->status             = 'paid';
                $deposit->ip_address         = $request->ip();
                $deposit->save();

                // Add funds to account
                $this->addFunds(round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 ));

                // Success
                return redirect('account/deposit/history')->with('success', __('messages.t_ur_transaction_has_completed'));

            } else {

                // Something went wrong
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
            $fee_rate = settings('mercadopago')->deposit_fee;

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