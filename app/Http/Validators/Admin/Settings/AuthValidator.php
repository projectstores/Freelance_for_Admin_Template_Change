<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class AuthValidator
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
                'verification_required'        => 'boolean',
                'verification_type'            => 'required|in:admin,email',
                'verification_expiry_period'   => 'required|integer',
                'password_reset_expiry_period' => 'required|integer',
                'auth_img_id'                  => 'nullable|image',
                'is_facebook_login'            => 'boolean',
                'is_google_login'              => 'boolean',
                'is_twitter_login'             => 'boolean',
                'is_github_login'              => 'boolean',
                'is_linkedin_login'            => 'boolean',
                'facebook_client_id'           => 'nullable|max:120',
                'facebook_client_secret'       => 'nullable|max:120',
                'twitter_client_id'            => 'nullable|max:120',
                'twitter_client_secret'        => 'nullable|max:120',
                'google_client_id'             => 'nullable|max:120',
                'google_client_secret'         => 'nullable|max:120',
                'github_client_id'             => 'nullable|max:120',
                'github_client_secret'         => 'nullable|max:120',
                'linkedin_client_id'           => 'nullable|max:120',
                'linkedin_client_secret'       => 'nullable|max:120',
            ];

            // Set errors messages
            $messages = [
                'verification_required.boolean'         => __('messages.t_validator_boolean'),
                'verification_type.required'            => __('messages.t_validator_required'),
                'verification_type.in'                  => __('messages.t_validator_in'),
                'verification_expiry_period.required'   => __('messages.t_validator_required'),
                'verification_expiry_period.integer'    => __('messages.t_validator_integer'),
                'password_reset_expiry_period.required' => __('messages.t_validator_required'),
                'password_reset_expiry_period.integer'  => __('messages.t_validator_integer'),
                'auth_img_id.image'                     => __('messages.t_validator_image'),
                'is_facebook_login.boolean'             => __('messages.t_validator_boolean'),
                'is_google_login.boolean'               => __('messages.t_validator_boolean'),
                'is_twitter_login.boolean'              => __('messages.t_validator_boolean'),
                'is_github_login.boolean'               => __('messages.t_validator_boolean'),
                'is_linkedin_login.boolean'             => __('messages.t_validator_boolean'),
                'facebook_client_id.max'                => __('messages.t_validator_max', ['max' => 120]),
                'facebook_client_secret.max'            => __('messages.t_validator_max', ['max' => 120]),
                'twitter_client_id.max'                 => __('messages.t_validator_max', ['max' => 120]),
                'twitter_client_secret.max'             => __('messages.t_validator_max', ['max' => 120]),
                'google_client_id.max'                  => __('messages.t_validator_max', ['max' => 120]),
                'google_client_secret.max'              => __('messages.t_validator_max', ['max' => 120]),
                'github_client_id.max'                  => __('messages.t_validator_max', ['max' => 120]),
                'github_client_secret.max'              => __('messages.t_validator_max', ['max' => 120]),
                'linkedin_client_id.max'                => __('messages.t_validator_max', ['max' => 120]),
                'linkedin_client_secret.max'            => __('messages.t_validator_max', ['max' => 120])
            ];

            // Set data to validate
            $data     = [
                'verification_required'        => $request->verification_required,
                'verification_type'            => $request->verification_type,
                'verification_expiry_period'   => $request->verification_expiry_period,
                'password_reset_expiry_period' => $request->password_reset_expiry_period,
                'auth_img_id'                  => $request->auth_img_id,
                'is_facebook_login'            => $request->is_facebook_login,
                'is_google_login'              => $request->is_google_login,
                'is_twitter_login'             => $request->is_twitter_login,
                'is_github_login'              => $request->is_github_login,
                'is_linkedin_login'            => $request->is_linkedin_login,
                'facebook_client_id'           => $request->facebook_client_id,
                'facebook_client_secret'       => $request->facebook_client_secret,
                'twitter_client_id'            => $request->twitter_client_id,
                'twitter_client_secret'        => $request->twitter_client_secret,
                'google_client_id'             => $request->google_client_id,
                'google_client_secret'         => $request->google_client_secret,
                'github_client_id'             => $request->github_client_id,
                'github_client_secret'         => $request->github_client_secret,
                'linkedin_client_id'           => $request->linkedin_client_id,
                'linkedin_client_secret'       => $request->linkedin_client_secret
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
