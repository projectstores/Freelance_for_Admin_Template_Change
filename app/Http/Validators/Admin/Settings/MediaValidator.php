<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class MediaValidator
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
                'requirements_file_max_size'           => 'required|integer',
                'requirements_file_allowed_extensions' => 'required',
                'delivered_work_max_size'              => 'required|integer',
                'portfolio_max_images'                 => 'required|integer',
                'portfolio_max_size'                   => 'required|integer',
            ];

            // Set errors messages
            $messages = [
                'requirements_file_max_size.required'           => __('messages.t_validator_required'),
                'requirements_file_max_size.integer'            => __('messages.t_validator_integer'),
                'requirements_file_allowed_extensions.required' => __('messages.t_validator_required'),
                'delivered_work_max_size.required'              => __('messages.t_validator_required'),
                'delivered_work_max_size.integer'               => __('messages.t_validator_integer'),
                'portfolio_max_images.required'                 => __('messages.t_validator_required'),
                'portfolio_max_images.integer'                  => __('messages.t_validator_integer'),
                'portfolio_max_size.required'                   => __('messages.t_validator_required'),
                'portfolio_max_size.integer'                    => __('messages.t_validator_integer')

            ];

            // Set data to validate
            $data     = [
                'requirements_file_max_size'           => $request->requirements_file_max_size,
                'requirements_file_allowed_extensions' => $request->requirements_file_allowed_extensions,
                'delivered_work_max_size'              => $request->delivered_work_max_size,
                'portfolio_max_images'                 => $request->portfolio_max_images,
                'portfolio_max_size'                   => $request->portfolio_max_size
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
