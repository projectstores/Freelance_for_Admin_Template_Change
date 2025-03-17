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
            $table->unsignedBigInteger('placeholder_img_id')->index()->nullable()->after('font_family');

            $table->foreign('placeholder_img_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
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
            $table->dropColumn('placeholder_img_id');
        });
    }
};
