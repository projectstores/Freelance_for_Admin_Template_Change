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
        Schema::create('project_bid_upgrades', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 36)->unique();
            $table->unsignedBigInteger('bid_id')->index();
            $table->string('payment_method', 60)->nullable();
            $table->string('payment_id', 100)->nullable();
            $table->string('amount', 10);
            $table->enum('status', ['pending', 'rejected', 'paid'])->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->unsignedBigInteger('receipt_id')->index()->nullable();
            $table->timestamps();

            $table->foreign('bid_id')->references('id')->on('project_bids')->onUpdate('no action')->onDelete('no action');
            $table->foreign('receipt_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_bid_upgrades');
    }
};
