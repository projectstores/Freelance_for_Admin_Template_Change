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
        Schema::create('settings_withdrawal', function (Blueprint $table) {
            $table->id();
            $table->integer('min_withdrawal_amount')->default(10);
            $table->enum('withdrawal_period', ['daily', 'weekly', 'monthly'])->default('daily');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_withdrawal');
    }
};
