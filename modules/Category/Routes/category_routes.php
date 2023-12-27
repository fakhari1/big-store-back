<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\ProductCategoryController;
use Modules\Content\Http\Controllers\PostCategoryController;
use Modules\Content\Controllers\MenuController;
Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('market')->group(function () {
            Route::prefix('categories')->group(function () {
                Route::get('/', [ProductCategoryController::class, 'index']);
                Route::post('/', [ProductCategoryController::class, 'store']);
                Route::get('{category}', [ProductCategoryController::class, 'show']);
                Route::patch('{category}', [ProductCategoryController::class, 'update']);
                Route::delete('{category}', [ProductCategoryController::class, 'destroy']);
            });
        });

        Route::prefix('content')->group(function () {
            Route::prefix('categories')->group(function () {
                Route::get('/', [PostCategoryController::class, 'index']);
                Route::get('create', [PostCategoryController::class, 'create']);
                Route::get('{category}', [PostCategoryController::class, 'show']);
                Route::post('/', [PostCategoryController::class, 'store']);
                Route::patch('{category}', [PostCategoryController::class, 'update']);
                Route::delete('{category}', [PostCategoryController::class, 'destroy']);


                Route::prefix('menus')->group(function () {
                    Route::get('/', [MenuController::class, 'index']);
                    Route::get('create', [MenuController::class, 'create']);
                    Route::post('/', [MenuController::class, 'store']);
                    Route::patch('{menu}', [MenuController::class, 'update']);
                    Route::delete('{menu}', [MenuController::class, 'destroy']);
                });
            });
        });
    });

});
