<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\ManagerController;
use Modules\User\Http\Controllers\CustomerController;
use Modules\User\Http\Controllers\VendorController;
use Modules\User\Http\Controllers\UserController;

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

            Route::prefix('vendors')->group(function () {
                Route::get('/', [VendorController::class, 'index']);
                Route::get('create', [VendorController::class, 'create']);
                Route::post('/', [VendorController::class, 'store']);
                Route::get('{vendor}', [VendorController::class, 'show']);
                Route::patch('{vendor}', [VendorController::class, 'update']);
                Route::delete('{vendor}', [VendorController::class, 'destroy']);
            });

        });
    });
});
