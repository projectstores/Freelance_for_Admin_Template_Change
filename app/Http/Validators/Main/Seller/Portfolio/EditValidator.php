<?php

namespace App\Http\Validators\Main\Seller\Portfolio;

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

            // Set maximum portfolio images
            $max_images = settings('media')->portfolio_max_images;

            // Set maximum size per image
            $max_size   = settings('media')->portfolio_max_size * 1024;

            // Set rules
            $rules    = [
                'title'       => 'required|max:100',
                'description' => 'required',
                'thumbnail'   => 'nullable|image|mimes:jpeg,jpg,png|max:' . $max_size,
                'link'        => 'nullable|max:120|url',
                'video'       => 'nullable|max:120|url',
                'images'      => 'nullable|array|max:' . $max_images,
                'images.*'    => 'required|image|mimes:jpeg,jpg,png|max:' . $max_size
            ];

            // Set errors messages
            $messages = [
                'title.required'       => __('messages.t_validator_required'),
                'title.max'            => __('messages.t_validator_max', ['max' => 100]),
                'description.required' => __('messages.t_validator_required'),
                'thumbnail.image'      => __('messages.t_validator_image'),
                'thumbnail.mimes'      => __('messages.t_validator_mimes'),
                'thumbnail.max'        => __('messages.t_validator_max_size', ['max' => human_filesize($max_size)]),
                'link.max'             => __('messages.t_validator_max', ['max' => 120]),
                'link.url'             => __('messages.t_validator_url'),
                'video.max'            => __('messages.t_validator_max', ['max' => 120]),
                'video.url'            => __('messages.t_validator_url'),
                'images.array'         => __('messages.t_validator_array'),
                'images.min'           => __('messages.t_validator_min_array', ['min' => 1]),
                'images.max'           => __('messages.t_validator_max_array', ['max' => $max_images]),
                'images.*.required'    => __('messages.t_validator_required'),
                'images.*.image'       => __('messages.t_validator_image'),
                'images.*.mimes'       => __('messages.t_validator_mimes'),
                'images.*.max'         => __('messages.t_validator_max_size', ['max' => human_filesize($max_size)]),
            ];

            // Set data to validate
            $data     = [
                'title'       => $request->title,
                'description' => $request->description,
                'thumbnail'   => $request->thumbnail,
                'link'        => $request->link,
                'video'       => $request->video,
                'images'      => $request->images
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
