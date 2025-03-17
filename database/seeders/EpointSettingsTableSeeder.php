<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EpointSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {   
        \DB::table('epoint_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'name'          => 'Epoint',
                'is_enabled'    => 0,
                'logo_id'       => null,
                'currency'      => 'AZN',
                'exchange_rate' => '1.70',
                'deposit_fee'   => '2.00',
            ),
        ));
    }
}