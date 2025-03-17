<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_messages', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('type');
            $table->bigInteger('from_id');
            $table->bigInteger('to_id');
            $table->text('body')->nullable();
            $table->text('attachment')->nullable();
            $table->boolean('is_audio')->default(false);
            $table->boolean('seen')->default(false);
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_messages');
    }
}
