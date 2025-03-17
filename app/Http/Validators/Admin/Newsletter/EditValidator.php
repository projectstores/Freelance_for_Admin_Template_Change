<?php

namespace App\Http\Validators\Admin\Newsletter;

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
                'is_enabled'  => 'boolean',
                'image_id'    => 'nullable|image',
            ];

            // Set errors messages
            $messages = [
                'is_enabled.boolean' => __('messages.t_validator_boolean'),
                'image_id.image'     => __('messages.t_validator_image'),
            ];

            // Set data to validate
            $data     = [
                'is_enabled' => $request->is_enabled,
                'image_id'  => $request->image_id,
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
