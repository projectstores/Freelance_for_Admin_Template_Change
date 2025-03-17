<?php

namespace App\Http\Validators\Main\Seller\Gigs\Edit;

use Illuminate\Support\Facades\Validator;

class RequirementsValidator
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
                'requirements' => 'required|array|min:1'
            ];

            // Set inputs
            $inputs   = [
                'requirements' => $request->requirements,
            ];

            // Set messages
            $messages = [
                'requirements.required' => __('messages.t_validator_required'),
                'requirements.array'    => __('messages.t_validator_array'),
                'requirements.min'      => __('messages.t_validator_min_array', ['min' => 1])
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
     * Validate add requirement form
     *
     * @param object $request
     * @return void
     */
    static function add($request)
    {
        try {
            
            // Set rules
            $rules    = [
                'add_requirement'           => 'required|array',
                'add_requirement.question'  => 'required|max:500',
                'add_requirement.type'      => 'required|in:text,choice,file',
                'add_requirement.options'   => 'required_if:add_requirement.type,choice|array',
                'add_requirement.options.*' => 'required_if:add_requirement.type,choice|max:100',
            ];

            // Set inputs
            $inputs   = [
                'add_requirement' => $request->add_requirement,
            ];

            // Set messages
            $messages = [
            ];

            // Validate data
            Validator::make($inputs, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
