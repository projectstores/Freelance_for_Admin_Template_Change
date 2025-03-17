<?php

namespace App\Http\Validators\Admin\Projects;

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
                'is_enabled'                 => 'boolean',
                'auto_approve_projects'      => 'boolean',
                'is_free_posting'            => 'boolean',
                'is_premium_posting'         => 'boolean',
                'commission_type'            => 'required|in:fixed,percentage',
                'commission_from_freelancer' => 'required|numeric',
                'commission_from_publisher'  => 'required|numeric',
                'who_can_post'               => 'required|in:seller,buyer,both',
                'max_skills'                 => 'required|integer'
            ];

            // Set errors messages
            $messages = [
                'is_enabled.boolean'                  => __('messages.t_validator_boolean'),
                'auto_approve_projects.boolean'       => __('messages.t_validator_boolean'),
                'is_free_posting.boolean'             => __('messages.t_validator_boolean'),
                'is_premium_posting.boolean'          => __('messages.t_validator_boolean'),
                'commission_type.required'            => __('messages.t_validator_required'),
                'commission_type.in'                  => __('messages.t_validator_in'),
                'commission_from_freelancer.required' => __('messages.t_validator_required'),
                'commission_from_freelancer.numeric'  => __('messages.t_validator_numeric'),
                'commission_from_publisher.required'  => __('messages.t_validator_required'),
                'commission_from_publisher.numeric'   => __('messages.t_validator_numeric'),
                'who_can_post.required'               => __('messages.t_validator_required'),
                'who_can_post.in'                     => __('messages.t_validator_in'),
                'max_skills.required'                 => __('messages.t_validator_required'),
                'max_skills.integer'                  => __('messages.t_validator_integer')
            ];

            // Set data to validate
            $data     = [
                'is_enabled'                 => $request->is_enabled,
                'auto_approve_projects'      => $request->auto_approve_projects,
                'is_free_posting'            => $request->is_free_posting,
                'is_premium_posting'         => $request->is_premium_posting,
                'commission_type'            => $request->commission_type,
                'commission_from_freelancer' => $request->commission_from_freelancer,
                'commission_from_publisher'  => $request->commission_from_publisher,
                'who_can_post'               => $request->who_can_post,
                'max_skills'                 => $request->max_skills
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
