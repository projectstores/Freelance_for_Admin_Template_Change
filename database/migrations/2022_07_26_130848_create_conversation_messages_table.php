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
        Schema::create('conversation_messages', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('conversation_id');
            $table->unsignedBigInteger('message_from');
            $table->unsignedBigInteger('message_to');
            $table->text('message');
            $table->boolean('is_seen')->default(false);
            $table->timestamp('created_at');

            $table->foreign('conversation_id')->references('id')->on('conversations')->onUpdate('no action')->onDelete('no action');
            $table->foreign('message_from')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('message_to')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversation_messages');
    }
};
