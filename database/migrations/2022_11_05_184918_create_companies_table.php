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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name', 60)->unique();
            $table->string('slug', 120)->unique();
            $table->text('description');
            $table->string('registration_number', 60)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('state', 60)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('phone', 60)->nullable();
            $table->unsignedBigInteger('logo_id')->nullable();
            $table->enum('status', ['pending', 'active', 'hidden'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('logo_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
