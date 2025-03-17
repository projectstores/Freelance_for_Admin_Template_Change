<?php

namespace App\Http\Validators\Main\Account\Profile;

use Illuminate\Support\Facades\Validator;

class HeadlineValidator
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
                'headline'  => 'required|max:100'
            ];

            // Set errors messages
            $messages = [
                'headline.required' => __('messages.t_validator_required'),
                'headline.max'      => __('messages.t_validator_max', ['max' => 100]),
            ];

            // Set data to validate
            $data     = [
                'headline' => $request->headline
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
