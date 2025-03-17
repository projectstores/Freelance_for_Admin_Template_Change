<?php

namespace App\Http\Validators\Admin\Projects\Plans\Bidding;

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
                'is_active'        => 'boolean',
                'price'            => 'required|numeric',
                'badge_text_color' => 'required|max:7',
                'badge_bg_color'   => 'required|max:7',
            ];

            // Set errors messages
            $messages = [
                'is_active.boolean'         => __('messages.t_validator_boolean'),
                'price.required'            => __('messages.t_validator_required'),
                'price.numeric'             => __('messages.t_validator_numeric'),
                'badge_text_color.required' => __('messages.t_validator_required'),
                'badge_text_color.max'      => __('messages.t_validator_max', ['max' => 7]),
                'badge_bg_color.required'   => __('messages.t_validator_required'),
                'badge_bg_color.max'        => __('messages.t_validator_max', ['max' => 7])
            ];

            // Set data to validate
            $data     = [
                'price'            => $request->price,
                'badge_text_color' => $request->badge_text_color,
                'badge_bg_color'   => $request->badge_bg_color,
                'is_active'        => $request->is_active
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
