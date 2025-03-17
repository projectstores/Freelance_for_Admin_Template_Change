<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfflinePaymentGatewaysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {   
        \DB::table('offline_payment_gateways')->insert(array (
            0 => 
            array (
                'id'                 => 1,
                'uid'                => 'B8E92E858B2BAE988039',
                'name'               => 'Bank Transfer',
                'slug'               => 'offline',
                'logo_id'            => NULL,
                'currency'           => 'USD',
                'exchange_rate'      => 1.0,
                'fixed_fee'          => '{"deposit":"0","gigs":"0","projects":"0","bids":"0"}',
                'percentage_fee'     => '{"deposit":"0","gigs":"0","projects":"0","bids":"0"}',
                'deposit_min_amount' => 1.0,
                'deposit_max_amount' => 100.0,
                'details'            => '',
                'is_active'          => 1,
                'country'            => NULL,
            ),
        ));
        
        
    }
}