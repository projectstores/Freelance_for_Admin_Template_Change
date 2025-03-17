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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->string('title', 100);
            $table->string('slug', 30)->unique();
            $table->longText('content')->nullable();
            $table->boolean('is_link')->default(false);
            $table->string('link', 120)->nullable();
            $table->enum('column', [1, 2, 3, 4])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
