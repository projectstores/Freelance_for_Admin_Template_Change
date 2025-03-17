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
        Schema::create('projects_categories_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projects_category_id')->index();
            $table->string('language_code', 5);
            $table->string('language_value', 100);

            $table->foreign('projects_category_id')->references('id')->on('projects_categories')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_categories_translation');
    }
};
