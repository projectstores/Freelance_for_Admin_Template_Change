<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
                
        \DB::table('blog_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'enable_blog' => 1,
                'enable_comments' => 1,
                'auto_approve_comments' => 1,
            ),
        ));
        
        
    }
}