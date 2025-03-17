<?php

namespace App\Http\Validators\Admin\Blog;

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
                'title'           => 'required|max:100|unique:blog_articles',
                'slug'            => 'required|max:160|unique:blog_articles',
                'content'         => 'required',
                'reading_time'    => 'required|integer',
                'image'           => 'required|image|mimes:jpg,jpeg,png',
                'seo_description' => 'nullable|max:250'
            ];

            // Set errors messages
            $messages = [
                'title.required'           => __('messages.t_validator_required'),
                'title.max'                => __('messages.t_validator_max', ['max' => 100]),
                'title.unique'             => __('messages.t_validator_unique'),
                'slug.required'            => __('messages.t_validator_required'),
                'slug.max'                 => __('messages.t_validator_max', ['max' => 160]),
                'slug.unique'              => __('messages.t_validator_unique'),
                'content.required'         => __('messages.t_validator_required'),
                'password.max'             => __('messages.t_validator_max', ['max' => 60]),
                'reading_time.required'    => __('messages.t_validator_required'),
                'reading_time.integer'     => __('messages.t_validator_integer'),
                'image.required'           => __('messages.t_validator_required'),
                'image.image'              => __('messages.t_validator_image'),
                'image.mimes'              => __('messages.t_validator_mimes'),
                'seo_description.required' => __('messages.t_validator_required'),
                'seo_description.max'      => __('messages.t_validator_max', ['max' => 250]),
            ];

            // Set data to validate
            $data     = [
                'title'           => $request->title,
                'slug'            => $request->slug,
                'content'         => $request->content,
                'image'           => $request->image,
                'reading_time'    => $request->reading_time,
                'seo_description' => $request->seo_description,
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
