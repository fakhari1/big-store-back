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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->longText('sent_address')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->longText('payment_object')->nullable();
            $table->tinyInteger('payment_type')->default(0);
            $table->tinyInteger('payment_status')->default(0);
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->longText('delivery_object')->nullable();
            $table->decimal('delivery_amount', 20, 3)->nullable();
            $table->tinyInteger('delivery_status')->default(0);
            $table->timestamp('delivery_date')->nullable();
            $table->decimal('final_amount', 20, 3)->nullable();
            $table->decimal('discount_amount', 20, 3)->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->longText('coupon_object')->nullable();
            $table->decimal('coupon_discount_amount', 20, 3)->nullable();
            $table->unsignedBigInteger('common_discount_id')->nullable();
            $table->longText('common_discount_object')->nullable();
            $table->decimal('common_discount_amount', 20, 3)->nullable();
            $table->decimal('total_products_discount_amount', 20, 3)->nullable();
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
