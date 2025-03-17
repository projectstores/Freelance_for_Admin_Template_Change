<?php

namespace App\Http\Validators\Admin\Projects\Categories;

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

            // Get category id
            $id       = $request->category->id;

            // Set rules
            $rules    = [
                'name'            => ['required', 'max:100', Rule::unique('projects_categories')->ignore($id)],
                'slug'            => ['required', 'max:160', Rule::unique('projects_categories')->ignore($id), 'regex:/^[a-zA-Z0-9-_]+$/'],
                'seo_description' => 'nullable|max:300',
                'thumbnail'       => 'nullable|image|mimes:jpg,png,jpeg',
                'ogimage'         => 'nullable|image|mimes:jpg,png,jpeg'
            ];

            // Set errors messages
            $messages = [
                'name.required'       => __('messages.t_validator_required'),
                'name.max'            => __('messages.t_validator_max', ['max' => 100]),
                'name.unique'         => __('messages.t_validator_unique'),
                'slug.required'       => __('messages.t_validator_required'),
                'slug.max'            => __('messages.t_validator_max', ['max' => 160]),
                'slug.unique'         => __('messages.t_validator_unique'),
                'slug.regex'          => __('messages.t_validator_regex'),
                'seo_description.max' => __('messages.t_validator_max', ['max' => 300]),
                'thumbnail.image'     => __('messages.t_validator_image'),
                'thumbnail.mimes'     => __('messages.t_validator_image'),
                'ogimage.image'       => __('messages.t_validator_image'),
                'ogimage.mimes'       => __('messages.t_validator_image')
            ];

            // Set data to validate
            $data     = [
                'name'            => $request->name,
                'slug'            => $request->slug,
                'seo_description' => $request->seo_description,
                'thumbnail'       => $request->thumbnail,
                'ogimage'         => $request->ogimage
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
