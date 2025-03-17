<?php

namespace App\Http\Validators\Admin\Levels;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
                'title'               => ['required', 'max:60', Rule::unique('levels')->ignore($request->level->id)],
                'account_type'        => 'required|in:seller,buyer',
                'seller_max_sales'    => 'nullable|integer',
                'seller_min_sales'    => 'nullable|integer',
                'buyer_max_purchases' => 'nullable|integer',
                'buyer_min_purchases' => 'nullable|integer',
                'color'               => 'required|max:10',
            ];

            // Set errors messages
            $messages = [
                'title.required'              => __('messages.t_validator_required'),
                'title.max'                   => __('messages.t_validator_max', ['max' => 60]),
                'title.unique'                => __('messages.t_validator_unique'),
                'account_type.required'       => __('messages.t_validator_required'),
                'account_type.in'             => __('messages.t_validator_in'),
                'seller_max_sales.integer'    => __('messages.t_validator_integer'),
                'seller_min_sales.integer'    => __('messages.t_validator_integer'),
                'buyer_max_purchases.integer' => __('messages.t_validator_integer'),
                'buyer_min_purchases.integer' => __('messages.t_validator_integer'),
                'color.required'              => __('messages.t_validator_required'),
                'color.max'                   => __('messages.t_validator_max', ['max' => 10]),
            ];

            // Set data to validate
            $data     = [
                'title'               => $request->title,
                'account_type'        => $request->account_type,
                'seller_max_sales'    => $request->seller_max_sales,
                'seller_min_sales'    => $request->seller_min_sales,
                'buyer_max_purchases' => $request->buyer_max_purchases,
                'buyer_min_purchases' => $request->buyer_min_purchases,
                'color'               => $request->color,
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
