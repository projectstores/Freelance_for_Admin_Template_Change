<?php

namespace App\Http\Validators\Main\Account\Profile;

use Illuminate\Support\Facades\Validator;

class AddLanguageValidator
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
                'name'  => 'required|max:100',
                'level' => 'required|in:basic,conversational,fluent,native'
            ];

            // Set errors messages
            $messages = [
                'name.required'  => __('messages.t_validator_required'),
                'name.max'       => __('messages.t_validator_max', ['max' => 100]),
                'level.required' => __('messages.t_validator_required'),
                'level.in'       => __('messages.t_validator_in')
            ];

            // Set data to validate
            $data     = [
                'name'  => isset($request->add_language['name']) ? $request->add_language['name'] : null,
                'level' => isset($request->add_language['level']) ? $request->add_language['level'] : null,
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
