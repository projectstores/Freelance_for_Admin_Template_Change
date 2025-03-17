<?php

namespace App\Http\Validators\Admin\Services;

use Illuminate\Support\Facades\Validator;

class CloudinaryValidator
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
                'cloud_url'     => 'required|max:200',
                'upload_preset' => 'required|max:100'
            ];

            // Set errors messages
            $messages = [
                'cloud_url.required'     => __('messages.t_validator_required'),
                'cloud_url.max'          => __('messages.t_validator_max', ['max' => 200]),
                'upload_preset.required' => __('messages.t_validator_required'),
                'upload_preset.max'      => __('messages.t_validator_max', ['max' => 100])
            ];

            // Set data to validate
            $data     = [
                'cloud_url'     => $request->cloud_url,
                'upload_preset' => $request->upload_preset
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
