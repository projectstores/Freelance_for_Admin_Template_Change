<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsCommissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        
        \DB::table('settings_commission')->insert(array (
            0 => 
            array (
                'id'               => 1,
                'enable_taxes'     => 1,
                'tax_type'         => 'percentage',
                'tax_value'        => '2',
                'commission_from'  => 'orders',
                'commission_type'  => 'percentage',
                'commission_value' => '10',
            ),
        ));
        
        
    }
}