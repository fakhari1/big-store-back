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
        Schema::create('delivery_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount', 20, 3)->nullable();
            $table->unsignedTinyInteger('delivery_time')->nullable();
            $table->enum('delivery_time_unit', \Modules\Market\Models\DeliveryMethod::$delivery_time_units)->default('weekly');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_methods');
    }
};
