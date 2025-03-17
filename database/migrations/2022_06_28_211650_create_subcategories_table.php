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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('parent_id');
            $table->string('name', 60)->unique();
            $table->string('slug', 60)->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('icon_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('categories')->onUpdate('no action')->onDelete('no action');
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
        Schema::dropIfExists('subcategories');
    }
};
