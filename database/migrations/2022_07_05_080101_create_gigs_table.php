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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('title', 100)->index('title');
            $table->string('slug', 160)->index('slug');
            $table->longText('description');
            $table->string('price', 10);
            $table->integer('delivery_time');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('image_thumb_id')->nullable();
            $table->unsignedBigInteger('image_medium_id')->nullable();
            $table->unsignedBigInteger('image_large_id')->nullable();
            $table->enum('status', ['pending', 'active', 'deleted', 'boosted', 'trending', 'featured'])->default('pending');
            $table->mediumInteger('counter_visits')->default(0);
            $table->mediumInteger('counter_impressions')->default(0);
            $table->mediumInteger('counter_sales')->default(0);
            $table->mediumInteger('counter_reviews')->default(0);
            $table->string('rating', 5)->default(0);
            $table->integer('orders_in_queue')->default(0);
            $table->boolean('has_upgrades')->default(0);
            $table->boolean('has_faqs')->default(0);
            $table->string('video_link', 60)->nullable();
            $table->string('video_id', 20)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('no action')->onDelete('no action');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onUpdate('no action')->onDelete('no action');
            $table->foreign('image_thumb_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('image_medium_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('image_large_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gigs');
    }
};
