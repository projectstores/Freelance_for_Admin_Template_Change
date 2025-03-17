<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('gigs', function (Blueprint $table) {
            $table->text('rejection_reason')->after('status')->nullable();
            DB::statement("ALTER TABLE gigs  MODIFY COLUMN status ENUM('pending','rejected','active','deleted','boosted','trending','featured') NOT NULL DEFAULT 'pending'");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gigs', function (Blueprint $table) {
            $table->dropColumn('rejection_reason');
            DB::statement("ALTER TABLE gigs MODIFY COLUMN status ENUM('pending','active','deleted','boosted','trending','featured') NOT NULL DEFAULT 'pending'");
        });
    }
};
