<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NowpaymentsSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        try {
            \DB::table('nowpayments_settings')->insert(array (
                0 => 
                array (
                    'id'              => 1,
                    'name'            => 'NowPayments.io',
                    'is_enabled'      => 0,
                    'logo_id'         => NULL,
                    'currency'        => 'USD',
                    'crypto_currency' => 'btc',
                    'exchange_rate'   => '1.00',
                    'deposit_fee'     => 2,
                ),
            ));
        } catch (\Throwable $th) {
            //throw $th;
        } 
    }
}