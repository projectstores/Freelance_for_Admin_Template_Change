<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaytabsSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('paytabs_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'name'          => 'Paytabs',
                'is_enabled'    => 0,
                'logo_id'       => NULL,
                'exchange_rate' => '25.00',
                'deposit_fee'   => 2,
            ),
        ));
        
        
    }
}