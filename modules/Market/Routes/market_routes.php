<?php

use Illuminate\Support\Facades\Route;
use Modules\Market\Http\Controllers\BrandController;
use Modules\Market\Http\Controllers\DeliveryMethodController;
use Modules\Market\Http\Controllers\ProductColorController;
use Modules\Market\Http\Controllers\ProductController;
use Modules\Market\Http\Controllers\ProductGalleryController;
use Modules\Market\Http\Controllers\ProductGuarantyController;
use Modules\Market\Http\Controllers\ProductPropertyController;
use Modules\Market\Http\Controllers\ProductPropertyValueController;
use Modules\Market\Http\Controllers\WarehouseController;
use Modules\Order\Http\Controllers\OrderController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('market')->group(function () {

            Route::prefix('brands')->group(function () {
                Route::get('/', [BrandController::class, 'index']);
                Route::post('/', [BrandController::class, 'store']);
                Route::get('{brand}', [BrandController::class, 'show']);
                Route::patch('{brand}', [BrandController::class, 'update']);
                Route::delete('{brand}', [BrandController::class, 'destroy']);
            });

            Route::prefix('properties')->group(function () {
                Route::get('/', [ProductPropertyController::class, 'index']);
                Route::get('/create', [ProductPropertyController::class, 'create']);
                Route::post('/', [ProductPropertyController::class, 'store']);
                Route::get('{property}', [ProductPropertyController::class, 'show']);
                Route::patch('{property}', [ProductPropertyController::class, 'update']);
                Route::delete('{property}', [ProductPropertyController::class, 'destroy']);
            });

            Route::prefix('products')->group(function () {
                Route::get('/', [ProductController::class, 'index']);
                Route::get('/create', [ProductController::class, 'create']);
                Route::post('/', [ProductController::class, 'store']);
                Route::get('{product}', [ProductController::class, 'show']);
                Route::patch('{product}', [ProductController::class, 'update']);
                Route::delete('{product}', [ProductController::class, 'destroy']);

                Route::prefix('{product}')->group(function () {
                    Route::prefix('images')->group(function () {
                        Route::get('/', [ProductGalleryController::class, 'index']);
                        Route::post('/', [ProductGalleryController::class, 'store']);
                        Route::delete('{image}', [ProductGalleryController::class, 'destroy']);
                    });

                    Route::prefix('colors')->group(function () {
                        Route::get('/', [ProductColorController::class, 'index']);
                        Route::post('/', [ProductColorController::class, 'store']);
                        Route::delete('{color}', [ProductColorController::class, 'destroy']);
                    });

                    Route::prefix('guaranties')->group(function () {
                        Route::get('/', [ProductGuarantyController::class, 'index']);
                        Route::post('/', [ProductGuarantyController::class, 'store']);
                        Route::delete('{guaranty}', [ProductGuarantyController::class, 'destroy']);
                    });
                });

            });

            Route::prefix('properties')->group(function () {
                Route::get("/", [ProductPropertyController::class, 'index']);
                Route::get("create", [ProductPropertyController::class, 'create']);
                Route::post("/", [ProductPropertyController::class, 'store']);
                Route::patch("{property}", [ProductPropertyController::class, 'update']);
                Route::delete("{property}", [ProductPropertyController::class, 'destroy']);


                Route::prefix('{property}/values')->group(function () {
                    Route::get('/', [ProductPropertyValueController::class, 'index']);
                    Route::get('create', [ProductPropertyValueController::class, 'create']);
                    Route::post('/', [ProductPropertyValueController::class, 'store']);
                    Route::patch('{value}', [ProductPropertyValueController::class, 'update']);
                    Route::delete('{value}', [ProductPropertyValueController::class, 'destroy']);
                });
            });

            Route::prefix('deliveries')->group(function () {
                Route::get('/', [DeliveryMethodController::class, 'index']);
                Route::post('/', [DeliveryMethodController::class, 'store']);
                Route::get('{delivery_method}', [DeliveryMethodController::class, 'show']);
                Route::patch('{delivery_method}', [DeliveryMethodController::class, 'update']);
                Route::patch('{delivery_method}/update-status', [DeliveryMethodController::class, 'updateStatus']);
                Route::delete('{delivery_method}', [DeliveryMethodController::class, 'destroy']);
            });

            Route::prefix('warehouse')->group(function () {
                Route::get('/', [WarehouseController::class, 'index']);
                Route::get('{product}/increment', [WarehouseController::class, 'create']);
                Route::post('{product}/increment', [WarehouseController::class, 'increment']);

//                Route::get('{warehouse}', [WarehouseController::class, 'show']);
//                Route::post('/', [WarehouseController::class, 'store']);
//                Route::patch('{warehouse}', [WarehouseController::class, 'update']);


            });

        });

    });

});
