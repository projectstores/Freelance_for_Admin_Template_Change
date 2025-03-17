<?php

namespace App\Http\Validators\Admin\Profile;

use Illuminate\Support\Facades\Validator;

class EditValidator
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
                'username'         => 'required|max:60',
                'email'            => 'required|email|max:60',
                'password'         => 'required|max:60',
                'new_password'     => 'nullable|max:60',
                'password_confirm' => 'nullable|max:60|same:new_password',
            ];

            // Set errors messages
            $messages = [
                'username.required'     => __('messages.t_validator_required'),
                'username.max'          => __('messages.t_validator_max', ['max' => 60]),
                'email.required'        => __('messages.t_validator_required'),
                'email.email'           => __('messages.t_validator_email'),
                'email.max'             => __('messages.t_validator_max', ['max' => 60]),
                'password.required'     => __('messages.t_validator_required'),
                'password.max'          => __('messages.t_validator_max', ['max' => 60]),
                'new_password.max'      => __('messages.t_validator_max', ['max' => 60]),
                'password_confirm.max'  => __('messages.t_validator_max', ['max' => 60]),
                'password_confirm.same' => __('messages.t_validator_same')
            ];

            // Set data to validate
            $data     = [
                'username'         => $request->username,
                'email'            => $request->email,
                'password'         => $request->password,
                'new_password'     => $request->new_password,
                'password_confirm' => $request->password_confirm
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
