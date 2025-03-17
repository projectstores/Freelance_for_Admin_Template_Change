<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('settings_seo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => NULL,
                'facebook_page_id' => NULL,
                'facebook_app_id' => NULL,
                'twitter_username' => NULL,
                'ogimage_id' => NULL,
                'is_sitemap' => 1,
            ),
        ));
        
        
    }
}