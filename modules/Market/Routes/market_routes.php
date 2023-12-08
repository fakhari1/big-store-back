<?php

use Illuminate\Support\Facades\Route;
use Modules\Market\Http\Controllers\BrandController;
use Modules\Market\Http\Controllers\ProductController;
use Modules\Market\Http\Controllers\ProductGalleryController;
use Modules\Market\Http\Controllers\ProductColorController;
use Modules\Market\Http\Controllers\ProductGuarantyController;
use Modules\Market\Http\Controllers\ProductPropertyValueController;
use Modules\Market\Http\Controllers\ProductPropertyController;
use Modules\Market\Http\Controllers\DeliveryMethodController;
use Modules\Market\Http\Controllers\OrderController;
use Modules\Market\Http\Controllers\WarehouseController;

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

                Route::prefix('{product}')->group(function () {
                    Route::prefix('gallery')->group(function () {
                        Route::get('/', [ProductGalleryController::class, 'index']);
                        Route::post('/', [ProductGalleryController::class, 'store']);
                        Route::delete('{gallery}', [ProductGalleryController::class, 'destroy']);
                    });

                    Route::prefix('colors')->group(function () {
                        Route::get('/', [ProductColorController::class, 'index'])->name('admin.market.products.colors.index');
                        Route::post('/', [ProductColorController::class, 'store'])->name('admin.market.products.colors.store');
                        Route::delete('{color}', [ProductColorController::class, 'destroy'])->name('admin.market.products.colors.delete');
                    });

                    Route::prefix('guaranties')->group(function () {
                        Route::get('/', [ProductGuarantyController::class, 'index'])->name('admin.market.products.guaranties.index');
                        Route::post('/', [ProductGuarantyController::class, 'store'])->name('admin.market.products.guaranties.store');
                        Route::delete('{guaranty}', [ProductGuarantyController::class, 'destroy'])->name('admin.market.products.guaranties.delete');
                    });
                });

            });

            Route::prefix('properties')->group(function () {
                Route::get("/", [ProductPropertyController::class, 'index'])->name("admin.market.properties.index");
                Route::get("create", [ProductPropertyController::class, 'create'])->name("admin.market.properties.create");
                Route::post("/", [ProductPropertyController::class, 'store'])->name("admin.market.properties.store");
                Route::patch("{property}", [ProductPropertyController::class, 'update'])->name("admin.market.properties.update");
                Route::delete("{property}", [ProductPropertyController::class, 'destroy'])->name("admin.market.properties.delete");


                Route::prefix('{property}/values')->group(function () {
                    Route::get('/', [ProductPropertyValueController::class, 'index'])->name('admin.market.properties.values');
                    Route::get('create', [ProductPropertyValueController::class, 'create'])->name('admin.market.properties.values.create');
                    Route::post('/', [ProductPropertyValueController::class, 'store'])->name('admin.market.properties.values.store');
                    Route::patch('{value}', [ProductPropertyValueController::class, 'update'])->name('admin.market.properties.values.update');
                    Route::delete('{value}', [ProductPropertyValueController::class, 'destroy'])->name('admin.market.properties.values.delete');
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

            Route::prefix('warehouse')->group(function () {

                Route::get('/', [WarehouseController::class, 'index']);
                Route::get('{warehouse}', [WarehouseController::class, 'show']);
                Route::post('/', [WarehouseController::class, 'store']);
                Route::patch('{warehouse}', [WarehouseController::class, 'update']);
                Route::delete('{warehouse}', [WarehouseController::class, 'destroy']);

                Route::get('add', [WarehouseController::class, 'add']);
                Route::post('add', [WarehouseController::class, 'adding']);

            });

        });
    });
});
