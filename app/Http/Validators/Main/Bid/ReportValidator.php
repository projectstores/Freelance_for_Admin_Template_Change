<?php

namespace App\Http\Validators\Main\Bid;

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
                'report_reason'      => 'required|in:reason_1,reason_2,reason_3,reason_4',
                'report_description' => 'required|max:1500'
            ];

            // Set errors messages
            $messages = [
                'report_reason.required'      => __('messages.t_validator_required'),
                'report_reason.in'            => __('messages.t_validator_in'),
                'report_description.required' => __('messages.t_validator_required'),
                'report_description.max'      => __('messages.t_validator_max', ['max' => 1500])
            ];

            // Set data to validate
            $data     = [
                'report_reason'      => $request->report_reason,
                'report_description' => $request->report_description
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
