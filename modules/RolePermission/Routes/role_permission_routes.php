<?php

use Illuminate\Support\Facades\Route;
use Modules\RolePermission\Http\Controllers\RoleController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('roles-permissions')->group(function () {

            Route::prefix('roles')->group(function () {

                Route::get('/', [RoleController::class, 'index']);
                Route::get('create', [RoleController::class, 'create']);
                Route::post('/', [RoleController::class, 'store']);
                Route::get('{role}', [RoleController::class, 'show']);
                Route::patch('{role}', [RoleController::class, 'update']);
                Route::delete('{role}', [RoleController::class, 'destroy']);

            });

            Route::prefix('permissions')->group(function () {

                Route::get('/', []);
//                Route::get('create', []);
//                Route::post('/', []);
//                Route::patch('{permission}', []);
//                Route::delete('{permission}', []);
            });

        });
    });
});
