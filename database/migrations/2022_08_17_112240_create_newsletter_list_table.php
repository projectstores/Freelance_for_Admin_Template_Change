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
        Schema::create('newsletter_list', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->string('email', 60)->unique();
            $table->ipAddress()->nullable();
            $table->enum('status', ['pending', 'verified'])->default('pending');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsletter_list');
    }
};
