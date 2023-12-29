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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->longText('product_full_name');
            $table->unsignedBigInteger('amazing_discount_id')->nullable();
            $table->longText('amazing_discount_object')->nullable();
            $table->decimal('amazing_discount_sale_amount', 20, 3)->nullable();
            $table->unsignedTinyInteger('count')->default(1);
            $table->decimal('final_product_price', 20, 3)->nullable();
            $table->decimal('final_total_price', 20, 30)->nullable();
            $table->unsignedBigInteger('product_color_id')->nullable();
            $table->unsignedBigInteger('guaranty_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
