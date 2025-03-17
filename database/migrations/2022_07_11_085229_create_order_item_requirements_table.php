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
        Schema::create('order_item_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->text('question');
            $table->enum('form_type', ['text', 'choice', 'file']);
            $table->longText('form_value');

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
        Schema::dropIfExists('order_item_requirements');
    }
};
