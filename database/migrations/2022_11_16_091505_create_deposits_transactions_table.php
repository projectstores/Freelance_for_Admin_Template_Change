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
        Schema::create('deposits_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('transaction_id', 160)->unique();
            $table->string('payment_method', 60);
            $table->string('amount_total', 20);
            $table->string('amount_fee', 20)->default(0);
            $table->string('amount_net', 20);
            $table->string('currency', 10);
            $table->string('exchange_rate', 5)->default(1);
            $table->enum('status', [ 'paid', 'pending', 'rejected' ])->default('paid');
            $table->text('reject_reason')->nullable();
            $table->ipAddress()->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('deposits_transactions');
    }
};
