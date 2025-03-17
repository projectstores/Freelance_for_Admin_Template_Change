<?php

namespace App\Http\Validators\Main\Account\Billing;

use Illuminate\Support\Facades\Validator;

class EditValidator
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
                'firstname'  => 'required|max:60',
                'lastname'   => 'required|max:60',
                'company'    => 'nullable|max:60',
                'city'       => 'nullable|max:60',
                'zip'        => 'nullable|max:20',
                'country'    => 'required|exists:countries,id',
                'address'    => 'required|max:600',
                'vat_number' => 'nullable|max:30',
            ];

            // Set errors messages
            $messages = [
                'firstname.required' => __('messages.t_validator_required'),
                'firstname.max'      => __('messages.t_validator_max', ['max' => 60]),
                'lastname.required'  => __('messages.t_validator_required'),
                'lastname.max'       => __('messages.t_validator_max', ['max' => 60]),
                'company.max'        => __('messages.t_validator_max', ['max' => 60]),
                'city.max'           => __('messages.t_validator_max', ['max' => 60]),
                'zip.max'            => __('messages.t_validator_max', ['max' => 20]),
                'country.required'   => __('messages.t_validator_required'),
                'country.exists'     => __('messages.t_validator_exists'),
                'address.required'   => __('messages.t_validator_required'),
                'address.max'        => __('messages.t_validator_max', ['max' => 600]),
                'vat_number.max'     => __('messages.t_validator_max', ['max' => 30]),
            ];

            // Set data to validate
            $data     = [
                'firstname'  => $request->firstname,
                'lastname'   => $request->lastname,
                'company'    => $request->company,
                'city'       => $request->city,
                'zip'        => $request->zip,
                'country'    => $request->country,
                'address'    => $request->address,
                'vat_number' => $request->vat_number
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
