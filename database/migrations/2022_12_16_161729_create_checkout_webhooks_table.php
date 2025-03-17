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
        Schema::create('checkout_webhooks', function (Blueprint $table) {
            $table->id();
            $table->longText('data');
            $table->string('payment_id', 160)->unique();
            $table->string('payment_method', 60);
            $table->enum('status', ['succeeded', 'failed', 'pending'])->default('pending');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkout_webhooks');
    }
};
