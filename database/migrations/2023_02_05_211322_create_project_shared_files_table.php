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
        Schema::create('project_shared_files', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->unique();
            $table->unsignedBigInteger('project_id')->index();
            $table->string('file_name', 100)->nullable();
            $table->decimal('file_size', 14, 2)->nullable();
            $table->string('file_extension', 6)->nullable();
            $table->string('file_mime', 20)->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_shared_files');
    }
};
