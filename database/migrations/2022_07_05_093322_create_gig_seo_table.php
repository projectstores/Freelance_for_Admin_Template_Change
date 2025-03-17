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
        Schema::create('gig_seo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gig_id');
            $table->string('title', 100);
            $table->text('description');

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
        Schema::dropIfExists('gig_seo');
    }
};
