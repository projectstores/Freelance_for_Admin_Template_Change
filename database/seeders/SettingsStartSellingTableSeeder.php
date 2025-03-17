<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsStartSellingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        try {
            \DB::table('settings_start_selling')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'banner_bg_id' => NULL,	
                    'banner_icon_id' => NULL,	
                    'hiw_svg_1_id' => NULL,	
                    'hiw_svg_2_id' => NULL,	
                    'hiw_svg_3_id' => NULL,	
                    'freelancer_image_1_id' => NULL,	
                    'freelancer_image_2_id' => NULL,	
                    'freelancer_image_3_id' => NULL,	
                    'freelancer_image_4_id' => NULL,	
                    'freelancer_name_1' => '',
                    'freelancer_name_2' => '',
                    'freelancer_name_3' => '',
                    'freelancer_name_4' => '',
                    'freelancer_job_1' => '',
                    'freelancer_job_2' => '',
                    'freelancer_job_3' => '',
                    'freelancer_job_4' => '',
                    'buyer_image_1_id' => NULL,	
                    'buyer_image_2_id' => NULL,	
                    'buyer_image_3_id' => NULL,	
                    'buyer_name_1' => '',
                    'buyer_name_2' => '',
                    'buyer_name_3' => '',
                    'buyer_job_1' => '',
                    'buyer_job_2' => '',
                    'buyer_job_3' => '',
                    'buyer_review_1' => '',
                    'buyer_review_2' => '',
                    'buyer_review_3' => '',
                    'show_how_it_works' => 0,
                    'show_freelancers' => 0,
                    'show_testimonials' => 0,
                    'show_faq' => 0,
                ),
            ));
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        
    }
}