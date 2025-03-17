<?php

namespace App\Http\Validators\Admin\Support;

use Illuminate\Support\Facades\Validator;

class ReplyValidator
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
                'message'  => 'required'
            ];

            // Set errors messages
            $messages = [
                'message.required' => __('messages.t_validator_required'),
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
