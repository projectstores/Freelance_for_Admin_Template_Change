<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class SeoValidator
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
                'description'      => 'required',
                'facebook_page_id' => 'nullable|max:60',
                'facebook_app_id'  => 'nullable|max:60',
                'twitter_username' => 'nullable|max:60',
                'ogimage'          => 'nullable|image|mimes:jpg,jpeg,png',
                'is_sitemap'       => 'boolean',
            ];

            // Set errors messages
            $messages = [
                'description.required' => __('messages.t_validator_required'),
                'facebook_page_id.max' => __('messages.t_validator_max', ['max' => 60]),
                'facebook_app_id.max'  => __('messages.t_validator_max', ['max' => 60]),
                'twitter_username.max' => __('messages.t_validator_max', ['max' => 60]),
                'ogimage.image'        => __('messages.t_validator_image'),
                'ogimage.mimes'        => __('messages.t_validator_mimes'),
                'is_sitemap.boolean'   => __('messages.t_validator_boolean'),
            ];

            // Set data to validate
            $data     = [
                'description'      => $request->description,
                'facebook_page_id' => $request->facebook_page_id,
                'facebook_app_id'  => $request->facebook_app_id,
                'twitter_username' => $request->twitter_username,
                'ogimage'          => $request->ogimage,
                'is_sitemap'       => $request->is_sitemap
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
