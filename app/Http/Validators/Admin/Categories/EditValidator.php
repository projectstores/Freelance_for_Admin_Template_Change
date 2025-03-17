<?php

namespace App\Http\Validators\Admin\Categories;

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
                'name'        => ['required', 'max:60', Rule::unique('categories')->ignore($request->category->id)],
                'slug'        => ['required', 'max:60', Rule::unique('categories')->ignore($request->category->id)],
                'description' => 'nullable|max:300',
                'icon'        => 'nullable|image|mimes:jpg,jpeg,png',
                'image'       => 'nullable|image|mimes:jpg,jpeg,png',
                'is_visible'  => 'boolean'
            ];

            // Set errors messages
            $messages = [
                'name.required'      => __('messages.t_validator_required'),
                'name.max'           => __('messages.t_validator_max', ['max' => 60]),
                'name.unique'        => __('messages.t_validator_unique'),
                'slug.required'      => __('messages.t_validator_required'),
                'slug.max'           => __('messages.t_validator_max', ['max' => 60]),
                'slug.unique'        => __('messages.t_validator_unique'),
                'description.max'    => __('messages.t_validator_max', ['max' => 300]),
                'icon.image'         => __('messages.t_validator_image'),
                'icon.mimes'         => __('messages.t_validator_mimes'),
                'image.image'        => __('messages.t_validator_image'),
                'image.mimes'        => __('messages.t_validator_mimes'),
                'is_visible.boolean' => __('messages.t_validator_boolean')
            ];

            // Set data to validate
            $data     = [
                'name'        => $request->name,
                'slug'        => $request->slug,
                'description' => $request->description,
                'icon'        => $request->icon,
                'image'       => $request->image,
                'is_visible'  => $request->is_visible,
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
