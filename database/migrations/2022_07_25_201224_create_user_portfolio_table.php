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
        Schema::create('user_portfolio', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('title', 100);
            $table->string('slug', 160)->unique();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('thumb_id');
            $table->string('project_link', 120)->nullable();
            $table->string('project_video', 120)->nullable();
            $table->enum('status', ['pending', 'active'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('thumb_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_portfolio');
    }
};
