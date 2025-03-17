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
        Schema::create('support_messages', function (Blueprint $table) {
            $table->id();
            $table->ipAddress()->nullable();
            $table->text('user_agent')->nullable();
            $table->string('name', 60);
            $table->string('email', 60);
            $table->string('subject', 120);
            $table->longText('message');
            $table->boolean('is_seen')->default(false);
            $table->boolean('is_replied')->default(false);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_messages');
    }
};
