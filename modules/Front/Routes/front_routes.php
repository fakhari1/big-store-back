<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\HomeController;
use Modules\Front\Http\Controllers\MarketController;
use Modules\Order\Http\Controllers\CartController;
use Modules\Front\Http\Controllers\ProfileController;


Route::middleware('web')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('bg-store-prd/{vendor}/{product:slug}', [MarketController::class, 'product'])->name('products.show');

//    Route::middleware('auth')->group(function () {
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'cart'])->name('users.buys.cart');
        Route::post('/', [CartController::class, 'updateCart'])->name('users.buys.update-cart');
        Route::post('add/{vendor}/{product:slug}', [CartController::class, 'addToCart'])->name('users.buys.add-to-cart');
        Route::get('remove/{cart_item}', [CartController::class, 'removeFromCart'])->name('users.buys.remove-from-cart');
    });

    Route::middleware('user_profile_is_completed')->prefix('address-and-delivery')->group(function () {
        Route::get('/', [MarketController::class, 'showAddressAndDeliveryMethodForm'])->name('users.address-and-delivery.show');
        Route::post('/', [MarketController::class, 'chooseAddressAndDelivery'])->name('users.address-and-delivery');
    });

    Route::get('profile-completion', [ProfileController::class, 'profileCompletion'])->name('users.profile.show');
    Route::post('profile-completion', [ProfileController::class, 'update'])->name('users.profile.update');
    Route::post('address', [Modules\Front\Http\Controllers\ProfileController::class, 'updateAddress'])->name('users.profile.address.store');
});
