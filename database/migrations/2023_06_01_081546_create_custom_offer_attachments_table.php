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
        Schema::create('custom_offer_attachments', function (Blueprint $table) {
            $table->id();
            $table->char('uid', 36)->unique();
            $table->unsignedBigInteger('offer_id');
            $table->text('file_original_name')->nullable();
            $table->string('file_size', 20)->nullable();
            $table->string('file_extension', 10)->nullable();
            $table->string('file_mime', 60)->nullable();

            $table->foreign('offer_id')->references('id')->on('custom_offers')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_offer_attachments');
    }
};
