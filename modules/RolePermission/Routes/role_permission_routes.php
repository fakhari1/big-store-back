<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('roles_permissions')->group(function () {

            Route::prefix('roles')->group(function () {

                Route::get('/', []);
                Route::get('create', []);
                Route::post('/', []);
                Route::patch('{role}', []);
                Route::delete('{role}', []);

            });

            Route::prefix('permissions')->group(function () {

                Route::get('/', []);
                Route::get('create', []);
                Route::post('/', []);
                Route::patch('{permission}', []);
                Route::delete('{permission}', []);

            });

        });
    });
});
