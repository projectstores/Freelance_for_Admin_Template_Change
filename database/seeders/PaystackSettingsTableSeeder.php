<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaystackSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('paystack_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'name'          => 'Paystack',
                'is_enabled'    => 0,
                'logo_id'       => NULL,
                'currency'      => 'NGN',
                'exchange_rate' => '445.00',
                'deposit_fee'   => 2,
            ),
        ));
        
        
    }
}