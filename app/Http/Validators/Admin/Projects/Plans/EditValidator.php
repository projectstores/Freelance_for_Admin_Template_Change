<?php

namespace App\Http\Validators\Admin\Projects\Plans;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
                'title'            => ['required', 'max:60', Rule::unique('projects_plans')->ignore($request->plan->id)],
                'description'      => 'required|max:500',
                'days'             => 'nullable|integer',
                'price'            => 'required|numeric',
                'badge_text_color' => 'required|max:7',
                'badge_bg_color'   => 'required|max:7',
            ];

            // Set errors messages
            $messages = [
                'is_active.boolean'         => __('messages.t_validator_boolean'),
                'title.required'            => __('messages.t_validator_required'),
                'title.max'                 => __('messages.t_validator_max', ['max' => 60]),
                'title.unique'              => __('messages.t_validator_unique'),
                'description.required'      => __('messages.t_validator_required'),
                'description.max'           => __('messages.t_validator_max', ['max' => 500]),
                'days.integer'              => __('messages.t_validator_integer'),
                'price.required'            => __('messages.t_validator_required'),
                'price.numeric'             => __('messages.t_validator_numeric'),
                'badge_text_color.required' => __('messages.t_validator_required'),
                'badge_text_color.max'      => __('messages.t_validator_max', ['max' => 7]),
                'badge_bg_color.required'   => __('messages.t_validator_required'),
                'badge_bg_color.max'        => __('messages.t_validator_max', ['max' => 7])
            ];

            // Set data to validate
            $data     = [
                'title'            => $request->title,
                'description'      => $request->description,
                'days'             => $request->days,
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
