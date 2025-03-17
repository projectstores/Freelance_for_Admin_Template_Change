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
        Schema::create('project_bids', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('project_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('amount', 20);
            $table->integer('days');
            $table->text('message')->nullable();
            $table->boolean('is_sponsored')->default(false);
            $table->boolean('is_sealed')->default(false);
            $table->boolean('is_highlight')->default(false);
            $table->boolean('is_awarded')->default(false);
            $table->boolean('is_freelancer_accepted')->default(false);
            $table->enum('status', ['pending_approval', 'pending_payment', 'active', 'rejected', 'hidden'])->default('active');
            $table->text('admin_rejection_reason')->nullable();
            $table->string('freelancer_rejection_reason', 20)->nullable();
            $table->timestamp('awarded_date')->nullable();
            $table->timestamp('freelancer_accepted_date')->nullable();
            $table->timestamp('freelancer_rejected_date')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('no action')->onDelete('no action');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_bids');
    }
};
