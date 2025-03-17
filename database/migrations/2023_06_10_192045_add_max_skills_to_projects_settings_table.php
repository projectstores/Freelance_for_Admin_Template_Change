<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects_settings', function (Blueprint $table) {
            $table->integer('max_skills')->default(5)->after('who_can_post');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects_settings', function (Blueprint $table) {
            $table->dropColumn('max_skills');
        });
    }
};
