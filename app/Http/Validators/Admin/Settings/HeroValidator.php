<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class HeroValidator
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
                
                'enable_bg_img'   => 'boolean',
                'bg_color'        => 'required|regex:/^#[a-f0-9]{6}$/i',
                'bg_large_height' => 'required|integer',
                'bg_small_height' => 'required|integer',
                'bg_large'        => 'nullable|image',
                'bg_medium'       => 'nullable|image',
                'bg_small'        => 'nullable|image',
                'tagline'         => 'required',
            ];

            // Set errors messages
            $messages = [
                'enable_bg_img.boolean'    => __('messages.t_validator_boolean'),
                'bg_color.required'        => __('messages.t_validator_required'),
                'bg_color.regex'           => __('messages.t_validator_hex_color'),
                'bg_large_height.required' => __('messages.t_validator_required'),
                'bg_large_height.integer'  => __('messages.t_validator_integer'),
                'bg_small_height.required' => __('messages.t_validator_required'),
                'bg_small_height.integer'  => __('messages.t_validator_integer'),
                'bg_large.image'           => __('messages.t_validator_image'),
                'bg_medium.image'          => __('messages.t_validator_image'),
                'bg_small.image'           => __('messages.t_validator_image'),
                'tagline.required'         => __('messages.t_validator_required'),

            ];

            // Set data to validate
            $data     = [
                'enable_bg_img'       => $request->enable_bg_img,
                'bg_color'            => $request->bg_color,
                'bg_large_height'     => $request->bg_large_height,
                'bg_small_height'     => $request->bg_small_height,
                'bg_large'            => $request->bg_large,
                'bg_medium'           => $request->bg_medium,
                'bg_small'            => $request->bg_small,
                'tagline'             => $request->tagline,
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
