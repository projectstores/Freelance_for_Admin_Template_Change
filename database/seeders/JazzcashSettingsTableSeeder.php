<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JazzcashSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        
        \DB::table('jazzcash_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'name'          => 'JazzCash',
                'is_enabled'    => 0,
                'logo_id'       => NULL,
                'currency'      => 'PKR',
                'exchange_rate' => '224.00',
                'deposit_fee'   => 2,
            ),
        ));
        
        
    }
}