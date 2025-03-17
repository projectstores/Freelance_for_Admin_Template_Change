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
        Schema::create('settings_hero', function (Blueprint $table) {
            $table->id();
            $table->boolean('enable_bg_img')->default(false);
            $table->unsignedBigInteger('bg_large_id')->index()->nullable();
            $table->unsignedBigInteger('bg_medium_id')->index()->nullable();
            $table->unsignedBigInteger('bg_small_id')->index()->nullable();
            $table->string('bg_color', 15)->default('#a1a1aa');
            $table->integer('bg_large_height')->default(570);
            $table->integer('bg_small_height')->default(250);

            $table->foreign('bg_large_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('bg_medium_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('bg_small_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_hero');
    }
};
