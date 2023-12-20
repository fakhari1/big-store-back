<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

Route::middleware(['api'])->prefix('api')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('users')->group(function () {


            Route::get('/', [UserController::class, 'index']);
            Route::get('managers', [UserController::class, 'getAllManagers']);
            Route::get('customers', [UserController::class, 'getAllCustomers']);
            Route::get('create', [UserController::class, 'create']);
            Route::get('{user}', [UserController::class, 'get']);
            Route::patch('{user}', [UserController::class, 'update']);
            Route::delete('{user}', [UserController::class, 'destroy']);

        });
    });
});
