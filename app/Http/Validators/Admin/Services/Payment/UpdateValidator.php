<?php

namespace App\Http\Validators\Admin\Services\Payment;

use Illuminate\Support\Facades\Validator;

class UpdateValidator
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
                'is_active'                        => 'boolean',
                'name'                             => 'required|max:60',
                'logo'                             => 'nullable|image|mimes:png,jpg,jpeg',
                'currency'                         => 'required',
                'exchange_rate'                    => 'required|decimal:0,2',
                'deposit_min_amount'               => 'required|decimal:0,2',
                'deposit_max_amount'               => 'required|decimal:0,2',
                'deposit_fee_percentage'           => 'required|decimal:0,2',
                'deposit_fee_fixed'                => 'required|decimal:0,2',
                'gigs_checkout_fee_percentage'     => 'required|decimal:0,2',
                'gigs_checkout_fee_fixed'          => 'required|decimal:0,2',
                'projects_checkout_fee_percentage' => 'required|decimal:0,2',
                'projects_checkout_fee_fixed'      => 'required|decimal:0,2',
                'bids_checkout_fee_percentage'     => 'required|decimal:0,2',
                'bids_checkout_fee_fixed'          => 'required|decimal:0,2'
            ];

            // Set errors messages
            $messages = [
                'is_active.boolean'                         => __('messages.t_validator_boolean'),
                'name.required'                             => __('messages.t_validator_required'),
                'name.max'                                  => __('messages.t_validator_max', ['max' => 60]),
                'logo.image'                                => __('messages.t_validator_image'),
                'logo.mimes'                                => __('messages.t_validator_mimes'),
                'currency.required'                         => __('messages.t_validator_required'),
                'exchange_rate.required'                    => __('messages.t_validator_required'),
                'exchange_rate.decimal'                     => __('messages.t_validator_numeric'),
                'deposit_min_amount.required'               => __('messages.t_validator_required'),
                'deposit_min_amount.decimal'                => __('messages.t_validator_numeric'),
                'deposit_max_amount.required'               => __('messages.t_validator_required'),
                'deposit_max_amount.decimal'                => __('messages.t_validator_numeric'),
                'deposit_fee_percentage.required'           => __('messages.t_validator_required'),
                'deposit_fee_percentage.decimal'            => __('messages.t_validator_numeric'),
                'deposit_fee_fixed.required'                => __('messages.t_validator_required'),
                'deposit_fee_fixed.decimal'                 => __('messages.t_validator_numeric'),
                'gigs_checkout_fee_percentage.required'     => __('messages.t_validator_required'),
                'gigs_checkout_fee_percentage.decimal'      => __('messages.t_validator_numeric'),
                'gigs_checkout_fee_fixed.required'          => __('messages.t_validator_required'),
                'gigs_checkout_fee_fixed.decimal'           => __('messages.t_validator_numeric'),
                'projects_checkout_fee_percentage.required' => __('messages.t_validator_required'),
                'projects_checkout_fee_percentage.decimal'  => __('messages.t_validator_numeric'),
                'projects_checkout_fee_fixed.required'      => __('messages.t_validator_required'),
                'projects_checkout_fee_fixed.decimal'       => __('messages.t_validator_numeric'),
                'bids_checkout_fee_percentage.required'     => __('messages.t_validator_required'),
                'bids_checkout_fee_percentage.decimal'      => __('messages.t_validator_numeric'),
                'bids_checkout_fee_fixed.required'          => __('messages.t_validator_required'),
                'bids_checkout_fee_fixed.decimal'           => __('messages.t_validator_numeric')
            ];

            // Set data to validate
            $data     = [
                'is_active'                        => $request->is_active,
                'name'                             => $request->name,
                'logo'                             => $request->logo,
                'currency'                         => $request->currency,
                'exchange_rate'                    => $request->exchange_rate,
                'deposit_min_amount'               => $request->deposit_min_amount,
                'deposit_max_amount'               => $request->deposit_max_amount,
                'deposit_fee_percentage'           => $request->deposit_fee_percentage,
                'deposit_fee_fixed'                => $request->deposit_fee_fixed,
                'gigs_checkout_fee_percentage'     => $request->gigs_checkout_fee_percentage,
                'gigs_checkout_fee_fixed'          => $request->gigs_checkout_fee_fixed,
                'projects_checkout_fee_percentage' => $request->projects_checkout_fee_percentage,
                'projects_checkout_fee_fixed'      => $request->projects_checkout_fee_fixed,
                'bids_checkout_fee_percentage'     => $request->bids_checkout_fee_percentage,
                'bids_checkout_fee_fixed'          => $request->bids_checkout_fee_fixed
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
