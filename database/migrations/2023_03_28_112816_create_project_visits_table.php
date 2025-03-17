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
        Schema::create('project_visits', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('project_id');
            $table->ipAddress('ip_address')->nullable();
            $table->mediumInteger('impressions')->default(1);
            $table->text('user_agent')->nullable();
            $table->timestamp('first_visit')->nullable();
            $table->timestamp('last_visit')->nullable();

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
        Schema::dropIfExists('project_visits');
    }
};
