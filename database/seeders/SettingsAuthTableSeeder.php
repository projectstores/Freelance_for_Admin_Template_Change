<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsAuthTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('settings_auth')->insert(array (
            0 => 
            array (
                'id'                           => 1,
                'verification_required'        => 0,
                'verification_type'            => 'admin',
                'verification_expiry_period'   => 60,
                'password_reset_expiry_period' => 60,
                'is_facebook_login'            => 0,
                'is_google_login'              => 0,
                'is_twitter_login'             => 0,
                'is_github_login'              => 0,
                'is_linkedin_login'            => 0,
            ),
        ));
        
        
    }
}