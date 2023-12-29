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

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('market')->group(function () {

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
