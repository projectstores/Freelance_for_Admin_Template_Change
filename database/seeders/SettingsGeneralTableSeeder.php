<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsGeneralTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('settings_general')->insert(array (
            0 => 
            array (
                'id'                   => 1,
                'title'                => 'Riverr',
                'subtitle'             => 'Freelance Services Marketplace',
                'separator'            => '|',
                'logo_id'              => NULL,
                'logo_dark_id'         => NULL,
                'favicon_id'           => NULL,
                'header_announce_text' => NULL,
                'header_announce_link' => NULL,
                'is_language_switcher' => 1,
                'default_language'     => 'en',
            ),
        ));
        
        
    }
}