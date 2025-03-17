<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('languages')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'language_code' => 'en',
                'country_code'  => 'us',
                'name'          => 'English',
                'is_active'     => 1,
                'force_rtl'     => 0,
                'created_at'    => '2022-09-01 19:58:48',
            ),
        ));
        
        
    }
}