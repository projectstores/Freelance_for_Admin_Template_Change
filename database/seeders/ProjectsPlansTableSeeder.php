<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsPlansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        try {
            \DB::table('projects_plans')->insert(array (
                0 => 
                array (
                    'id'               => 1,
                    'title'            => 'Featured',
                    'slug'             => 'featured',
                    'description'      => 'Featured projects attract higher-quality viewer and are displayed prominently in the Featured projects section home page.',
                    'price'            => '10',
                    'days'             => 30,
                    'type'             => 'featured',
                    'badge_text_color' => '#4393ff',
                    'badge_bg_color'   => '#e9f4ff',
                    'is_active'        => 1,
                ),
                1 => 
                array (
                    'id'               => 2,
                    'title'            => 'Highlight',
                    'slug'             => 'highlight',
                    'description'      => 'Make your project highlighted with border in listing search result page. Easy to focus.',
                    'price'            => '7',
                    'days'             => 30,
                    'type'             => 'highlight',
                    'badge_text_color' => '#7b7241',
                    'badge_bg_color'   => '#fbf6dd',
                    'is_active'        => 1,
                ),
                2 => 
                array (
                    'id'               => 3,
                    'title'            => 'Urgent',
                    'slug'             => 'urgent',
                    'description'      => 'Make your project stand out and let viewer know that your project is time sensitive.',
                    'price'            => '9',
                    'days'             => 30,
                    'type'             => 'urgent',
                    'badge_text_color' => '#d64545',
                    'badge_bg_color'   => '#ffebeb',
                    'is_active'        => 1,
                ),
                3 => 
                array (
                    'id'               => 4,
                    'title'            => 'Alert',
                    'slug'             => 'alert',
                    'description'      => 'Target expert freelancers with a notification to their inbox.',
                    'price'            => '12',
                    'days'             => NULL,
                    'type'             => 'alert',
                    'badge_text_color' => '#35aa4d',
                    'badge_bg_color'   => '#dff7da',
                    'is_active'        => 1,
                ),
            ));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}