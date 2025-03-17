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
        Schema::create('projects_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_enabled')->default(0);
            $table->boolean('auto_approve_projects')->default(1);
            $table->boolean('auto_approve_bids')->default(1);
            $table->boolean('is_free_posting')->default(1);
            $table->boolean('is_premium_posting')->default(0);
            $table->boolean('is_premium_bidding')->default(0);
            $table->enum('commission_type', ['fixed', 'percentage'])->default('percentage');
            $table->string('commission_from_freelancer')->default(2);
            $table->string('commission_from_publisher')->default(2);
            $table->enum('who_can_post', ['buyer', 'seller', 'both'])->default('both');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_settings');
    }
};
