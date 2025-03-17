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
        Schema::create('user_billing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('firstname', 60)->nullable();
            $table->string('lastname', 60)->nullable();
            $table->string('company', 60)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('zip', 20)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->text('address')->nullable();
            $table->string('vat_number', 30)->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_billing');
    }
};
