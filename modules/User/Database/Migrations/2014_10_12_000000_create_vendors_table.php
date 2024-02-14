<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\User\Models\Vendor;
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->enum('type', Vendor::$types);
            $table->string('name')->nullable()->comment('juridical vendor');
            $table->string('national_code')->unique();
            $table->string('economic_code')->unique()->nullable()->comment('juridical vendor');
            $table->enum('juridical_type', Vendor::$juridical_types)->nullable()->comment('juridical vendor');
            $table->string('card_number', 16)->unique()->nullable()->comment('personal vendor');
            $table->string('shaba_number', 24)->unique()->nullable();
            $table->string('phone')->unique()->nullable()->comment('juridical vendor');
            $table->string('mobile', 10)->unique()->nullable()->comment('personal vendor');
            $table->timestamp('mobile_verified_at')->nullable();
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('avatar_id')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 => inactive, 1 => active');
            $table->string('signatory')->nullable()->comment('juridical vendor');
            $table->string('shop_selected_name')->nullable()->comment(' juridical vendor');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
