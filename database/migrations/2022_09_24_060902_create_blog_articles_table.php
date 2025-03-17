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
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->string('title', 100)->unique();
            $table->string('slug', 160)->unique();
            $table->longText('content');
            $table->unsignedBigInteger('image_id');
            $table->integer('reading_time')->default(5);
            $table->timestamps();

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
        Schema::dropIfExists('blog_articles');
    }
};
