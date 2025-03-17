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
        Schema::create('offline_payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->string('name', 60)->unique();
            $table->string('slug', 60)->unique();
            $table->unsignedBigInteger('logo_id')->nullable();
            $table->string('currency', 10)->nullable();
            $table->float('exchange_rate')->default(1);
            $table->text('fixed_fee')->nullable();
            $table->text('percentage_fee')->nullable();
            $table->float('deposit_min_amount')->default(1);
            $table->float('deposit_max_amount')->default(100);
            $table->longText('details')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('country', 2)->nullable();

            $table->foreign('logo_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offline_payment_gateways');
    }
};
