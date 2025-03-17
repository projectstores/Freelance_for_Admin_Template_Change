<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsPublishTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('settings_publish')->insert(array (
            0 => 
            array (
                'id'                                          => 1,
                'auto_approve_gigs'                           => 0,
                'auto_approve_portfolio'                      => 0,
                'max_tags'                                    => 5,
                'is_video_enabled'                            => 1,
                'is_documents_enabled'                        => 1,
                'max_documents'                               => 2,
                'max_document_size'                           => 10,
                'max_images'                                  => 10,
                'max_image_size'                              => 5,
                'enable_custom_offers'                        => false,
                'custom_offer_attachments_allowed_extensions' => "png,jpg,zip,pdf,psd,mp4,mp3",
                'custom_offers_require_approval'              => false,
                'custom_offers_commission_type'               => 'percentage',
                'custom_offers_commission_value_freelancer'   => 2.5,
                'custom_offers_commission_value_buyer'        => 1.5,
                'custom_offers_expiry_days'                   => 7,
                'custom_offer_enable_attachments'             => true,
                'custom_offer_attachment_max_size'            => 50,
                'custom_offer_attachment_max_files'           => 10,
            ),
        ));
        
        
    }
}