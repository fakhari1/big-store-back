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
            $table->unsignedBigInteger('amazing_discount_id')->nullable();
            $table->unsignedInteger('amazing_discount_sale_amount')->nullable();
            $table->unsignedTinyInteger('count')->default(1);
            $table->unsignedInteger('final_product_price')->nullable();
            $table->unsignedInteger('final_total_price')->nullable();
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
