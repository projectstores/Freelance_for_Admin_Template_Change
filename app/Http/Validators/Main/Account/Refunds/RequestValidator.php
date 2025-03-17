<?php

namespace App\Http\Validators\Main\Account\Refunds;

use Illuminate\Support\Facades\Validator;

class RequestValidator
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
                'reason'  => 'required|max:1500'
            ];

            // Set errors messages
            $messages = [
                'reason.required' => __('messages.t_validator_required'),
                'reason.max'      => __('messages.t_validator_max', ['max' => 1500]),
            ];

            // Set data to validate
            $data     = [
                'reason' => $request->reason
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
