<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\OrderController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('market')->group(function () {

            Route::prefix('orders')->group(function () {
                Route::get('/', [OrderController::class, 'index']);
                Route::get('{order}', [OrderController::class, 'show']);
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
