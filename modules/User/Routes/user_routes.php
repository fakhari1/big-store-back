<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\ManagerController;
use Modules\User\Http\Controllers\CustomerController;
use Modules\User\Http\Controllers\VendorController;
use Modules\User\Http\Controllers\UserController;

Route::middleware(['api'])->prefix('api')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('users')->group(function () {

//            Route::get('{user}', [UserController::class, 'show']);

            Route::prefix('managers')->group(function () {
                Route::get('/', [ManagerController::class, 'index']);
                Route::get('create', [ManagerController::class, 'create']);
                Route::post('/', [ManagerController::class, 'store']);
                Route::patch('{user}', [ManagerController::class, 'update']);
                Route::patch('{user}/update-status', [ManagerController::class, 'updateStatus']);
                Route::delete('{user}', [ManagerController::class, 'destroy']);
            });

            Route::prefix('customers')->group(function () {
                Route::get('/', [CustomerController::class, 'index']);
                Route::get('create', [CustomerController::class, 'create']);
                Route::get('{user}', [CustomerController::class, 'show']);
                Route::post('/', [CustomerController::class, 'store']);
                Route::patch('{user}', [CustomerController::class, 'update']);
                Route::delete('{user}', [CustomerController::class, 'destroy']);
            });

            Route::prefix('vendors')->group(function () {
                Route::get('/', [VendorController::class, 'index']);
                Route::get('create', [VendorController::class, 'create']);
                Route::post('/', [VendorController::class, 'store']);
                Route::patch('{user}', [VendorController::class, 'update']);
                Route::delete('{user}', [VendorController::class, 'destroy']);
            });

        });
    });
});
