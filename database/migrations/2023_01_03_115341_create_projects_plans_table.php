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
        Schema::create('projects_plans', function (Blueprint $table) {
            $table->id();
            $table->string('title', 60)->unique();
            $table->string('slug', 120)->unique();
            $table->text('description');
            $table->string('price', 20)->default(5);
            $table->integer('days')->default(30)->nullable();
            $table->enum('type', ['featured', 'highlight', 'urgent', 'alert']);
            $table->string('badge_text_color', 20);
            $table->string('badge_bg_color', 20);
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_plans');
    }
};
