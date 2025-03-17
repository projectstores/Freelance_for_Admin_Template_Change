<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class HomeValidator
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
                'show_popular_services'     => 'boolean',
                'show_made_with'            => 'boolean',
                'show_join_us_banner'       => 'boolean',
                'show_benefits'             => 'boolean',
                'show_home_video'           => 'boolean',
                'show_gigs'                 => 'boolean',
                'youtube_video_id'          => 'required',
                'join_us_image_id'          => 'nullable|image',
                'made_with_images'          => 'required|array|min:1',
                'benefits_1_logo'           => 'nullable|image',
                'benefits_2_logo'           => 'nullable|image',
                'benefits_3_logo'           => 'nullable|image',
                'benefits_4_logo'           => 'nullable|image',
            ];

            // Set errors messages
            $messages = [
                'show_popular_services.boolean'     => __('messages.t_validator_boolean'),
                'show_made_with.boolean'            => __('messages.t_validator_boolean'),
                'show_join_us_banner.boolean'       => __('messages.t_validator_boolean'),
                'show_benefits.boolean'             => __('messages.t_validator_boolean'),
                'show_home_video.boolean'           => __('messages.t_validator_boolean'),
                'show_gigs'                         => __('messages.t_validator_boolean'),
                'youtube_video_id.required'         => __('messages.t_validator_required'),
                'join_us_image_id.image'            => __('messages.t_validator_image'),
                'made_with_images.required'         => __('messages.t_validator_required'),
                'made_with_images.array'            => __('messages.t_validator_array'),
                'benefits_1_logo.image'             => __('messages.t_validator_image'),
                'benefits_2_logo.image'             => __('messages.t_validator_image'),
                'benefits_3_logo.image'             => __('messages.t_validator_image'),
                'benefits_4_logo.image'             => __('messages.t_validator_image'),

            ];

            // Set data to validate
            $data     = [
                'show_popular_services'     => $request->show_popular_services,
                'show_made_with'            => $request->show_made_with,
                'show_join_us_banner'       => $request->show_join_us_banner,
                'show_benefits'             => $request->show_benefits,
                'show_home_video'           => $request->show_home_video,
                'show_gigs'                 => $request->show_gigs,
                'youtube_video_id'          => $request->youtube_video_id,
                'join_us_image_id'          => $request->join_us_image_id,
                'made_with_images'          => $request->made_with_images,
                'benefits_1_logo'           => $request->benefits_1_logo,
                'benefits_2_logo'           => $request->benefits_2_logo,
                'benefits_3_logo'           => $request->benefits_3_logo,
                'benefits_4_logo'           => $request->benefits_4_logo,
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
