<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use App\Models\User;

class VNPayController extends Controller
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

            // Set vnpay hash secret
            $vnp_HashSecret = config('vnpay.hash_secret');

            // Get secure hash from response
            $vnp_SecureHash = $request->get('vnp_SecureHash');

            // Set received data
            $inputData      = array(
                "vnp_Amount"            => request()->get('vnp_Amount'),
                "vnp_BankCode"          => request()->get('vnp_BankCode'),
                "vnp_BankTranNo"        => request()->get('vnp_BankTranNo'),
                "vnp_CardType"          => request()->get('vnp_CardType'),
                "vnp_OrderInfo"         => request()->get('vnp_OrderInfo'),
                "vnp_PayDate"           => request()->get('vnp_PayDate'),
                "vnp_ResponseCode"      => request()->get('vnp_ResponseCode'),
                "vnp_TmnCode"           => request()->get('vnp_TmnCode'),
                "vnp_TransactionNo"     => request()->get('vnp_TransactionNo'),
                "vnp_TransactionStatus" => request()->get('vnp_TransactionStatus'),
                "vnp_TxnRef"            => request()->get('vnp_TxnRef')
            );
            
            ksort($inputData);
            $i        = 0;
            $hashData = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
            }

            // Generate new secure hash
            $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

            // Check if generated secure hash matches the secure received from vnpay
            if ($vnp_SecureHash === $secureHash) {
                
                // Check payment status
                if (request()->get('vnp_TransactionStatus') === "00") {

                    // Get default currency exchange rate
                    $default_currency_exchange = settings('currency')->exchange_rate;

                    // Get payment gateway exchange rate
                    $gateway_currency_exchange = settings('vnpay')->exchange_rate;

                    // Get gateway default currency
                    $gateway_currency          = settings('vnpay')->currency;

                    // Set provider name
                    $provider_name             = 'vnpay';

                    // Get paid amount
                    $amount                    = request()->get('vnp_Amount') / 100;

                    // Calculate fee
                    $fee                       = $this->calculateFee($amount);

                    // Set transaction id
                    $transaction_id            = $request->get('vnp_TransactionNo');

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
                    $deposit->ip_address       = $request->ip();
                    $deposit->save();

                    // Add funds to account
                    $this->addFunds(round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 ));

                    // Redirect to transactions history
                    return redirect('account/deposit/history')->with('success', __('messages.t_ur_transaction_has_completed'));

                } else {

                    // Payment failed
                    return redirect('account/deposit/history')->with('error', __('messages.t_we_could_not_handle_ur_payment'));

                }

            } else {
                
                // Does not match
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
            $fee_rate = settings('vnpay')->deposit_fee;

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