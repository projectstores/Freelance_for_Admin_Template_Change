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
        Schema::create('gig_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gig_id');
            $table->text('question');
            $table->enum('type', ['text', 'choice', 'file']);
            $table->boolean('is_required')->default(false);
            $table->boolean('is_multiple')->default(false);

            $table->foreign('gig_id')->references('id')->on('gigs')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gig_requirements');
    }
};
