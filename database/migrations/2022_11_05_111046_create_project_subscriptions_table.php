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
        Schema::create('project_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->unsignedBigInteger('project_id')->index();
            $table->string('total');
            $table->string('payment_method', 60)->nullable();
            $table->string('payment_id', 100)->nullable();
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->unsignedBigInteger('receipt_id')->index()->nullable();
            $table->timestamp('created_at');

            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('no action')->onDelete('no action');
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
        Schema::dropIfExists('project_subscriptions');
    }
};
