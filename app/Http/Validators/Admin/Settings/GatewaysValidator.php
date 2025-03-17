<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class GatewaysValidator
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
                'is_paypal' => 'boolean',
                'is_stripe' => 'boolean'
            ];

            // Set errors messages
            $messages = [
                'is_paypal.boolean' => __('messages.t_validator_boolean'),
                'is_stripe.boolean' => __('messages.t_validator_boolean')
            ];

            // Set data to validate
            $data     = [
                'is_paypal' => $request->is_paypal,
                'is_stripe' => $request->is_stripe,
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
