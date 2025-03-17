<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class SmtpValidator
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
                'host'         => 'required|max:60',
                'port'         => 'required|integer',
                'encryption'   => 'required|in:ssl,tls',
                'username'     => 'required|max:160',
                'password'     => 'nullable|max:160',
                'from_address' => 'required|max:60',
                'from_name'    => 'required|max:60',
            ];

            // Set errors messages
            $messages = [
                'host.required'         => __('messages.t_validator_required'),
                'host.max'              => __('messages.t_validator_max', ['max' => 60]),
                'port.required'         => __('messages.t_validator_required'),
                'port.integer'          => __('messages.t_validator_integer'),
                'encryption.required'   => __('messages.t_validator_required'),
                'encryption.in'         => __('messages.t_validator_in'),
                'username.required'     => __('messages.t_validator_required'),
                'username.max'          => __('messages.t_validator_max', ['max' => 160]),
                'password.max'          => __('messages.t_validator_max', ['max' => 160]),
                'from_address.required' => __('messages.t_validator_required'),
                'from_address.max'      => __('messages.t_validator_max', ['max' => 60]),
                'from_name.required'    => __('messages.t_validator_required'),
                'from_name.max'         => __('messages.t_validator_max', ['max' => 60])
            ];

            // Set data to validate
            $data     = [
                'host'         => $request->host,
                'port'         => $request->port,
                'encryption'   => $request->encryption,
                'username'     => $request->username,
                'password'     => $request->password,
                'from_address' => $request->from_address,
                'from_name'    => $request->from_name
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
