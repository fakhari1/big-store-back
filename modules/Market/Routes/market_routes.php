<?php

use Illuminate\Support\Facades\Route;
use Modules\Market\Http\Controllers\BrandController;
use Modules\Market\Http\Controllers\ProductController;
use Modules\Market\Http\Controllers\DeliveryMethodController;
use Modules\Market\Http\Controllers\ProductGalleryController;
use Modules\Market\Http\Controllers\OrderController;

Route::middleware(['api'])->prefix('api')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('market')->group(function () {

            Route::prefix('brands')->group(function () {
                Route::get('/', [BrandController::class, 'index'])->name('admin.market.brands.index');
                Route::post('/', [BrandController::class, 'store'])->name('admin.market.brands.store');
                Route::get('{brand}', [BrandController::class, 'show'])->name('admin.market.brands.show');
                Route::patch('{brand}', [BrandController::class, 'update'])->name('admin.market.brands.update');
                Route::delete('{brand}', [BrandController::class, 'destroy'])->name('admin.market.brands.delete');
            });

            Route::prefix('products')->group(function () {
                Route::get('/', [ProductController::class, 'index'])->name('admin.market.products.index');
                Route::post('/', [ProductController::class, 'store'])->name('admin.market.products.store');
                Route::get('{product}', [ProductController::class, 'show'])->name('admin.market.products.show');
                Route::patch('{product}', [ProductController::class, 'update'])->name('admin.market.products.update');
                Route::delete('{product}', [ProductController::class, 'destroy'])->name('admin.market.products.delete');

                Route::prefix('{product}/gallery')->group(function () {
                    Route::get('/', [ProductGalleryController::class, 'index']);
                    Route::post('/', [ProductGalleryController::class, 'store']);
                    Route::delete('{product_gallery}', [ProductGalleryController::class, 'destroy']);
                });
            });

            Route::prefix('deliveries')->group(function () {
                Route::get('/', [DeliveryMethodController::class, 'index'])->name('admin.market.deliveries.index');
                Route::post('/', [DeliveryMethodController::class, 'store'])->name('admin.market.deliveries.store');
                Route::get('{delivery_method}', [DeliveryMethodController::class, 'show'])->name('admin.market.deliveries.show');
                Route::patch('{delivery_method}', [DeliveryMethodController::class, 'update'])->name('admin.market.deliveries.update');
                Route::delete('{delivery_method}', [DeliveryMethodController::class, 'destroy'])->name('admin.market.deliveries.delete');
            });

            Route::prefix('orders')->group(function () {
                Route::get('/', [OrderController::class, 'index']);
                Route::post('store', [OrderController::class, 'store']);
                Route::get('sending', [OrderController::class, 'sendingOrders']);
                Route::get('unpaid', [OrderController::class, 'unpaidOrders']);
                Route::get('returned', [OrderController::class, 'returnedOrders']);
                Route::get('canceled', [OrderController::class, 'canceledOrders']);
                Route::patch('{order}', [OrderController::class, 'update']);
            });

        });
    });
});
