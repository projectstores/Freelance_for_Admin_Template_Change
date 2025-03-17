<?php

namespace App\Http\Validators\Main\Seller\Offers;

use Illuminate\Support\Facades\Validator;

class RejectValidator
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
                'reject_reason' => 'required|max:1500'
            ];

            // Set errors messages
            $messages = [
                'reject_reason.max'      => __('messages.t_validator_max', ['max' => 1500]),
                'reject_reason.required' => __('messages.t_validator_required')

            ];

            // Set data to validate
            $data     = [
                'reject_reason' => $request->reject_reason
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
