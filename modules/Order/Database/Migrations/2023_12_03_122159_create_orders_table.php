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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->longText('sent_address')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->tinyInteger('delivery_status')->default(0);
            $table->unsignedInteger('final_amount')->nullable();
            $table->unsignedInteger('total_discounts_amount')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->unsignedBigInteger('common_id')->nullable();
            $table->unsignedInteger('total_products_discount_amount')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
