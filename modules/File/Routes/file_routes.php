<?php

use Illuminate\Support\Facades\Route;
use Modules\File\Http\Controllers\FileController;


Route::middleware('api')->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('market')->group(function () {

            Route::get('create', [FileController::class, 'create']);
            Route::post('/', [FileController::class, 'new']);
//            Route::get('file/{file}', ['FileController', 'show']);
//            Route::get('file/delete/{file}' , ['FileController', 'delete']);
        });

    });

});
