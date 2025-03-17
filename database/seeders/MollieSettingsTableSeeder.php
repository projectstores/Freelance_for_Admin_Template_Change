<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MollieSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('mollie_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'name'          => 'Mollie',
                'is_enabled'    => 0,
                'logo_id'       => NULL,
                'currency'      => 'USD',
                'exchange_rate' => '1.00',
                'deposit_fee'   => 2,
            ),
        ));
        
        
    }
}