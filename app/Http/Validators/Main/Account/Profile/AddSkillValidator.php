<?php

namespace App\Http\Validators\Main\Account\Profile;

use Illuminate\Support\Facades\Validator;

class AddSkillValidator
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
                'name'       => 'required|max:30',
                'experience' => 'required|in:beginner,intermediate,pro'
            ];

            // Set errors messages
            $messages = [
                'name.required'       => __('messages.t_validator_required'),
                'name.max'            => __('messages.t_validator_max', ['max' => 30]),
                'experience.required' => __('messages.t_validator_required'),
                'experience.in'       => __('messages.t_validator_in'),
            ];

            // Set data to validate
            $data     = [
                'name'       => isset($request->add_skill['name']) ? $request->add_skill['name'] : null,
                'experience' => isset($request->add_skill['experience']) ? $request->add_skill['experience'] : null,
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
