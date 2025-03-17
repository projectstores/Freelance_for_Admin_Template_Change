<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsFooterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        
        \DB::table('settings_footer')->insert(array (
            0 => 
            array (
                'id' => 1,
                'is_language_switcher' => 1,
                'page_terms_id' => NULL,
                'page_policy_id' => NULL,
                'logo_id' => NULL,
                'copyrights' => NULL,
                'social_facebook' => NULL,
                'social_twitter' => NULL,
                'social_instagram' => NULL,
                'social_linkedin' => NULL,
                'social_pinterest' => NULL,
                'social_youtube' => NULL,
                'social_github' => NULL,
            ),
        ));
        
        
    }
}