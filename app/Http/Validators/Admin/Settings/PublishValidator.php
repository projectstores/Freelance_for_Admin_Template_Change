<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class PublishValidator
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
                'auto_approve_gigs'                           => 'boolean',
                'auto_approve_portfolio'                      => 'boolean',
                'max_tags'                                    => 'required|integer',
                'is_video_enabled'                            => 'boolean',
                'is_documents_enabled'                        => 'boolean',
                'max_documents'                               => 'required|integer',
                'max_document_size'                           => 'required|integer',
                'max_images'                                  => 'required|integer',
                'max_image_size'                              => 'required|integer',
                'enable_custom_offers'                        => 'boolean',
                'custom_offers_require_approval'              => 'boolean',
                'custom_offers_commission_type'               => 'required|in:fixed,percentage',
                'custom_offers_commission_value_freelancer'   => 'required|numeric',
                'custom_offers_commission_value_buyer'        => 'required|numeric',
                'custom_offers_expiry_days'                   => 'required|integer',
                'custom_offer_enable_attachments'             => 'boolean',
                'custom_offer_attachment_max_size'            => 'required|integer',
                'custom_offer_attachment_max_files'           => 'required|integer',
                'custom_offer_attachments_allowed_extensions' => 'required'
            ];

            // Set errors messages
            $messages = [
                'auto_approve_gigs.boolean'                            => __('messages.t_validator_boolean'),
                'auto_approve_portfolio.boolean'                       => __('messages.t_validator_boolean'),
                'max_tags.required'                                    => __('messages.t_validator_required'),
                'max_tags.integer'                                     => __('messages.t_validator_integer'),
                'is_video_enabled.boolean'                             => __('messages.t_validator_boolean'),
                'is_documents_enabled.boolean'                         => __('messages.t_validator_boolean'),
                'max_documents.required'                               => __('messages.t_validator_required'),
                'max_documents.integer'                                => __('messages.t_validator_integer'),
                'max_document_size.required'                           => __('messages.t_validator_required'),
                'max_document_size.integer'                            => __('messages.t_validator_integer'),
                'max_images.required'                                  => __('messages.t_validator_required'),
                'max_images.integer'                                   => __('messages.t_validator_integer'),
                'max_image_size.required'                              => __('messages.t_validator_required'),
                'max_image_size.integer'                               => __('messages.t_validator_integer'),
                'enable_custom_offers.boolean'                         => __('messages.t_validator_boolean'),
                'custom_offers_require_approval.boolean'               => __('messages.t_validator_boolean'),
                'custom_offers_commission_type.required'               => __('messages.t_validator_required'),
                'custom_offers_commission_type.in'                     => __('messages.t_validator_in'),
                'custom_offers_commission_value_freelancer.required'   => __('messages.t_validator_required'),
                'custom_offers_commission_value_freelancer.numeric'    => __('messages.t_validator_numeric'),
                'custom_offers_commission_value_buyer.required'        => __('messages.t_validator_required'),
                'custom_offers_commission_value_buyer.numeric'         => __('messages.t_validator_numeric'),
                'custom_offers_expiry_days.required'                   => __('messages.t_validator_required'),
                'custom_offers_expiry_days.integer'                    => __('messages.t_validator_integer'),
                'custom_offer_enable_attachments.boolean'              => __('messages.t_validator_boolean'),
                'custom_offer_attachment_max_size.required'            => __('messages.t_validator_required'),
                'custom_offer_attachment_max_size.integer'             => __('messages.t_validator_integer'),
                'custom_offer_attachment_max_files.required'           => __('messages.t_validator_required'),
                'custom_offer_attachment_max_files.integer'            => __('messages.t_validator_integer'),
                'custom_offer_attachments_allowed_extensions.required' => __('messages.t_validator_required'),
            ];

            // Set data to validate
            $data     = [
                'auto_approve_gigs'                           => $request->auto_approve_gigs,
                'auto_approve_portfolio'                      => $request->auto_approve_portfolio,
                'max_tags'                                    => $request->max_tags,
                'is_video_enabled'                            => $request->is_video_enabled,
                'is_documents_enabled'                        => $request->is_documents_enabled,
                'max_documents'                               => $request->max_documents,
                'max_document_size'                           => $request->max_document_size,
                'max_images'                                  => $request->max_images,
                'max_image_size'                              => $request->max_image_size,
                'enable_custom_offers'                        => $request->enable_custom_offers,
                'custom_offers_require_approval'              => $request->custom_offers_require_approval,
                'custom_offers_commission_type'               => $request->custom_offers_commission_type,
                'custom_offers_commission_value_freelancer'   => $request->custom_offers_commission_value_freelancer,
                'custom_offers_commission_value_buyer'        => $request->custom_offers_commission_value_buyer,
                'custom_offers_expiry_days'                   => $request->custom_offers_expiry_days,
                'custom_offer_enable_attachments'             => $request->custom_offer_enable_attachments,
                'custom_offer_attachment_max_size'            => $request->custom_offer_attachment_max_size,
                'custom_offer_attachment_max_files'           => $request->custom_offer_attachment_max_files,
                'custom_offer_attachments_allowed_extensions' => $request->custom_offer_attachments_allowed_extensions,
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
