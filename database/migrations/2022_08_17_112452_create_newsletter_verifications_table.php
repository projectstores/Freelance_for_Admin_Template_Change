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
        Schema::create('newsletter_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('list_id');
            $table->string('token', 60)->index();
            $table->timestamp('created_at');

            $table->foreign('list_id')->references('id')->on('newsletter_list')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsletter_verifications');
    }
};
