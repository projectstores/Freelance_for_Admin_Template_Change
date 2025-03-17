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
        Schema::create('settings_footer', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_language_switcher')->default(true);
            $table->unsignedBigInteger('page_terms_id')->nullable();
            $table->unsignedBigInteger('page_policy_id')->nullable();
            $table->unsignedBigInteger('logo_id')->nullable();
            $table->text('copyrights')->nullable();
            $table->string('social_facebook')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_pinterest')->nullable();
            $table->string('social_youtube')->nullable();
            $table->string('social_github')->nullable();

            $table->foreign('logo_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('page_terms_id')->references('id')->on('pages')->onUpdate('no action')->onDelete('no action');
            $table->foreign('page_policy_id')->references('id')->on('pages')->onUpdate('no action')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_footer');
    }
};
