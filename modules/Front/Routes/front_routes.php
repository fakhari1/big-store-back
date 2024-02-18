<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('{product:slug}', [HomeController::class, 'showProduct']);
