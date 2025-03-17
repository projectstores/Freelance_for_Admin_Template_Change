<?php

namespace App\Http\Validators\Admin\Blog;

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
                'comment_content' => 'required|max:500'
            ];

            // Set errors messages
            $messages = [
                'comment_content.required' => __('messages.t_validator_required'),
                'comment_content.max'      => __('messages.t_validator_max', ['max' => 500])
            ];

            // Set data to validate
            $data     = [
                'comment_content' => $request->comment_content
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
