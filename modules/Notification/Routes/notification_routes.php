<?php

use Illuminate\Support\Facades\Route;
use Modules\Notification\Http\Controllers\SmsController;
use Modules\Notification\Http\Controllers\EmailController;

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

            Route::prefix('emails')->group(function () {
                Route::get('/', [EmailController::class, 'index']);
                Route::get('create', [EmailController::class, 'create']);
                Route::post('/', [EmailController::class, 'store']);
                Route::patch('{email}', [EmailController::class, 'update']);
                Route::patch('{email}/update-status', [EmailController::class, 'updateStatus']);
                Route::delete('{email}', [EmailController::class, 'destroy']);
            });
        });

    });
});
