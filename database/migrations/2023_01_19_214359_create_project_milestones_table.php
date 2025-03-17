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
        Schema::create('project_milestones', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('project_id')->index();
            $table->enum('created_by', ['employer', 'freelancer']);
            $table->unsignedBigInteger('freelancer_id')->index()->nullable();
            $table->unsignedBigInteger('employer_id')->index()->nullable();
            $table->decimal('amount', 12);
            $table->string('description', 160);
            $table->enum('status', ['request', 'funded', 'paid']);
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
        Schema::dropIfExists('project_milestones');
    }
};
