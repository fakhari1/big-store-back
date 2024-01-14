<?php

use Illuminate\Support\Facades\Route;
use Modules\File\Http\Controllers\FileController;


Route::middleware('api')->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('files')->group(function () {

            Route::post('/', [FileController::class, 'store']);
            Route::get('{file}', [FileController::class, 'show']);
            Route::delete('{file}', [FileController::class, 'destroy']);

        });

    });

});
