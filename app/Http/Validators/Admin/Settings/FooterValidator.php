<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class FooterValidator
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
                'is_language_switcher' => 'boolean',
                'page_terms'           => 'nullable|exists:pages,id',
                'page_policy'          => 'nullable|exists:pages,id',
                'logo'                 => 'nullable|image|mimes:jpg,jpeg,png',
                'copyrights'           => 'nullable|max:750',
                'social_facebook'      => 'nullable|max:160',
                'social_twitter'       => 'nullable|max:160',
                'social_instagram'     => 'nullable|max:160',
                'social_linkedin'      => 'nullable|max:160',
                'social_pinterest'     => 'nullable|max:160',
                'social_youtube'       => 'nullable|max:160',
                'social_github'        => 'nullable|max:160',
            ];

            // Set errors messages
            $messages = [
                'is_language_switcher.boolean' => __('messages.t_validator_boolean'),
                'page_terms.exists'            => __('messages.t_validator_exists'),
                'page_policy.exists'           => __('messages.t_validator_exists'),
                'logo.image'                   => __('messages.t_validator_image'),
                'logo.mimes'                   => __('messages.t_validator_mimes'),
                'copyrights.max'               => __('messages.t_validator_max', ['max' => 750]),
                'social_facebook.max'          => __('messages.t_validator_max', ['max' => 160]),
                'social_twitter.max'           => __('messages.t_validator_max', ['max' => 160]),
                'social_instagram.max'         => __('messages.t_validator_max', ['max' => 160]),
                'social_linkedin.max'          => __('messages.t_validator_max', ['max' => 160]),
                'social_pinterest.max'         => __('messages.t_validator_max', ['max' => 160]),
                'social_youtube.max'           => __('messages.t_validator_max', ['max' => 160]),
                'social_github.max'            => __('messages.t_validator_max', ['max' => 160])
            ];

            // Set data to validate
            $data     = [
                'is_language_switcher' => $request->is_language_switcher,
                'page_terms'           => $request->page_terms,
                'page_policy'          => $request->page_policy,
                'logo'                 => $request->logo,
                'copyrights'           => $request->copyrights,
                'social_facebook'      => $request->social_facebook,
                'social_twitter'       => $request->social_twitter,
                'social_instagram'     => $request->social_instagram,
                'social_linkedin'      => $request->social_linkedin,
                'social_pinterest'     => $request->social_pinterest,
                'social_youtube'       => $request->social_youtube,
                'social_github'        => $request->social_github
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
