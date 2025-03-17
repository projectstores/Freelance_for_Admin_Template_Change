<?php

namespace App\Http\Validators\Admin\Pages;

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
                'title'   => 'required|max:100',
                'slug'    => ['required', 'max:30', Rule::unique('pages')->ignore($request->page->id)],
                'content' => 'nullable',
                'is_link' => 'boolean',
                'link'    => 'nullable|max:120',
                'column'  => 'required|in:1,2,3,4'
            ];

            // Set errors messages
            $messages = [
                'title.required'  => __('messages.t_validator_required'),
                'title.max'       => __('messages.t_validator_max', ['max' => 100]),
                'slug.required'   => __('messages.t_validator_required'),
                'slug.max'        => __('messages.t_validator_max', ['max' => 30]),
                'slug.unique'     => __('messages.t_validator_unique'),
                'is_link.boolean' => __('messages.t_validator_boolean'),
                'link.max'        => __('messages.t_validator_max', ['max' => 120]),
                'column.required' => __('messages.t_validator_required'),
                'column.in'       => __('messages.t_validator_in')
            ];

            // Set data to validate
            $data     = [
                'title'   => $request->title,
                'slug'    => $request->slug,
                'content' => $request->content,
                'is_link' => $request->is_link,
                'link'    => $request->link,
                'column'  => $request->column
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
