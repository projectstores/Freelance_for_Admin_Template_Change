<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use Illuminate\Http\Request;
use App\Models\DepositWebhook;
use App\Http\Controllers\Controller;

class MollieController extends Controller
{
   
    /**
     * Mollie redirect
     *
     * @param Request $request
     * @return void
     */
    public function callback($id)
    {
        try {

            // Get saved data
            $data = DepositWebhook::where('payment_id', $id)
                                    ->where('payment_method', 'mollie')
                                    ->where('status', 'pending')
                                    ->first();

            // Check if exists
            if ($data) {
                
                // Go to deposit history
                return redirect('account/deposit/history')->with('success', __('messages.t_ur_order_details_are_current_processed'));

            } else {

                // Nothing found
                return redirect('account/deposit/history')->with('error', __('messages.t_toast_something_went_wrong'));

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            return redirect('account/deposit/history')->with('error', $th->getMessage());

        }
    }

}