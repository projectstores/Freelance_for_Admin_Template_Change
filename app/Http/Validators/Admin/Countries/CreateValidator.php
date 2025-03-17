<?php

namespace App\Http\Validators\Admin\Countries;

use Illuminate\Support\Facades\Validator;

class CreateValidator
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
                'name'      => 'required|max:60|unique:countries',
                'code'      => 'required|max:3|unique:countries',
                'is_active' => 'boolean'
            ];

            // Set errors messages
            $messages = [
                'name.required'     => __('messages.t_validator_required'),
                'name.max'          => __('messages.t_validator_max', ['max' => 60]),
                'name.unique'       => __('messages.t_validator_unique'),
                'code.required'     => __('messages.t_validator_required'),
                'code.max'          => __('messages.t_validator_max', ['max' => 3]),
                'code.unique'       => __('messages.t_validator_unique'),
                'is_active.boolean' => __('messages.t_validator_boolean')
            ];

            // Set data to validate
            $data     = [
                'name'      => $request->name,
                'code'      => $request->code,
                'is_active' => $request->is_active,
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
