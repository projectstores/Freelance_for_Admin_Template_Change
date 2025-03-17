<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaytrSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('paytr_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'name'          => 'PayTR',
                'is_enabled'    => 0,
                'logo_id'       => NULL,
                'currency'      => 'TRY',
                'exchange_rate' => '19.00',
                'deposit_fee'   => 2,
            ),
        ));
        
        
    }
}