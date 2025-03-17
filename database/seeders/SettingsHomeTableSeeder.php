<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsHomeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        try {
            \DB::table('settings_home')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'show_popular_services' => 0,
                    'show_made_with' => 0,
                    'show_join_us_banner' => 0,
                    'show_benefits' => 0,
                    'show_home_video' => 0,
                    'show_gigs' => 0,
                    'youtube_video_id' => 'Nd45FNMJ0Dk',
                    'join_us_image_id' => NULL,
                    'made_with_images_id' => NULL,
                    'benefits_1_logo' => NULL,
                    'benefits_2_logo' => NULL,
                    'benefits_3_logo' => NULL,
                    'benefits_4_logo' => NULL,
                ),
            ));
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        
    }
}