<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymobSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('paymob_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'name'          => 'Paymob',
                'is_enabled'    => 0,
                'logo_id'       => NULL,
                'currency'      => 'EGP',
                'exchange_rate' => '25.00',
                'deposit_fee'   => 2,
            ),
        ));
        
        
    }
}