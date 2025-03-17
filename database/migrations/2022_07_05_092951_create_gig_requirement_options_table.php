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
        Schema::create('gig_requirement_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirement_id');
            $table->string('option', 100);
            
            $table->foreign('requirement_id')->references('id')->on('gig_requirements')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gig_requirement_options');
    }
};
