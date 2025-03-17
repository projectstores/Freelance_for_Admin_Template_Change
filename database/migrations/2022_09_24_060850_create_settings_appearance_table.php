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
        Schema::create('settings_appearance', function (Blueprint $table) {
            $table->id();
            $table->text('colors');
            $table->text('sizes');
            $table->boolean('is_dark_mode')->default(0);
            $table->text('font_link')->nullable();
            $table->string('font_family', 60)->nullable();
            $table->boolean('is_featured_categories')->default(false);
            $table->boolean('is_best_sellers')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_appearance');
    }
};
