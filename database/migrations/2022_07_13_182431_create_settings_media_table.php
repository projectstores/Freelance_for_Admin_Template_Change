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
        Schema::create('settings_media', function (Blueprint $table) {
            $table->id();
            $table->integer('requirements_file_max_size')->default(50);
            $table->text('requirements_file_allowed_extensions');
            $table->integer('delivered_work_max_size')->default(50);
            $table->integer('portfolio_max_images')->default(10);
            $table->integer('portfolio_max_size')->default(5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_media');
    }
};
