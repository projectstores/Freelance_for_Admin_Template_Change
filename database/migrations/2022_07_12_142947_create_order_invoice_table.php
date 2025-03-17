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
        Schema::create('order_invoice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('payment_method', 40);
            $table->string('payment_id', 120);
            $table->string('firstname', 60)->nullable();
            $table->string('lastname', 60)->nullable();
            $table->string('email', 60);
            $table->string('company', 60)->nullable();
            $table->text('address');
            $table->timestamp('created_at');

            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_invoice');
    }
};
