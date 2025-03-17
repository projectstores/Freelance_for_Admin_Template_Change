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
        Schema::create('gig_visits', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('gig_id');
            $table->ipAddress('ip_address')->nullable();
            $table->mediumInteger('impressions')->default(1);

            // Geolocation
            $table->string('country_name', 60)->nullable();
            $table->string('country_code', 3)->nullable();
            $table->string('region_name', 60)->nullable();
            $table->string('region_code', 60)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('zip', 30)->nullable();
            $table->string('timezone', 60)->nullable();
            $table->string('latitude', 60)->nullable();
            $table->string('longitude', 60)->nullable();

            // User Agent
            $table->text('user_agent')->nullable();
            $table->string('browser_name', 60)->nullable();
            $table->string('browser_version', 60)->nullable();
            $table->string('browser_language', 60)->nullable();
            $table->string('os_name', 60)->nullable();
            $table->string('os_version', 60)->nullable();
            $table->string('engine_name', 60)->nullable();
            $table->string('engine_version', 60)->nullable();
            $table->string('device_name', 60)->nullable();
            $table->string('device_model', 60)->nullable();
            $table->string('device_type', 60)->nullable();

            // Bot
            $table->string('bot_name', 100)->nullable();
            $table->string('bot_category', 100)->nullable();
            $table->string('bot_url', 100)->nullable();
            $table->string('bot_producer_name', 100)->nullable();
            $table->string('bot_producer_url', 100)->nullable();

            // UTM & Info
            $table->text('utm_medium')->nullable();
            $table->text('utm_campaign')->nullable();
            $table->text('utm_source')->nullable();
            $table->text('url_queries')->nullable();
            $table->string('visit_from', 100)->nullable();

            // Referrer
            $table->text('referrer')->nullable();

            // Dates
            $table->timestamp('first_visit');
            $table->timestamp('last_visit');

            $table->foreign('gig_id')->references('id')->on('gigs')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gig_visits');
    }
};
