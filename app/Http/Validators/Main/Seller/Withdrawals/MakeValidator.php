<?php

namespace App\Http\Validators\Main\Seller\Withdrawals;

use Illuminate\Support\Facades\Validator;

class MakeValidator
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
                'amount'  => 'required|max:20|regex:/^\d+(\.\d{1,2})?$/'
            ];

            // Set errors messages
            $messages = [
                'amount.required' => __('messages.t_validator_required'),
                'amount.max'      => __('messages.t_validator_max', ['max' => 20]),
                'amount.regex'    => __('messages.t_validator_regex'),
            ];

            // Set data to validate
            $data     = [
                'amount' => $request->amount
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
