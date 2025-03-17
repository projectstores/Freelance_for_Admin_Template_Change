<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class GeneralValidator
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
                'title'                => 'required|max:60',
                'subtitle'             => 'required|max:120',
                'separator'            => 'required|max:5',
                'logo'                 => 'nullable|image|mimes:jpg,png,jpeg',
                'favicon'              => 'nullable|image|mimes:jpg,png,jpeg',
                'announce_link'        => 'nullable|max:160',
                'announce_text'        => 'nullable|max:350',
                'is_language_switcher' => 'boolean',
                'default_language'     => 'required|max:2',
            ];

            // Set errors messages
            $messages = [
                'title.required'               => __('messages.t_validator_required'),
                'title.max'                    => __('messages.t_validator_max', ['max' => 60]),
                'subtitle.required'            => __('messages.t_validator_required'),
                'subtitle.max'                 => __('messages.t_validator_max', ['max' => 120]),
                'separator.required'           => __('messages.t_validator_required'),
                'separator.max'                => __('messages.t_validator_max', ['max' => 5]),
                'logo.image'                   => __('messages.t_validator_image'),
                'logo.mimes'                   => __('messages.t_validator_mimes'),
                'favicon.image'                => __('messages.t_validator_image'),
                'favicon.mimes'                => __('messages.t_validator_mimes'),
                'announce_link.max'            => __('messages.t_validator_max', ['max' => 160]),
                'announce_text.max'            => __('messages.t_validator_max', ['max' => 350]),
                'is_language_switcher.boolean' => __('messages.t_validator_boolean'),
                'default_language.required'    => __('messages.t_validator_required'),
                'default_language.max'         => __('messages.t_validator_max', ['max' => 2]),
            ];

            // Set data to validate
            $data     = [
                'title'                => $request->title,
                'subtitle'             => $request->subtitle,
                'separator'            => $request->separator,
                'logo'                 => $request->logo,
                'favicon'              => $request->favicon,
                'announce_link'        => $request->announce_link,
                'announce_text'        => $request->announce_text,
                'is_language_switcher' => $request->is_language_switcher,
                'default_language'     => $request->default_language
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
