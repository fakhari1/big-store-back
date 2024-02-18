<?php


use Illuminate\Support\Facades\Route;
use Modules\Payment\Http\Controllers\PaymentController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('payments')->group(function () {
            Route::get('online', [PaymentController::class, 'getOnlinePayments']);
            Route::get('offline', [PaymentController::class, 'getOfflinePayments']);
            Route::get('cash', [PaymentController::class, 'getCashPayments']);
            Route::get('{payment}/show', [PaymentController::class, 'show']);
            Route::patch('{payment}/update-status', [PaymentController::class, 'updateStatus']);
//                Route::patch('{payment}/update-status', [PaymentController::class, 'updateStatus']);
        });
    });
});
