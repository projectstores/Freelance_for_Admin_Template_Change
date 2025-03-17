<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_offers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->unsignedBigInteger('freelancer_id');
            $table->unsignedBigInteger('buyer_id');

            // Message to freelancer
            $table->text('message')->nullable();

            // Budget
            $table->decimal('budget_amount');
            $table->decimal('budget_buyer_fee')->nullable();
            $table->decimal('budget_freelancer_fee')->nullable();

            // Duration
            $table->integer('delivery_time')->nullable();

            // Status
            $table->enum('freelancer_status', ['pending', 'rejected', 'approved', 'completed', 'canceled']);
            $table->enum('admin_status', ['pending', 'rejected', 'approved'])->default('pending');
            $table->text('freelancer_rejection_reason')->nullable();
            $table->text('admin_rejection_reason')->nullable();

            $table->enum('payment_status', ['pending', 'funded', 'released'])->default('pending');

            $table->timestamps();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('canceled_at')->nullable();

            $table->foreign('freelancer_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('buyer_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_offers');
    }
};
