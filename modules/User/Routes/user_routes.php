<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\ManagerController;
use Modules\User\Http\Controllers\CustomerController;
use Modules\User\Http\Controllers\VendorController;
use Modules\User\Http\Controllers\UserController;

Route::middleware(['api'])->prefix('api')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('{user}', [UserController::class, 'show']);

            Route::prefix('managers')->group(function () {
                Route::get('/', [ManagerController::class, 'index']);
                Route::get('create', [ManagerController::class, 'create']);
                Route::post('/', [ManagerController::class, 'store']);
                Route::patch('{manager}', [ManagerController::class, 'update']);
                Route::patch('{manager}/update-activated-status', [ManagerController::class, 'updateActivatedStatus']);
                Route::delete('{manager}', [ManagerController::class, 'destroy']);
            });

            Route::prefix('customers')->group(function () {
                Route::get('/', [CustomerController::class, 'index']);
                Route::get('create', [CustomerController::class, 'create']);
                Route::post('/', [CustomerController::class, 'store']);
                Route::patch('{customer}', [CustomerController::class, 'update']);
                Route::delete('{customer}', [CustomerController::class, 'destroy']);
            });

            Route::prefix('vendors')->group(function () {
                Route::get('/', [VendorController::class, 'index']);
                Route::get('create', [VendorController::class, 'create']);
                Route::post('/', [VendorController::class, 'store']);
                Route::patch('{vendor}', [VendorController::class, 'update']);
                Route::delete('{vendor}', [VendorController::class, 'destroy']);
            });

        });
    });
});
