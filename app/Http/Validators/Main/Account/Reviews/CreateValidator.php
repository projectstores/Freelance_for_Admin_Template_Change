<?php

namespace App\Http\Validators\Main\Account\Reviews;

use Illuminate\Support\Facades\Validator;

class CreateValidator
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
                'message' => 'required|max:800',
                'rating'  => 'required|in:1,2,3,4,5'
            ];

            // Set errors messages
            $messages = [
                'message.required' => __('messages.t_validator_required'),
                'message.max'      => __('messages.t_validator_max', ['max' => 800]),
                'rating.required'  => __('messages.t_validator_required'),
                'rating.in'        => __('messages.t_validator_in')
            ];

            // Set data to validate
            $data     = [
                'message' => $request->message,
                'rating'  => $request->rating
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
