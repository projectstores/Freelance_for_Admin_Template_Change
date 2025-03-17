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
        Schema::create('file_manager', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->string('file_folder', 60)->nullable();
            $table->string('file_size', 20)->nullable();
            $table->string('file_mimetype', 30)->nullable();
            $table->string('file_extension', 5)->nullable();
            $table->morphs('uploader');
            $table->timestamp('uploaded_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_manager');
    }
};
