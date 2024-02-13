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
                Route::get('/create', [CommentController::class, 'create']);
                Route::patch('seen', [CommentController::class, 'seenComments']);
                Route::post('/', [CommentController::class, 'store']);

                Route::prefix('{comment}')->group(function () {
                    Route::get('/', [CommentController::class, 'show']);
                    Route::post('answer', [CommentController::class, 'saveAnswer']);
                    Route::patch('/', [CommentController::class, 'update']);
                    Route::patch('update-confirmation-status', [CommentController::class, 'updateConfirmationStatus']);
                    Route::patch('update-status', [CommentController::class, 'updateStatus']);
                });
            });

            Route::prefix("faqs")->group(function () {
                Route::get('/', [FaqController::class, 'index']);
                Route::get('{faq}', [FaqController::class, 'show']);
                Route::post('/', [FaqController::class, 'store']);
                Route::patch('{faq}', [FaqController::class, 'update']);
                Route::delete('{faq}', [FaqController::class, 'destroy']);
                Route::patch('{faq}/update-status', [FaqController::class, 'updateStatus']);
            });


            Route::prefix('pages')->group(function () {
                Route::get('/', [PageController::class, 'index']);
                Route::get('create', [PageController::class, 'create']);
                Route::get('{page}', [PageController::class, 'show']);
                Route::post('/', [PageController::class, 'store']);
                Route::patch('{page}', [PageController::class, 'update']);
                Route::delete('{page}', [PageController::class, 'destroy']);
                Route::patch('{page}/update-status', [PageController::class, 'updateStatus']);
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
