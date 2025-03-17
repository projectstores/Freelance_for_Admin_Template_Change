<?php

namespace App\Http\Validators\Admin\Offers;

use Illuminate\Support\Facades\Validator;

class RejectValidator
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
                'rejection_reason' => 'required|max:2500'
            ];

            // Set errors messages
            $messages = [
                'rejection_reason.required' => __('messages.t_validator_required'),
                'rejection_reason.max'      => __('messages.t_validator_max', ['max' => 2500])
            ];

            // Set data to validate
            $data     = [
                'rejection_reason' => $request->rejection_reason
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
