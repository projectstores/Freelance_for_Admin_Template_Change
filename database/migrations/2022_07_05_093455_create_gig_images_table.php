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
        Schema::create('gig_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gig_id');
            $table->unsignedBigInteger('img_thumb_id');
            $table->unsignedBigInteger('img_medium_id');
            $table->unsignedBigInteger('img_large_id');

            $table->foreign('gig_id')->references('id')->on('gigs')->onUpdate('no action')->onDelete('no action');
            $table->foreign('img_thumb_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('img_medium_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('img_large_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gig_images');
    }
};
