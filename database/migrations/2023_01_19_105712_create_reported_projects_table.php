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
        Schema::create('reported_projects', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('project_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('reason', 30);
            $table->text('description');
            $table->boolean('is_seen')->default(false);
            $table->timestamp('created_at');

            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('no action')->onDelete('no action');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reported_projects');
    }
};
