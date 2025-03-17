<?php

namespace App\Http\Validators\Main\Create;

use Illuminate\Support\Facades\Validator;

class OverviewValidator
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
                'title'           => 'required|max:100',
                'category'        => 'required|exists:categories,id',
                'subcategory'     => 'required|exists:subcategories,id',
                'description'     => 'required',
                'tags'            => 'required|array|min:1|max:' . settings('publish')->max_tags,
                'tags.*'          => 'required|max:20',
                'seo_title'       => 'nullable|max:100',
                'seo_description' => 'nullable|max:150',
                'faqs'            => 'nullable|array',
                'faqs.*.question' => 'max:100',
                'faqs.*.answer'   => 'max:300',
            ];

            // Set inputs
            $inputs   = [
                'title'           => $request->title,
                'category'        => $request->category,
                'subcategory'     => $request->subcategory,
                'description'     => $request->description,
                'tags'            => $request->tags,
                'seo_title'       => $request->seo_title,
                'seo_description' => $request->seo_description,
                'faqs'            => $request->faqs
            ];

            // Set messages
            $messages = [
                'title.required'       => __('messages.t_validator_required'),
                'title.max'            => __('messages.t_validator_max', ['max' => 100]),
                'category.required'    => __('messages.t_validator_required'),
                'category.exists'      => __('messages.t_validator_exists'),
                'subcategory.required' => __('messages.t_validator_required'),
                'subcategory.exists'   => __('messages.t_validator_exists'),
                'description.required' => __('messages.t_validator_required'),
                'tags.required'        => __('messages.t_validator_required'),
                'tags.array'           => __('messages.t_validator_array'),
                'tags.min'             => __('messages.t_validator_min_array', ['min' => 1]),
                'tags.max'             => __('messages.t_validator_max_array', ['max' => settings('publish')->max_tags]),
                'tags.*.required'      => __('messages.t_validator_required'),
                'tags.*.max'           => __('messages.t_validator_max', ['max' => 20]),
                'seo_title.max'        => __('messages.t_validator_max', ['max' => 100]),
                'seo_description.max'  => __('messages.t_validator_max', ['max' => 150]),
                'faqs.array'           => __('messages.t_validator_array'),
                'faqs.*.question.max'  => __('messages.t_validator_max', ['max' => 100]),
                'faqs.*.answer.max'    => __('messages.t_validator_max', ['max' => 300]),
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
     * Validate add faq form
     *
     * @param object $request
     * @return void
     */
    static function faq($request)
    {
        try {
            
            // Set rules
            $rules    = [
                'question' => 'required|max:100',
                'answer'   => 'required|max:300'
            ];

            // Set inputs
            $inputs   = [
                'question' => $request->question,
                'answer'   => $request->answer
            ];

            // Set messages
            $messages = [
                'answer.required'   => "Answer is required",
                'answer.max'        => "Max 300 characters",
                'question.required' => "Question is required",
                'question.max'      => "Max 100 characters"
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
     * Validate tag
     *
     * @param string $tag
     * @return void
     */
    static function tag($tag)
    {
        try {
            
            // Set rules
            $rules    = [
                'tag' => 'required|max:20'
            ];

            // Set inputs
            $inputs   = [
                'tag' => $tag,
            ];

            // Set messages
            $messages = [
                'tag.required' => "Tag is required",
                'tag.max'      => "Maximum is 20",
                'tag.regex'    => "Invalid tag",
            ];

            // Validate data
            Validator::make($inputs, $rules, $messages)->validate();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
