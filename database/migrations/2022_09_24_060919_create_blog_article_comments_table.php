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
        Schema::create('blog_article_comments', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('article_id');
            $table->string('name', 60);
            $table->string('email', 60);
            $table->text('comment');
            $table->ipAddress()->nullable();
            $table->text('user_agent')->nullable();
            $table->enum('status', ['pending', 'active', 'hidden'])->default('pending');
            $table->timestamps();

            $table->foreign('article_id')->references('id')->on('blog_articles')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_article_comments');
    }
};
