<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LiveChatSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('live_chat_settings')->delete();
        
        \DB::table('live_chat_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'default_provider' => 'pusher',
                'allowed_images' => 'jpg,jpeg,png,gif',
                'allowed_files' => 'zip,pdf,txt,psd',
                'max_file_size' => 20,
                'enable_attachments' => 1,
                'enable_emojis' => 1,
                'play_notification_sound' => 1,
            ),
        ));
        
        
    }
}