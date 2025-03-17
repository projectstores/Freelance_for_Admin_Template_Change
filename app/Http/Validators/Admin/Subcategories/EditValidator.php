<?php

namespace App\Http\Validators\Admin\Subcategories;

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
                'name'        => ['required', 'max:60', Rule::unique('subcategories')->ignore($request->subcategory->id)],
                'slug'        => ['required', 'max:60', Rule::unique('subcategories')->ignore($request->subcategory->id)],
                'description' => 'required|max:350',
                'icon'        => 'nullable|image|mimes:jpg,jpeg,png',
                'image'       => 'nullable|image|mimes:jpg,jpeg,png',
                'parent_id'   => 'required|exists:categories,id',
            ];

            // Set errors messages
            $messages = [
                'name.required'        => __('messages.t_validator_required'),
                'name.max'             => __('messages.t_validator_max', ['max' => 60]),
                'name.unique'          => __('messages.t_validator_unique'),
                'slug.required'        => __('messages.t_validator_required'),
                'slug.max'             => __('messages.t_validator_max', ['max' => 60]),
                'slug.unique'          => __('messages.t_validator_unique'),
                'description.required' => __('messages.t_validator_required'),
                'description.max'      => __('messages.t_validator_max', ['max' => 350]),
                'icon.image'           => __('messages.t_validator_image'),
                'icon.mimes'           => __('messages.t_validator_mimes'),
                'image.image'          => __('messages.t_validator_image'),
                'image.mimes'          => __('messages.t_validator_mimes'),
                'parent_id.required'   => __('messages.t_validator_required'),
                'parent_id.exists'     => __('messages.t_validator_exists')
            ];

            // Set data to validate
            $data     = [
                'name'        => $request->name,
                'slug'        => $request->slug,
                'description' => $request->description,
                'icon'        => $request->icon,
                'image'       => $request->image,
                'parent_id'   => $request->parent_id
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
