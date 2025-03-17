<?php

namespace App\Http\Validators\Main\Account\Offers;

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

            // Get settings
            $settings = settings('publish');

            // Check if attachment enabled
            if ($settings->custom_offer_enable_attachments) {
                
                // Get max size
                $max_size           = $settings->custom_offer_attachment_max_size * 1024;

                // Get max files
                $max_files          = $settings->custom_offer_attachment_max_files;

                // Get allowed extensions
                $allowed_extensions = $settings->custom_offer_attachments_allowed_extensions;

                // Generate rule
                $attachments_array  = "nullable|array|max:$max_files";
                $attachments_items  = "nullable|file|mimes:$allowed_extensions|max:$max_size";

            } else {

                // Not enabled
                $attachments_array  = "";
                $attachments_items  = "";

            }

            // Set rules
            $rules    = [
                'message'           => 'required|max:2500',
                'expected_duration' => 'required|integer|between:1,365',
                'budget'            => 'required|regex:/^\d+(\.\d{1,2})?$/|max:10',
                'attachments'       => $attachments_array,
                'attachments.*'     => $attachments_items
            ];

            // Set errors messages
            $messages = [
                'message.required'           => __('messages.t_validator_required'),
                'message.max'                => __('messages.t_validator_max', ['max' => 2500]),
                'expected_duration.required' => __('messages.t_validator_required'),
                'expected_duration.integer'  => __('messages.t_validator_integer'),
                'expected_duration.between'  => __('messages.t_validator_between', ['min' => 1, 'max' => 365]),
                'budget.required'            => __('messages.t_validator_required'),
                'budget.regex'               => __('messages.t_validator_regex'),
                'attachments.required'       => __('messages.t_validator_required'),
                'attachments.array'          => __('messages.t_validator_array'),
                'attachments.min'            => __('messages.t_validator_min_array', ['min' => 1]),
                'attachments.max'            => __('messages.t_validator_max_array', ['max' => settings('publish')->custom_offer_attachment_max_files]),
                'attachments.*.required'     => __('messages.t_validator_required'),
                'attachments.*.mimes'        => __('messages.t_validator_mimes'),
                'attachments.*.max'          => __('messages.t_validator_max_size'),
            ];

            // Set data to validate
            $data     = [
                'message'           => $request->edit_form['message'],
                'attachments'       => $request->edit_form['attachments'],
                'expected_duration' => $request->edit_form['expected_duration'],
                'budget'            => $request->edit_form['budget']
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
