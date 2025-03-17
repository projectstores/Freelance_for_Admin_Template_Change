<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class SecurityValidator
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
                'is_social_media_accounts' => 'boolean',
                'debug'                    => 'boolean',
            ];

            // Set errors messages
            $messages = [
                'is_social_media_accounts.boolean' => __('messages.t_validator_boolean'),
                'debug.boolean'                    => __('messages.t_validator_boolean'),
            ];

            // Set data to validate
            $data     = [
                'is_social_media_accounts' => $request->is_social_media_accounts,
                'debug'                    => $request->debug
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
