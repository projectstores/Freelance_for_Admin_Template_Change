<?php

namespace App\Http\Validators\Main\Service;

use Illuminate\Support\Facades\Validator;

class ReportValidator
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
                'reason'  => 'required|min:6|max:500'
            ];

            // Set errors messages
            $messages = [
                'reason.required' => __('messages.t_validator_required'),
                'reason.min'      => __('messages.t_validator_min', ['min' => 6]),
                'reason.max'      => __('messages.t_validator_max', ['max' => 500]),
            ];

            // Set data to validate
            $data     = [
                'reason' => $request->reason
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
