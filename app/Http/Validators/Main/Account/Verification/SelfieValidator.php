<?php

namespace App\Http\Validators\Main\Account\Verification;

use Illuminate\Support\Facades\Validator;

class SelfieValidator
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
                'selfie'  => 'required|image|mimes:jpg,jpeg,png'
            ];

            // Set errors messages
            $messages = [
                'selfie.required' => __('messages.t_validator_required'),
                'selfie.image'    => __('messages.t_validator_image'),
                'selfie.mimes'    => __('messages.t_validator_mimes'),
            ];

            // Set data to validate
            $data     = [
                'selfie' => $request->selfie
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
