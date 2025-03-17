<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class WithdrawalValidator
{
    
    /**
     * Validate form
     *
     * @param object $request
     * @return void
     */
    static function validate($request)
    {
        try {

            // Set rules
            $rules    = [
                'min_withdrawal_amount' => 'required|integer',
                'withdrawal_period'     => 'required|in:daily,weekly,monthly'
            ];

            // Set errors messages
            $messages = [
                'min_withdrawal_amount.required' => __('messages.t_validator_required'),
                'min_withdrawal_amount.integer'  => __('messages.t_validator_integer'),
                'withdrawal_period.required'     => __('messages.t_validator_required'),
                'withdrawal_period.in'           => __('messages.t_validator_in'),
            ];

            // Set data to validate
            $data     = [
                'min_withdrawal_amount' => $request->min_withdrawal_amount,
                'withdrawal_period'     => $request->withdrawal_period,
            ];

            // Validate data
            Validator::make($data, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
