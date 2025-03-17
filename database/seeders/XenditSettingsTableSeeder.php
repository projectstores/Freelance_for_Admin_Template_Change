<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class XenditSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('xendit_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'name'          => 'Xendit',
                'is_enabled'    => 0,
                'logo_id'       => NULL,
                'currency'      => 'IDR',
                'exchange_rate' => '16000.00',
                'deposit_fee'   => 2,
            ),
        ));
        
        
    }
}