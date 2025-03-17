<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsWithdrawalTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('settings_withdrawal')->insert(array (
            0 => 
            array (
                'id' => 1,
                'min_withdrawal_amount' => 10,
                'withdrawal_period' => 'daily',
            ),
        ));
        
        
    }
}