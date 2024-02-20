<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('english_name');
            $table->string('persian_name');
            $table->text('introduction');
            $table->text('text');
            $table->string('slug')->unique()->nullable();
            $table->unsignedBigInteger('image_id');
            $table->unsignedInteger('weight');
            $table->unsignedInteger('length');
            $table->unsignedInteger('width');
            $table->unsignedInteger('height');
            $table->unsignedInteger('price');
            $table->tinyInteger('status')->default(0);
            $table->boolean('is_marketable')->default(true);
            $table->string('tags');
            $table->json('properties')->nullable();
            $table->tinyInteger('sold_number')->default(0);
            $table->tinyInteger('quantity_in_cart')->default(0);
            $table->tinyInteger('marketable_number')->default(0);
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('product_category_id');
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
