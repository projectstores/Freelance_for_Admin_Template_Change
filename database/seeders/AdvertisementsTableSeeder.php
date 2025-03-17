<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdvertisementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('advertisements')->insert(array (
            0 => 
            array (
                'id' => 1,
                'header_code' => NULL,
                'ad_service_360' => NULL,
                'ad_service_720' => NULL,
            ),
        ));
        
        
    }
}