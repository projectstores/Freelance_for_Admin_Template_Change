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
        Schema::table('projects_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('thumbnail_id')->nullable()->after('seo_description');
            $table->foreign('thumbnail_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects_categories', function (Blueprint $table) {
            $table->dropColumn('thumbnail_id');
        });
    }
};
