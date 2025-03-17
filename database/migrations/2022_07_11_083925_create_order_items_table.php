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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('gig_id');
            $table->unsignedBigInteger('owner_id');
            $table->integer('quantity')->default(1);
            $table->boolean('has_upgrades')->default(false);
            $table->boolean('is_requirements_sent')->default(false);
            $table->string('total_value');
            $table->string('profit_value', 20);
            $table->string('commission_value')->default(0);
            $table->enum('status', ['pending', 'proceeded', 'delivered', 'canceled', 'refunded'])->default('pending');
            $table->boolean('is_finished')->default(false);
            $table->timestamp('placed_at');
            $table->timestamp('expected_delivery_date')->nullable();
            $table->enum('canceled_by', ['seller', 'buyer'])->nullable();
            $table->timestamp('proceeded_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('refunded_at')->nullable();

            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('no action')->onDelete('no action');
            $table->foreign('gig_id')->references('id')->on('gigs')->onUpdate('no action')->onDelete('no action');
            $table->foreign('owner_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
