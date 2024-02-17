<?php

use Illuminate\Support\Facades\Route;
use Modules\RolePermission\Http\Controllers\RoleController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('roles-permissions')->group(function () {

            Route::prefix('roles')->group(function () {

                Route::get('/', [RoleController::class, 'index']);
                Route::get('create', []);
                Route::post('/', []);
                Route::patch('{role}', []);
                Route::delete('{role}', []);

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
