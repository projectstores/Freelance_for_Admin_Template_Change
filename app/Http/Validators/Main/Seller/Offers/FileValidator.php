<?php

namespace App\Http\Validators\Main\Seller\Offers;

use Illuminate\Support\Facades\Validator;

class FileValidator
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
            $settings           = settings('publish');

            // Get max size
            $max_size           = $settings->custom_offer_attachment_max_size * 1024;

            // Get allowed extensions
            $allowed_extensions = $settings->custom_offer_attachments_allowed_extensions;

            // Generate rule
            $file_rule          = "required|file|mimes:$allowed_extensions|max:$max_size";

            // Set rules
            $rules    = [
                'notes' => 'required|max:500',
                'file'  => $file_rule
            ];

            // Set errors messages
            $messages = [
                'notes.max'      => __('messages.t_validator_max', ['max' => 500]),
                'notes.required' => __('messages.t_validator_required'),
                'file.required'  => __('messages.t_validator_required'),
                'file.file'      => __('messages.t_validator_file'),
                'file.mimes'     => __('messages.t_validator_mimes'),
                'file.max'       => __('messages.t_validator_max_size', ['max' => $max_size])

            ];

            // Set data to validate
            $data     = [
                'notes' => $request->notes,
                'file'  => $request->file
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
