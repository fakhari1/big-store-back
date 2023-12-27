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
            $table->string('slug')->unique()->nullable();
            $table->text('image');
            $table->decimal('weight', 10, 2);
            $table->decimal('length', 10, 1);
            $table->decimal('width', 10, 1);
            $table->decimal('height', 10, 1);
            $table->unsignedInteger('price');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_marketable')->default(0);
            $table->string('tags');
            $table->tinyInteger('sold_count')->default(0);
            $table->tinyInteger('frozen_count')->default(0);
            $table->tinyInteger('marketable_count')->default(0);
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
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
