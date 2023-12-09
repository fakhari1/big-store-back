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
                Route::get('/', [CommentController::class, 'index'])->name('admin.market.comments.index');
                Route::post('/', [CommentController::class, 'store'])->name('admin.market.comments.store');
                Route::get('{comment}', [CommentController::class, 'show'])->name('admin.market.comments.show');
                Route::patch('{comment}', [CommentController::class, 'update'])->name('admin.market.comments.update');
                Route::delete('{comment}', [CommentController::class, 'destroy'])->name('admin.market.comments.delete');
            });


            Route::prefix("faq")->group(function () {
                Route::get('/', [FaqController::class, 'index'])->name('admin.content.faq.index');
                Route::get('create', [FaqController::class, 'create'])->name('admin.content.faq.create');
                Route::post('/', [FaqController::class, 'store'])->name('admin.content.faq.store');
                Route::patch('{faq}', [FaqController::class, 'update'])->name('admin.content.faq.update');
                Route::delete('{faq}', [FaqController::class, 'destroy'])->name('admin.content.faq.delete');
            });


            Route::prefix('menus')->group(function () {
                Route::get('/', [MenuController::class, 'index'])->name('admin.content.menu.index');
                Route::get('create', [MenuController::class, 'create'])->name('admin.content.menu.create');
                Route::post('/', [MenuController::class, 'store'])->name('admin.content.menu.store');
                Route::put('{menu}', [MenuController::class, 'update'])->name('admin.content.menu.update');
                Route::delete('{menu}', [MenuController::class, 'destroy'])->name('admin.content.menu.delete');
            });


            Route::prefix('pages')->group(function () {
                Route::get('/', [PageController::class, 'index'])->name('admin.content.page.index');
                Route::get('create', [PageController::class, 'create'])->name('admin.content.page.create');
                Route::post('/', [PageController::class, 'store'])->name('admin.content.page.store');
                Route::put('{page}', [PageController::class, 'update'])->name('admin.content.page.update');
                Route::delete('{page}', [PageController::class, 'destroy'])->name('admin.content.page.delete');
            });


            Route::prefix('post')->group(function () {
                Route::get('/', [PostController::class, 'index'])->name('admin.content.post.index');
                Route::get('/create', [PostController::class, 'create'])->name('admin.content.post.create');
                Route::post('/create', [PostController::class, 'store'])->name('admin.content.post.store');
                Route::get('/edit/{post}', [PostController::class, 'edit'])->name('admin.content.post.edit');
                Route::put('/update/{post}', [PostController::class, 'update'])->name('admin.content.post.update');
                Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('admin.content.post.delete');
                Route::get('/status/{post}', [PostController::class, 'status'])->name('admin.content.post.status');
                Route::get('/commentability/{post}', [PostController::class, 'commentability'])->name('admin.content.post.commentability');
            });

            Route::prefix('banners')->group(function () {
                Route::get('/', [BannerController::class, 'index'])->name('admin.content.banners.index');
                Route::get('create', [BannerController::class, 'create'])->name('admin.content.banners.create');
                Route::post('store', [BannerController::class, 'store'])->name('admin.content.banners.store');
                Route::get('edit/{banner}', [BannerController::class, 'edit'])->name('admin.content.banners.edit');
                Route::put('update/{banner}', [BannerController::class, 'update'])->name('admin.content.banners.update');
                Route::delete('destroy/{banner}', [BannerController::class, 'destroy'])->name('admin.content.banners.destroy');
                Route::get('status/{banner}', [BannerController::class, 'status'])->name('admin.content.banners.status');
            });
        });

    });
});
