<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VnpaySettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('vnpay_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'name'          => 'VNPay',
                'is_enabled'    => 0,
                'logo_id'       => NULL,
                'currency'      => 'VND',
                'exchange_rate' => '25000.00',
                'deposit_fee'   => 2,
            ),
        ));
        
        
    }
}