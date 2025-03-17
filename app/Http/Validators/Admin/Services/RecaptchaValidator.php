<?php

namespace App\Http\Validators\Admin\Services;

use Illuminate\Support\Facades\Validator;

class RecaptchaValidator
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
                'site_key'   => 'required|max:120',
                'secret_key' => 'required|max:120'
            ];

            // Set errors messages
            $messages = [
                'site_key.required'   => __('messages.t_validator_required'),
                'site_key.max'        => __('messages.t_validator_max', ['max' => 120]),
                'secret_key.required' => __('messages.t_validator_required'),
                'secret_key.max'      => __('messages.t_validator_max', ['max' => 120])
            ];

            // Set data to validate
            $data     = [
                'site_key'   => $request->site_key,
                'secret_key' => $request->secret_key
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
