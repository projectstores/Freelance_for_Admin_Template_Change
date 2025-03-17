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
        Schema::create('settings_publish', function (Blueprint $table) {
            $table->id();
            $table->boolean('auto_approve_gigs')->default(false);
            $table->boolean('auto_approve_portfolio')->default(false);
            $table->integer('max_tags')->default(5);
            $table->boolean('is_video_enabled')->default(true);
            $table->boolean('is_documents_enabled')->default(true);
            $table->integer('max_documents')->default(2);
            $table->integer('max_document_size')->default(10);
            $table->integer('max_images')->default(5);
            $table->integer('max_image_size')->default(5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_publish');
    }
};
