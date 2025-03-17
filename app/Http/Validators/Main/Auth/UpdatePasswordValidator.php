<?php

namespace App\Http\Validators\Main\Auth;

use Illuminate\Support\Facades\Validator;

class UpdatePasswordValidator
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
                'password'              => 'required|max:60|min:6',
                'password_confirmation' => "required|same:password"
            ];

            // Set errors messages
            $messages = [
                'password.required'              => __('messages.t_validator_required'),
                'password.max'                   => __('messages.t_validator_max', ['max' => 60]),
                'password.min'                   => __('messages.t_validator_min', ['min' => 6]),
                'password_confirmation.required' => __('messages.t_validator_required'),
                'password_confirmation.same'     => __('messages.t_validator_same')
            ];

            // Set data to validate
            $data     = [
                'password'              => $request->password,
                'password_confirmation' => $request->password_confirmation,
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
