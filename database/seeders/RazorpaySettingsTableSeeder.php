<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RazorpaySettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('razorpay_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'name'          => 'Razorpay',
                'is_enabled'    => 0,
                'logo_id'       => NULL,
                'currency'      => 'INR',
                'exchange_rate' => '82.00',
                'deposit_fee'   => 2,
            ),
        ));
        
        
    }
}