<?php

namespace App\Http\Validators\Admin\Projects\Skills;

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
                'name'        => 'required|max:60|unique:projects_skills,name',
                'slug'        => 'required|max:60|unique:projects_skills,slug',
                'category_id' => 'required|exists:projects_categories,id'
            ];

            // Set errors messages
            $messages = [
                'name.required'        => __('messages.t_validator_required'),
                'name.max'             => __('messages.t_validator_max', ['max' => 60]),
                'name.unique'          => __('messages.t_validator_unique'),
                'slug.required'        => __('messages.t_validator_required'),
                'slug.max'             => __('messages.t_validator_max', ['max' => 160]),
                'slug.unique'          => __('messages.t_validator_unique'),
                'category_id.required' => __('messages.t_validator_required'),
                'category_id.exists'   => __('messages.t_validator_exists')
            ];

            // Set data to validate
            $data     = [
                'name'        => $request->name,
                'slug'        => $request->slug,
                'category_id' => $request->category_id
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
