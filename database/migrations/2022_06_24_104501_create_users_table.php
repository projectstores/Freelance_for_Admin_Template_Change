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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->string('username', 60)->unique();
            $table->string('email', 60)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60)->nullable();
            $table->enum('account_type', ['seller', 'buyer'])->default('buyer');
            $table->unsignedBigInteger('avatar_id')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->string('provider_name', 60)->nullable();
            $table->string('provider_id', 60)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('fullname', 60)->nullable();
            $table->string('headline', 100)->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'pending', 'verified', 'banned'])->default('pending');
            $table->string('balance_net', 20)->default(0);
            $table->string('balance_withdrawn', 20)->default(0);
            $table->string('balance_purchases', 20)->default(0);
            $table->string('balance_pending', 20)->default(0);
            $table->string('balance_available', 20)->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamp('last_activity')->nullable();
            $table->timestamps();

            $table->foreign('avatar_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
            $table->foreign('level_id')->references('id')->on('levels')->onUpdate('no action')->onDelete('no action');
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
        Schema::dropIfExists('users');
    }
};
