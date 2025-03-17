<?php

namespace App\Http\Validators\Main\Seller\Orders;

use Illuminate\Support\Facades\Validator;

class DeliverValidator
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

            // Set max work size
            $max_size = settings('media')->delivered_work_max_size * 1024;

            // Set rules
            $rules    = [
                'work'           => 'nullable|file|mimes:zip|max:' . $max_size,
                'quick_response' => 'required|max:2500'
            ];

            // Set errors messages
            $messages = [
                'quick_response.required' => __('messages.t_validator_required'),
                'quick_response.max'      => __('messages.t_validator_max', ['max' => 2500]),
                'quick_response.file'     => __('messages.t_validator_file'),
                'quick_response.mimes'    => __('messages.t_validator_mimes'),
                'quick_response.max'      => __('messages.t_validator_max_size', ['max' => human_filesize($max_size)]),
            ];

            // Set data to validate
            $data     = [
                'quick_response' => $request->quick_response,
                'work'           => $request->work
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
