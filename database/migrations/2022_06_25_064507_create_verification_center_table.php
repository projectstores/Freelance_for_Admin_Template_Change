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
        Schema::create('verification_center', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('user_id');
            $table->enum('document_type', ['id', 'driver_license', 'passport']);
            $table->unsignedBigInteger('file_front_side');
            $table->unsignedBigInteger('file_back_side')->nullable();
            $table->unsignedBigInteger('file_selfie');
            $table->enum('status', ['pending', 'verified', 'declined'])->default('pending');
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('declined_at')->nullable();
            $table->timestamp('created_at');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('file_front_side')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('file_back_side')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('file_selfie')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verification_center');
    }
};
