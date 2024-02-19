<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Market\Models\DeliveryMethod;

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
            $table->unsignedInteger('amount')->nullable();
            $table->unsignedTinyInteger('delivery_time')->nullable();
            $table->enum('delivery_time_unit', DeliveryMethod::$delivery_time_units)->default(DeliveryMethod::UNIT_WEEKLY);
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
