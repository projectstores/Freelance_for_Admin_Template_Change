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
        Schema::create('settings_commission', function (Blueprint $table) {
            $table->id();
            $table->boolean('enable_taxes')->default(true);
            $table->enum('tax_type', ['fixed', 'percentage'])->default('percentage');
            $table->string('tax_value', 15)->default(2);
            $table->enum('commission_from', ['orders', 'withdrawals'])->default('orders');
            $table->enum('commission_type', ['fixed', 'percentage'])->default('percentage');
            $table->string('commission_value', 15)->default(10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_commission');
    }
};
