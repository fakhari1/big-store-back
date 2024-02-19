<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\ManagerController;
use Modules\User\Http\Controllers\CustomerController;
use Modules\User\Http\Controllers\UserPaymentController;
use Modules\User\Http\Controllers\VendorController;
use Modules\User\Http\Controllers\UserController;
use Modules\User\Http\Controllers\AuthController;
Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('users')->group(function () {

            Route::prefix('managers')->group(function () {
                Route::get('/', [ManagerController::class, 'index']);
                Route::get('create', [ManagerController::class, 'create']);
                Route::post('/', [ManagerController::class, 'store']);
                Route::get('{manager}', [ManagerController::class, 'show']);
                Route::patch('{manager}', [ManagerController::class, 'update']);
                Route::patch('{manager}/update-status', [ManagerController::class, 'updateStatus']);
                Route::delete('{manager}', [ManagerController::class, 'destroy']);
            });

            Route::prefix('customers')->group(function () {
                Route::get('/', [CustomerController::class, 'index']);
                Route::get('create', [CustomerController::class, 'create']);
                Route::get('{user}', [CustomerController::class, 'show']);
                Route::post('/', [CustomerController::class, 'store']);
                Route::get('{customer}', [CustomerController::class, 'show']);
                Route::patch('{customer}', [CustomerController::class, 'update']);
                Route::delete('{customer}', [CustomerController::class, 'destroy']);
            });

        });
    });
    //payment
    Route::prefix('user')->group(function () {
        //payment
        Route::prefix('payments')->group(function () {
            Route::get('online', [UserPaymentController::class, 'getOnlinePayments']);
            Route::get('{payment}/show', [UserPaymentController::class, 'show']);
        });
    });
});

