<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class CurrencyValidator
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
                'name'          => 'required|max:60',
                'code'          => 'required|max:3',
                'exchange_rate' => 'required|max:10'
            ];

            // Set errors messages
            $messages = [
                'name.required'          => __('messages.t_validator_required'),
                'name.max'               => __('messages.t_validator_max', ['max' => 60]),
                'code.required'          => __('messages.t_validator_required'),
                'code.max'               => __('messages.t_validator_max', ['max' => 3]),
                'exchange_rate.required' => __('messages.t_validator_required'),
                'exchange_rate.max'      => __('messages.t_validator_max', ['max' => 10]),
            ];

            // Set data to validate
            $data     = [
                'name'          => $request->name,
                'code'          => $request->code,
                'exchange_rate' => $request->exchange_rate,
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
