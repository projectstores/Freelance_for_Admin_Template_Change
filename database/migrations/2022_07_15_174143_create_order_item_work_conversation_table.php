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
        Schema::create('order_item_work_conversation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('msg_from');
            $table->text('msg_content');
            $table->boolean('is_seen')->default(false);
            $table->timestamp('created_at');

            $table->foreign('item_id')->references('id')->on('order_items')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item_work_conversation');
    }
};
