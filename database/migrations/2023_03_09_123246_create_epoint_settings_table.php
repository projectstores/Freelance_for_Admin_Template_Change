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
        Schema::create('epoint_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60)->default('Epoint');
            $table->boolean('is_enabled')->default(false);
            $table->unsignedBigInteger('logo_id')->index()->nullable();
            $table->string('currency', 3)->default('AZN');
            $table->decimal('exchange_rate')->default(1.7);
            $table->decimal('deposit_fee')->default(2);

            $table->foreign('logo_id')->references('id')->on('file_manager')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('epoint_settings');
    }
};
