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
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('buyer_id');
            $table->text('reason');
            $table->enum('status', ['pending', 'rejected_by_seller', 'rejected_by_admin', 'accepted_by_seller', 'accepted_by_admin', 'closed'])->default('pending');
            $table->boolean('is_seen_by_seller')->default(false);
            $table->boolean('is_seen_by_admin')->default(false);
            $table->boolean('request_admin_intervention')->default(false);
            $table->timestamp('created_at');

            $table->foreign('item_id')->references('id')->on('order_items')->onUpdate('no action')->onDelete('no action');
            $table->foreign('seller_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('buyer_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refunds');
    }
};
