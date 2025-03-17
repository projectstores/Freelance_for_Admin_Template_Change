<?php

namespace App\Http\Validators\Main\Blog;

use Illuminate\Support\Facades\Validator;

class CommentValidator
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
                'email'   => 'required|max:60|email',
                'name'    => 'required|max:60',
                'comment' => 'required|max:1500',
            ];

            // Set errors messages
            $messages = [
                'email.required'   => __('messages.t_validator_required'),
                'email.email'      => __('messages.t_validator_email'),
                'email.max'        => __('messages.t_validator_max', ['max' => 60]),
                'name.required'    => __('messages.t_validator_required'),
                'name.max'         => __('messages.t_validator_max', ['max' => 60]),
                'comment.required' => __('messages.t_validator_required'),
                'comment.max'      => __('messages.t_validator_max', ['max' => 1500]),
            ];

            // Set data to validate
            $data     = [
                'email'   => $request->email,
                'name'    => $request->name,
                'comment' => $request->comment,
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
