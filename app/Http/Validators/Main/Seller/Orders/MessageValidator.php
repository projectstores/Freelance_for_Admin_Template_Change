<?php

namespace App\Http\Validators\Main\Seller\Orders;

use Illuminate\Support\Facades\Validator;

class MessageValidator
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
                'message'  => 'required|max:750'
            ];

            // Set errors messages
            $messages = [
                'message.required' => __('messages.t_validator_required'),
                'message.max'      => __('messages.t_validator_max', ['max' => 750]),
            ];

            // Set data to validate
            $data     = [
                'message' => $request->message
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
