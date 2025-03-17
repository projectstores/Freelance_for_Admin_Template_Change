<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class XenditController extends Controller
{
   
    /**
     * Xendit deposit callback
     *
     * @param Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        try {

            // Get status
            $status = $request->get('status');

            // Check if status is valid
            if (in_array($status, ['success', 'failed'])) {
                
                // Check if payment succeeded
                if ($status === 'success') {

                    // Redirect to orders
                    return redirect('account/deposit/history')->with('success', __('messages.t_ur_order_details_are_current_processed'));

                } else {

                    // Failed payment
                    return redirect('account/deposit/history')->with('error', __('messages.t_error_xendit_payment_failed'));

                }

            } else {

                // Go to orders page
                return redirect('account/deposit/history');

            }
            
        } catch (\Throwable $th) {
            
            // Something went wrong
            return redirect('account/deposit/history')->with('error', $th->getMessage());

        }
    }

}