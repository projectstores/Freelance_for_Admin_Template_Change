<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings_publish', function (Blueprint $table) {
            $table->boolean('enable_custom_offers')->default(false)->after('max_image_size');
            $table->boolean('custom_offers_require_approval')->default(true)->after('enable_custom_offers');
            $table->enum('custom_offers_commission_type', ['fixed', 'percentage'])->default('percentage')->after('custom_offers_require_approval');
            $table->decimal('custom_offers_commission_value_freelancer')->default(0)->after('custom_offers_commission_type');
            $table->decimal('custom_offers_commission_value_buyer')->default(0)->after('custom_offers_commission_value_freelancer');
            $table->integer('custom_offers_expiry_days')->default(3)->after('custom_offers_commission_value_buyer');
            $table->boolean('custom_offer_enable_attachments')->default(false)->after('custom_offers_expiry_days');
            $table->integer('custom_offer_attachment_max_size')->default(5)->after('custom_offer_enable_attachments');
            $table->integer('custom_offer_attachment_max_files')->default(10)->after('custom_offer_attachment_max_size');
            $table->text('custom_offer_attachments_allowed_extensions')->nullable()->after('custom_offer_attachment_max_files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings_publish', function (Blueprint $table) {
            $table->dropColumn('enable_custom_offers');
            $table->dropColumn('custom_offers_require_approval');
            $table->dropColumn('custom_offers_commission_type');
            $table->dropColumn('custom_offers_commission_value_freelancer');
            $table->dropColumn('custom_offers_commission_value_buyer');
            $table->dropColumn('custom_offers_expiry_days');
            $table->dropColumn('custom_offer_enable_attachments');
            $table->dropColumn('custom_offer_attachment_max_size');
            $table->dropColumn('custom_offer_attachment_max_files');
            $table->dropColumn('custom_offer_attachments_allowed_extensions');
        });
    }
};
