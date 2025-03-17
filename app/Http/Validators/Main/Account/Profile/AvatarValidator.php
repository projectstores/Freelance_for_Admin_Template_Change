<?php

namespace App\Http\Validators\Main\Account\Profile;

use Illuminate\Support\Facades\Validator;

class AvatarValidator
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
                'avatar'  => 'required|image|mimes:jpeg,jpg,png|max:5120'
            ];

            // Set errors messages
            $messages = [
                'avatar.required' => __('messages.t_validator_required'),
                'avatar.image'    => __('messages.t_validator_image'),
                'avatar.mimes'    => __('messages.t_validator_mimes'),
                'avatar.max'      => __('messages.t_validator_max_size', ['max' => human_filesize(5120)]),
            ];

            // Set data to validate
            $data     = [
                'avatar' => $request->avatar
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
