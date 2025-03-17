<?php

namespace App\Http\Validators\Main\Checkout;

use Illuminate\Support\Facades\Validator;

class PlaceValidator
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
                'firstname' => 'required|max:60',
                'lastname'  => 'required|max:60',
                'email'     => 'required|email|max:60',
                'company'   => 'nullable|max:60',
                'address'   => 'required|max:600'
            ];

            // Set errors messages
            $messages = [
                'firstname.required' => __('messages.t_validator_required'),
                'firstname.max'      => __('messages.t_validator_max', ['max' => 60]),
                'lastname.required'  => __('messages.t_validator_required'),
                'lastname.max'       => __('messages.t_validator_max', ['max' => 60]),
                'email.max'          => __('messages.t_validator_max', ['max' => 60]),
                'email.required'     => __('messages.t_validator_required'),
                'email.email'        => __('messages.t_validator_email'),
                'company.max'        => __('messages.t_validator_max', ['max' => 60]),
                'address.max'        => __('messages.t_validator_max', ['max' => 600]),
                'address.required'   => __('messages.t_validator_required')
            ];

            // Set data to validate
            $data     = [
                'firstname' => $request->firstname,
                'lastname'  => $request->lastname,
                'email'     => $request->email,
                'company'   => $request->company,
                'address'   => $request->address
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
