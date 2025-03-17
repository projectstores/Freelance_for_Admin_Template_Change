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
        Schema::create('projects_bidding_plans', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->enum('plan_type', ['sponsored', 'sealed', 'highlight']);
            $table->string('price', 10);
            $table->boolean('is_active')->default(false);
            $table->string('badge_text_color', 12);
            $table->string('badge_bg_color', 12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_bidding_plans');
    }
};
