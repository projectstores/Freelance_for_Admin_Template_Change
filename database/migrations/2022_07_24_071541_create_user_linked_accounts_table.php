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
        Schema::create('user_linked_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('facebook_profile', 160)->nullable();
            $table->string('twitter_profile', 160)->nullable();
            $table->string('dribbble_profile', 160)->nullable();
            $table->string('stackoverflow_profile', 160)->nullable();
            $table->string('github_profile', 160)->nullable();
            $table->string('youtube_profile', 160)->nullable();
            $table->string('vimeo_profile', 160)->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_linked_accounts');
    }
};
