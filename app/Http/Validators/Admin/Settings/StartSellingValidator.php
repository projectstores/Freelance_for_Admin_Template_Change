<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class StartSellingValidator
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
                'banner_bg_id' => 'nullable|image',
                'banner_icon_id' => 'nullable|image',
                'hiw_svg_1_id' => 'nullable|image',
                'hiw_svg_2_id' => 'nullable|image',
                'hiw_svg_3_id' => 'nullable|image',
                'freelancer_image_1_id' => 'nullable|image',
                'freelancer_image_2_id' => 'nullable|image',
                'freelancer_image_3_id' => 'nullable|image',
                'freelancer_image_4_id' => 'nullable|image',
                'freelancer_name_1' => 'required',	
                'freelancer_name_2' => 'required',	
                'freelancer_name_3' => 'required',	
                'freelancer_name_4' => 'required',	
                'freelancer_job_1' => 'required',	
                'freelancer_job_2' => 'required',	
                'freelancer_job_3' => 'required',	
                'freelancer_job_4' => 'required',	
                'buyer_image_1_id' => 'nullable|image',
                'buyer_image_2_id' => 'nullable|image',
                'buyer_image_3_id' => 'nullable|image',
                'buyer_name_1' => 'required',	
                'buyer_name_2' => 'required',	
                'buyer_name_3' => 'required',	
                'buyer_job_1' => 'required',	
                'buyer_job_2' => 'required',	
                'buyer_job_3' => 'required',	
                'buyer_review_1' => 'required',	
                'buyer_review_2' => 'required',	
                'buyer_review_3' => 'required',	
                'show_how_it_works' => 'boolean',
                'show_freelancers' => 'boolean',
                'show_testimonials' => 'boolean',
                'show_faq' => 'boolean',
            ];

            // Set errors messages
            $messages = [
                    'banner_bg_id' => __('messages.t_validator_image'),
                    'banner_icon_id' => __('messages.t_validator_image'),
                    'hiw_svg_1_id' => __('messages.t_validator_image'),
                    'hiw_svg_2_id' => __('messages.t_validator_image'),
                    'hiw_svg_3_id' => __('messages.t_validator_image'),
                    'freelancer_image_1_id' => __('messages.t_validator_image'),
                    'freelancer_image_2_id' => __('messages.t_validator_image'),
                    'freelancer_image_3_id' => __('messages.t_validator_image'),
                    'freelancer_image_4_id' => __('messages.t_validator_image'),
                    'freelancer_name_1' => __('messages.t_validator_required'),	
                    'freelancer_name_2' => __('messages.t_validator_required'),	
                    'freelancer_name_3' => __('messages.t_validator_required'),	
                    'freelancer_name_4' => __('messages.t_validator_required'),	
                    'freelancer_job_1' => __('messages.t_validator_required'),	
                    'freelancer_job_2' => __('messages.t_validator_required'),	
                    'freelancer_job_3' => __('messages.t_validator_required'),	
                    'freelancer_job_4' => __('messages.t_validator_required'),	
                    'buyer_image_1_id' => __('messages.t_validator_image'),
                    'buyer_image_2_id' => __('messages.t_validator_image'),
                    'buyer_image_3_id' => __('messages.t_validator_image'),
                    'buyer_name_1' => __('messages.t_validator_required'),	
                    'buyer_name_2' => __('messages.t_validator_required'),	
                    'buyer_name_3' => __('messages.t_validator_required'),	
                    'buyer_job_1' => __('messages.t_validator_required'),	
                    'buyer_job_2' => __('messages.t_validator_required'),	
                    'buyer_job_3' => __('messages.t_validator_required'),	
                    'buyer_review_1' => __('messages.t_validator_required'),	
                    'buyer_review_2' => __('messages.t_validator_required'),	
                    'buyer_review_3' => __('messages.t_validator_required'),	
                    'show_how_it_works' => __('messages.t_validator_boolean'),
                    'show_freelancers' => __('messages.t_validator_boolean'),
                    'show_testimonials' => __('messages.t_validator_boolean'),
                    'show_faq' => __('messages.t_validator_boolean'),
            ];

            // Set data to validate
            $data     = [
                    'banner_bg_id' => $request->banner_bg_id,
                    'banner_icon_id' => $request->banner_icon_id,
                    'hiw_svg_1_id' => $request->hiw_svg_1_id,
                    'hiw_svg_2_id' => $request->hiw_svg_2_id,
                    'hiw_svg_3_id' => $request->hiw_svg_3_id,
                    'freelancer_image_1_id' => $request->freelancer_image_1_id,
                    'freelancer_image_2_id' => $request->freelancer_image_2_id,
                    'freelancer_image_3_id' => $request->freelancer_image_3_id,
                    'freelancer_image_4_id' => $request->freelancer_image_4_id,
                    'freelancer_name_1' => $request->freelancer_name_1,
                    'freelancer_name_2' => $request->freelancer_name_2,
                    'freelancer_name_3' => $request->freelancer_name_3,
                    'freelancer_name_4' => $request->freelancer_name_4,
                    'freelancer_job_1' => $request->freelancer_job_1,
                    'freelancer_job_2' => $request->freelancer_job_2,
                    'freelancer_job_3' => $request->freelancer_job_3,
                    'freelancer_job_4' => $request->freelancer_job_4,
                    'buyer_image_1_id' => $request->buyer_image_1_id,
                    'buyer_image_2_id' => $request->buyer_image_2_id,
                    'buyer_image_3_id' => $request->buyer_image_3_id,
                    'buyer_name_1' => $request->buyer_name_1,
                    'buyer_name_2' => $request->buyer_name_2,
                    'buyer_name_3' => $request->buyer_name_3,
                    'buyer_job_1' => $request->buyer_job_1,
                    'buyer_job_2' => $request->buyer_job_2,
                    'buyer_job_3' => $request->buyer_job_3,
                    'buyer_review_1' => $request->buyer_review_1,
                    'buyer_review_2' => $request->buyer_review_2,
                    'buyer_review_3' => $request->buyer_review_3,
                    'show_how_it_works' => $request->show_how_it_works,
                    'show_freelancers' => $request->show_freelancers,
                    'show_testimonials' => $request->show_testimonials,
                    'show_faq' => $request->show_faq,
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
