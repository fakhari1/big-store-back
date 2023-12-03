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
            $table->unsignedBigInteger('address_id');
            $table->longText('address_object')->nullable();
            $table->unsignedBigInteger('payment_id');
            $table->longText('payment_object')->nullable();
            $table->tinyInteger('payment_type')->nullable();
            $table->tinyInteger('payment_status')->default(0);
            $table->unsignedBigInteger('delivery_id');
            $table->longText('delivery_object')->nullable();
            $table->decimal('delivery_amount', 20, 3)->nullable();
            $table->tinyInteger('delivery_status')->default(0);
            $table->timestamp('delivery_date')->nullable();
            $table->decimal('order_final_amount', 20, 3)->nullable();
            $table->decimal('order_discount_amount', 20, 3)->nullable();
            $table->unsignedBigInteger('coupon_id');
            $table->foreign('coupon_id')->references('id')->on('coupons')->cascadeOnDelete()->cascadeOnUpdate();

            $table->longText('coupon_object')->nullable();
            $table->decimal('order_coupon_discount_amount', 20, 3)->nullable();

//            $table->foreignId('common_discount_id')->nullable()->constrained('common_discounts')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('common_discount_id');
            $table->foreign('common_discount_id')->references('id')->on('common_discounts')->cascadeOnDelete()->cascadeOnUpdate();

            $table->longText('common_discount_object')->nullable();
            $table->decimal('order_common_discount_amount', 20, 3)->nullable();
            $table->decimal('order_total_products_discount_amount', 20, 3)->nullable();
            $table->tinyInteger('order_status')->default(0);
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
