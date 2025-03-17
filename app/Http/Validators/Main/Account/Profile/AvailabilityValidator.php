<?php

namespace App\Http\Validators\Main\Account\Profile;

use Illuminate\Support\Facades\Validator;

class AvailabilityValidator
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
                'availability_message' => 'required|max:750',
                'availability_date'    => 'required|date_format:m/d/Y'
            ];

            // Set errors messages
            $messages = [
                'availability_message.required' => __('messages.t_validator_required'),
                'availability_message.max'      => __('messages.t_validator_max', ['max' => 750]),
                'availability_date.required'    => __('messages.t_validator_required'),
                'availability_date.date_format' => __('messages.t_validator_date_format')
            ];

            // Set data to validate
            $data     = [
                'availability_message' => $request->availability_message,
                'availability_date'    => $request->availability_date
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
