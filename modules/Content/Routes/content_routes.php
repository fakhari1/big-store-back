<?php

use Illuminate\Support\Facades\Route;
use Modules\Content\Http\Controllers\CommentController;
use Modules\Content\Http\Controllers\PostCategoryController;
use Modules\Content\Http\Controllers\FaqController;
use Modules\Content\Http\Controllers\MenuController;
use Modules\Content\Http\Controllers\PageController;
use Modules\Content\Http\Controllers\BannerController;
use Modules\Content\Http\Controllers\PostController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {


        Route::prefix('content')->group(function () {


            Route::prefix('comments')->group(function () {
                Route::get('/', [CommentController::class, 'index']);
                Route::post('/', [CommentController::class, 'store']);
                Route::get('{comment}', [CommentController::class, 'show']);
                Route::patch('{comment}', [CommentController::class, 'update']);
                Route::delete('{comment}', [CommentController::class, 'destroy']);
            });

            Route::prefix("faqs")->group(function () {
                Route::get('/', [FaqController::class, 'index']);
                Route::get('create', [FaqController::class, 'create']);
                Route::post('/', [FaqController::class, 'store']);
                Route::patch('{faq}', [FaqController::class, 'update']);
                Route::delete('{faq}', [FaqController::class, 'destroy']);
            });


            Route::prefix('pages')->group(function () {
                Route::get('/', [PageController::class, 'index']);
                Route::get('create', [PageController::class, 'create']);
                Route::post('/', [PageController::class, 'store']);
                Route::patch('{page}', [PageController::class, 'update']);
                Route::delete('{page}', [PageController::class, 'destroy']);
            });


            Route::prefix('posts')->group(function () {
                Route::get('/', [PostController::class, 'index']);
                Route::get('create', [PostController::class, 'create']);
                Route::post('/', [PostController::class, 'store']);
                Route::get('{post}', [PostController::class, 'show']);
                Route::patch('{post}', [PostController::class, 'update']);
                Route::delete('{post}', [PostController::class, 'destroy']);
                Route::patch('{post}/update-status', [PostController::class, 'updateStatus']);
                Route::patch('{post}/update-comment-ability-status', [PostController::class, 'updateCommentAbilityStatus']);
            });


            Route::prefix('banners')->group(function () {
                Route::get('/', [BannerController::class, 'index']);
                Route::get('create', [BannerController::class, 'create']);
                Route::post('/', [BannerController::class, 'store']);
                Route::patch('{banner}', [BannerController::class, 'update']);
                Route::delete('{banner}', [BannerController::class, 'destroy']);
            });

        });

    });
});
