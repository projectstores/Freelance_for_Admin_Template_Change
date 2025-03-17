<?php

namespace App\Http\Validators\Main\Account\Verification;

use Illuminate\Support\Facades\Validator;

class DocPassportValidator
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
                'front' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            ];

            // Set errors messages
            $messages = [
                'front.required' => __('messages.t_validator_required'),
                'front.image'    => __('messages.t_validator_image'),
                'front.mimes'    => __('messages.t_validator_mimes'),
                'front.max'      => __('messages.t_validator_max_size', ['max' => human_filesize(5120)]),
            ];

            // Set data to validate
            $data     = [
                'front' => isset($request->doc_passport['front']) ? $request->doc_passport['front'] : null
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
