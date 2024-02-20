<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\HomeController;
use Modules\Front\Http\Controllers\MarketController;
use Modules\Order\Http\Controllers\CartController;

Route::middleware('web')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('bg-store-prd/{vendor}/{product:slug}', [MarketController::class, 'product'])->name('products.show');

    Route::get('cart', [CartController::class, 'cart'])->name('users.buys.cart');
    Route::post('cart/{vendor}', [CartController::class, 'updateCart'])->name('users.buys.update-cart');
    Route::post('cart/add/{vendor}/{product:slug}', [CartController::class, 'addToCart'])->name('users.buys.add-to-cart');
    Route::get('cart/remove/{vendor}/{cart_item}', [CartController::class, 'removeFromCart'])->name('users.buys.remove-from-cart');
});
