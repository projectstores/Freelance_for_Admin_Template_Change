<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsBiddingPlansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        try {
            \DB::table('projects_bidding_plans')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'uid' => '79B051ABB70FD94B1114',
                    'plan_type' => 'sponsored',
                    'price' => '1.99',
                    'is_active' => 1,
                    'badge_text_color' => '#ffffff',
                    'badge_bg_color' => '#b760ce',
                ),
                1 => 
                array (
                    'id' => 2,
                    'uid' => '3BD7320B7E36F14B8C92',
                    'plan_type' => 'sealed',
                    'price' => '0.2',
                    'is_active' => 1,
                    'badge_text_color' => '#ffffff',
                    'badge_bg_color' => '#4c8cff',
                ),
                2 => 
                array (
                    'id' => 3,
                    'uid' => 'F0BB323B483D9EBE7E67',
                    'plan_type' => 'highlight',
                    'price' => '0.49',
                    'is_active' => 1,
                    'badge_text_color' => '#ffffff',
                    'badge_bg_color' => '#ffb134',
                ),
            ));
        } catch (\Throwable $th) {
            //throw $th;
        } 
    }
}