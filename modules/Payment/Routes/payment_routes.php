<?php


use Illuminate\Support\Facades\Route;
use Modules\Payment\Http\Controllers\PaymentController;

Route::middleware(['api'])->prefix('api')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('market')->group(function () {

            Route::prefix('payments')->group(function () {
                Route::get('/', [PaymentController::class, 'index']);
//                Route::get('{payment}', [PaymentController::class, 'show']);
                Route::get('online', [PaymentController::class, 'getOnlinePayments']);
                Route::get('offline', [PaymentController::class, 'getOfflinePayments']);
                Route::get('on-delivered', [PaymentController::class, 'getOnDeliveredPayments']);
                Route::patch('{payment}', [PaymentController::class, 'update']);

            });
        });
    });
});
