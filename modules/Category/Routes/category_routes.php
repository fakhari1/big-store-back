<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\ProductCategoryController;
use Modules\Category\Http\Controllers\PostCategoryController;
use Modules\Category\Http\Controllers\MenuController;

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
                Route::get('{postCategory}', [PostCategoryController::class, 'show']);
                Route::post('/', [PostCategoryController::class, 'store']);
                Route::patch('{postCategory}', [PostCategoryController::class, 'update']);
                Route::delete('{postCategory}', [PostCategoryController::class, 'destroy']);


                Route::prefix('menus')->group(function () {
                    Route::get('/', [MenuController::class, 'index']);
                    Route::get('create', [MenuController::class, 'create']);
                    Route::get('{menu}', [MenuController::class, 'show']);
                    Route::post('/', [MenuController::class, 'store']);
                    Route::patch('{menu}', [MenuController::class, 'update']);
                    Route::delete('{menu}', [MenuController::class, 'destroy']);
                });
            });
        });
    });

});
