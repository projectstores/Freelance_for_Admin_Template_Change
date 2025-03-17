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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->string('name', 60)->unique();
            $table->string('slug', 60)->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('icon_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->timestamps();

            $table->foreign('icon_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('image_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
