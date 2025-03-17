<?php

namespace App\Http\Validators\Main\Account\Projects\Employer;

use Illuminate\Support\Facades\Validator;

class MilestoneValidator
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
                'milestone_amount'      => 'required|regex:/^\d+(\.\d{1,2})?$/|max:10',
                'milestone_description' => 'required|max:160'
            ];

            // Set errors messages
            $messages = [
                'milestone_amount.required'      => __('messages.t_validator_required'),
                'milestone_amount.regex'         => __('messages.t_validator_regex'),
                'milestone_amount.max'           => __('messages.t_validator_max', ['max' => 10]),
                'milestone_description.required' => __('messages.t_validator_required'),
                'milestone_description.max'      => __('messages.t_validator_max', ['max' => 160])
            ];

            // Set data to validate
            $data     = [
                'milestone_amount'      => $request->milestone_amount,
                'milestone_description' => $request->milestone_description
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
