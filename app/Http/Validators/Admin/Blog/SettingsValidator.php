<?php

namespace App\Http\Validators\Admin\Blog;

use Illuminate\Support\Facades\Validator;

class SettingsValidator
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
                'enable_blog'           => 'boolean',
                'enable_comments'       => 'boolean',
                'auto_approve_comments' => 'boolean'
            ];

            // Set errors messages
            $messages = [
                'enable_blog.boolean'           => __('messages.t_validator_boolean'),
                'enable_comments.boolean'       => __('messages.t_validator_boolean'),
                'auto_approve_comments.boolean' => __('messages.t_validator_boolean'),
            ];

            // Set data to validate
            $data     = [
                'enable_blog'           => $request->enable_blog,
                'enable_comments'       => $request->enable_comments,
                'auto_approve_comments' => $request->auto_approve_comments
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
