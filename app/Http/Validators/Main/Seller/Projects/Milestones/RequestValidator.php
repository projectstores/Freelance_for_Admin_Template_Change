<?php

namespace App\Http\Validators\Main\Seller\Projects\Milestones;

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
                'amount'      => 'required|regex:/^\d+(\.\d{1,2})?$/|max:10',
                'description' => 'required|max:160'
            ];

            // Set errors messages
            $messages = [
                'amount.required'      => __('messages.t_validator_required'),
                'amount.regex'         => __('messages.t_validator_regex'),
                'amount.max'           => __('messages.t_validator_max', ['max' => 10]),
                'description.max'      => __('messages.t_validator_max', ['max' => 160]),
                'description.required' => __('messages.t_validator_required')

            ];

            // Set data to validate
            $data     = [
                'amount'      => $request->amount,
                'description' => $request->description
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
