<?php

namespace App\Http\Validators\Main\Account\Profile;

use Illuminate\Support\Facades\Validator;

class DescriptionValidator
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
                'description'  => 'required|max:1500'
            ];

            // Set errors messages
            $messages = [
                'description.required' => __('messages.t_validator_required'),
                'description.max'      => __('messages.t_validator_max', ['max' => 1500]),
            ];

            // Set data to validate
            $data     = [
                'description' => $request->description
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
