<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfflinePaymentSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('offline_payment_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'is_enabled'    => 0,
                'name'          => 'Bank Transfer',
                'details'       => 'Bank details here',
                'logo_id'       => NULL,
                'exchange_rate' => '1.00',
                'deposit_fee'   => 2,
            ),
        ));
        
        
    }
}