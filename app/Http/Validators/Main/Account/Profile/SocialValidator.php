<?php

namespace App\Http\Validators\Main\Account\Profile;

use Illuminate\Support\Facades\Validator;

class SocialValidator
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
                'facebook_profile'      => 'nullable|max:160|url',
                'twitter_profile'       => 'nullable|max:160|url',
                'dribbble_profile'      => 'nullable|max:160|url',
                'stackoverflow_profile' => 'nullable|max:160|url',
                'github_profile'        => 'nullable|max:160|url',
                'youtube_profile'       => 'nullable|max:160|url',
                'vimeo_profile'         => 'nullable|max:160|url'
            ];

            // Set errors messages
            $messages = [
                'facebook_profile.max'           => __('messages.t_validator_max', ['max' => 160]),
                'facebook_profile.url'           => __('messages.t_validator_url'),
                'twitter_profile.max'            => __('messages.t_validator_max', ['max' => 160]),
                'twitter_profile.url'            => __('messages.t_validator_url'),
                'dribbble_profile.max'           => __('messages.t_validator_max', ['max' => 160]),
                'dribbble_profile.url'           => __('messages.t_validator_url'),
                'stackoverflow_profile.max'      => __('messages.t_validator_max', ['max' => 160]),
                'stackoverflow_profile.url'      => __('messages.t_validator_url'),
                'github_profile.max'             => __('messages.t_validator_max', ['max' => 160]),
                'github_profile.url'             => __('messages.t_validator_url'),
                'youtube_profile.max'            => __('messages.t_validator_max', ['max' => 160]),
                'youtube_profile.url'            => __('messages.t_validator_url'),
                'vimeo_profile.max'              => __('messages.t_validator_max', ['max' => 160]),
                'vimeo_profile.url'              => __('messages.t_validator_url'),
            ];

            // Set data to validate
            $data     = [
                'facebook_profile'      => $request->facebook_profile,
                'twitter_profile'       => $request->twitter_profile,
                'dribbble_profile'      => $request->dribbble_profile,
                'stackoverflow_profile' => $request->stackoverflow_profile,
                'github_profile'        => $request->github_profile,
                'youtube_profile'       => $request->youtube_profile,
                'vimeo_profile'         => $request->vimeo_profile
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
