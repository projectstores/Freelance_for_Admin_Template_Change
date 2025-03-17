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
        Schema::create('settings_seo', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('facebook_page_id', 60)->nullable();
            $table->string('facebook_app_id', 60)->nullable();
            $table->string('twitter_username', 60)->nullable();
            $table->unsignedBigInteger('ogimage_id')->nullable();
            $table->boolean('is_sitemap')->default(true);

            $table->foreign('ogimage_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_seo');
    }
};
