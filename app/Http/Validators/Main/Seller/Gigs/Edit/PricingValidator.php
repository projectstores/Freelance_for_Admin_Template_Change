<?php

namespace App\Http\Validators\Main\Seller\Gigs\Edit;

use Illuminate\Support\Facades\Validator;

class PricingValidator
{
    
    /**
     * Validate all form
     *
     * @param object $request
     * @return void
     */
    static function all($request)
    {
        try {
            
            // Set rules
            $rules    = [
                'price'                 => 'required|regex:/^\d+(\.\d{1,2})?$/|max:10',
                'delivery_time'         => 'required|in:0,1,2,3,4,5,6,7,14,21,30',
                'upgrades'              => 'nullable|array',
                'upgrades.*.price'      => 'required|regex:/^\d+(\.\d{1,2})?$/|max:10',
                'upgrades.*.title'      => 'required|max:100',
                'upgrades.*.extra_days' => 'required|in:0,1,2,3,4,5,6,7,14,21,30'
            ];

            // Set inputs
            $inputs   = [
                'price'         => $request->price,
                'delivery_time' => $request->delivery_time,
                'upgrades'      => $request->upgrades
            ];

            // Set messages
            $messages = [
                'price.required'                 => __('messages.t_validator_required'),
                'price.regex'                    => __('messages.t_validator_regex'),
                'price.max'                      => __('messages.t_validator_max', ['max' => 10]),
                'delivery_time.required'         => __('messages.t_validator_required'),
                'delivery_time.in'               => __('messages.t_validator_in'),
                'upgrades.array'                 => __('messages.t_validator_array'),
                'upgrades.*.price.required'      => __('messages.t_validator_required'),
                'upgrades.*.price.regex'         => __('messages.t_validator_regex'),
                'upgrades.*.price.max'           => __('messages.t_validator_max', ['max' => 10]),
                'upgrades.*.title.required'      => __('messages.t_validator_required'),
                'upgrades.*.title.max'           => __('messages.t_validator_max', ['max' => 100]),
                'upgrades.*.extra_days.required' => __('messages.t_validator_required'),
                'upgrades.*.extra_days.in'       => __('messages.t_validator_in')
            ];

            // Validate data
            Validator::make($inputs, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Validate add upgrade form
     *
     * @param object $request
     * @return void
     */
    static function upgrade($request)
    {
        try {
            
            // Set rules
            $rules    = [
                'add_upgrade'            => 'required|array',
                'add_upgrade.price'      => 'required|regex:/^\d+(\.\d{1,2})?$/|max:10',
                'add_upgrade.title'      => 'required|max:100',
                'add_upgrade.extra_days' => 'required|in:0,1,2,3,4,5,6,7,14,21,30'
            ];

            // Set inputs
            $inputs   = [
                'add_upgrade' => $request->add_upgrade,
            ];

            // Set messages
            $messages = [
            ];

            // Validate data
            Validator::make($inputs, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
