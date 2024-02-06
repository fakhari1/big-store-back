<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('settings', function (Blueprint $table): void {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->unsignedTinyInteger('logo_id')->nullable();
            $table->unsignedTinyInteger('icon_id')->nullable();
            $table->string('phones')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('instagram_username')->nullable();
            $table->string('telegram_username')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
