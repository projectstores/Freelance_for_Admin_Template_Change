<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_chat_settings', function (Blueprint $table) {
            $table->id();
            $table->string('default_provider', 30)->default('pusher');
            $table->text('allowed_images');
            $table->text('allowed_files');
            $table->integer('max_file_size')->default(20);
            $table->boolean('enable_attachments')->default(true);
            $table->boolean('enable_emojis')->default(true);
            $table->boolean('play_notification_sound')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_chat_settings');
    }
};
