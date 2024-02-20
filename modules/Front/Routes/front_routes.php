<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\HomeController;
use Modules\User\Http\Controllers\AuthController;
use Modules\Front\Http\Controllers\MarketController;

Route::middleware('web')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('bg-store-prd/{vendor}/{product:slug}', [MarketController::class, 'product'])->name('products.show');
});
