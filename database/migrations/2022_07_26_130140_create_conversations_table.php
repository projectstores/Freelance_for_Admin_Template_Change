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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('from_id');
            $table->unsignedBigInteger('to_id');
            $table->enum('status', ['active', 'blocked', 'archived'])->default('active');
            $table->bigInteger('blocked_by')->nullable();
            $table->timestamp('last_message_at')->nullable();
            $table->timestamp('created_at');

            $table->foreign('from_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('to_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
};
