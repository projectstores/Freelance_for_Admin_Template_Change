<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class CommissionValidator
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
                'enable_taxes'     => 'boolean',
                'tax_type'         => 'required|in:fixed,percentage',
                'tax_value'        => 'required|max:15',
                'commission_from'  => 'required|in:withdrawals,orders',
                'commission_type'  => 'required|in:fixed,percentage',
                'commission_value' => 'required|max:15'
            ];

            // Set errors messages
            $messages = [
                'enable_taxes.boolean'      => __('messages.t_validator_boolean'),
                'tax_type.required'         => __('messages.t_validator_required'),
                'tax_type.in'               => __('messages.t_validator_in'),
                'tax_value.required'        => __('messages.t_validator_required'),
                'tax_value.max'             => __('messages.t_validator_max', ['max' => 15]),
                'commission_from.required'  => __('messages.t_validator_required'),
                'commission_from.in'        => __('messages.t_validator_in'),
                'commission_type.required'  => __('messages.t_validator_required'),
                'commission_type.in'        => __('messages.t_validator_in'),
                'commission_value.required' => __('messages.t_validator_required'),
                'commission_value.max'      => __('messages.t_validator_max', ['max' => 15])
            ];

            // Set data to validate
            $data     = [
                'enable_taxes'     => $request->enable_taxes,
                'tax_type'         => $request->tax_type,
                'tax_value'        => $request->tax_value,
                'commission_from'  => $request->commission_from,
                'commission_type'  => $request->commission_type,
                'commission_value' => $request->commission_value
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
