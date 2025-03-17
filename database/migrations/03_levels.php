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
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->string('title', 60)->unique();
            $table->enum('account_type', ['seller', 'buyer'])->default('buyer');
            $table->integer('seller_sales_min');
            $table->integer('seller_sales_max');
            $table->integer('buyer_purchases_min');
            $table->integer('buyer_purchases_max');
            $table->string('level_color', 10)->default('#000');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
};
