<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSecurityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('settings_security')->insert(array (
            0 => 
            array (
                'id'                       => 1,
                'is_recaptcha'             => 0,
                'is_social_media_accounts' => 0
            ),
        ));
        
        
    }
}