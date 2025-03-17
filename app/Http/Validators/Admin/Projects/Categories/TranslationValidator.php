<?php

namespace App\Http\Validators\Admin\Projects\Categories;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TranslationValidator
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
                'translation_language_code'  => ['required', Rule::exists('languages', 'language_code')->where('language_code', '!=', settings('general')->default_language)],
                'translation_language_value' => 'required|max:100',
            ];

            // Set errors messages
            $messages = [
                'translation_language_code.required'  => __('messages.t_validator_required'),
                'translation_language_code.exists'    => __('messages.t_validator_exists'),
                'translation_language_value.required' => __('messages.t_validator_required'),
                'translation_language_value.max'      => __('messages.t_validator_max', ['max' => 100]),
            ];

            // Set data to validate
            $data     = [
                'translation_language_code'  => $request->translation_language_code,
                'translation_language_value' => $request->translation_language_value
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
