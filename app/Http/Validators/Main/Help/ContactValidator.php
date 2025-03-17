<?php

namespace App\Http\Validators\Main\Help;

use Illuminate\Support\Facades\Validator;

class ContactValidator
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
                'name'    => 'required|max:60',
                'email'   => 'required|email|max:60',
                'subject' => 'required|max:120',
                'message' => 'required|max:2500',
            ];

            // Set errors messages
            $messages = [
                'name.required'    => __('messages.t_validator_required'),
                'name.max'         => __('messages.t_validator_max', ['max' => 60]),
                'email.required'   => __('messages.t_validator_required'),
                'email.max'        => __('messages.t_validator_max', ['max' => 60]),
                'email.email'      => __('messages.t_validator_email'),
                'subject.required' => __('messages.t_validator_required'),
                'subject.max'      => __('messages.t_validator_max', ['max' => 120]),
                'message.required' => __('messages.t_validator_required'),
                'message.max'      => __('messages.t_validator_max', ['max' => 2500]),
            ];

            // Set data to validate
            $data     = [
                'name'    => $request->name,
                'email'   => $request->email,
                'subject' => $request->subject,
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
