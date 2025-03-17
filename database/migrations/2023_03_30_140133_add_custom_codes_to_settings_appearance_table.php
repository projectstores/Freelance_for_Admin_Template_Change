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
            $table->mediumText('custom_code_head_main_layout')->nullable();
            $table->mediumText('custom_code_footer_main_layout')->nullable();
            $table->mediumText('custom_code_head_admin_layout')->nullable();
            $table->mediumText('custom_code_footer_admin_layout')->nullable();
            $table->mediumText('custom_code_head_freelancer_layout')->nullable();
            $table->mediumText('custom_code_footer_freelancer_layout')->nullable();
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
            $table->dropColumn('custom_code_head_main_layout');
            $table->dropColumn('custom_code_footer_main_layout');
            $table->dropColumn('custom_code_head_admin_layout');
            $table->dropColumn('custom_code_footer_admin_layout');
            $table->dropColumn('custom_code_head_freelancer_layout');
            $table->dropColumn('custom_code_footer_freelancer_layout');
        });
    }
};
