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
        Schema::create('deposit_webhooks', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id', 60)->unique();
            $table->string('payment_method', 60);
            $table->unsignedBigInteger('user_id')->index();
            $table->string('amount', 20);
            $table->enum('status', ['succeeded', 'failed', 'pending'])->default('pending');
            $table->timestamp('created_at');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposit_webhooks');
    }
};
