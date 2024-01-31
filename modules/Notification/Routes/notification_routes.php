<?php

use Illuminate\Support\Facades\Route;
use Modules\Notification\Http\Controllers\SmsController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('notifications')->group(function () {

            Route::prefix('short-messages')->group(function () {
                Route::get('/', [SmsController::class, 'index']);
                Route::get('create', [SmsController::class, 'create']);
                Route::post('/', [SmsController::class, 'store']);
                Route::patch('{short_message}', [SmsController::class, 'update']);
                Route::patch('{short_message}/update-status', [SmsController::class, 'updateStatus']);
                Route::delete('{short_message}', [SmsController::class, 'destroy']);
            });

        });

    });
});
