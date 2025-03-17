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
        Schema::table('settings_appearance', function (Blueprint $table) {
            $table->enum('default_theme', ['light', 'dark'])->default('light')->after('is_best_sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings_appearance', function (Blueprint $table) {
            $table->dropColumn('default_theme');
        });
    }
};
