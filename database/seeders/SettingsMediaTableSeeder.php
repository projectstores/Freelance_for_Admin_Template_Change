<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsMediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('settings_media')->insert(array (
            0 => 
            array (
                'id' => 1,
                'requirements_file_max_size' => 50,
                'requirements_file_allowed_extensions' => 'jpg,jpeg,pdf,zip',
                'delivered_work_max_size' => 50,
                'portfolio_max_images' => 10,
                'portfolio_max_size' => 5,
            ),
        ));
        
        
    }
}