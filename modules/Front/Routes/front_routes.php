<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\HomeController;
use Modules\User\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index']);
Route::get('bg-store-prd/{product:slug}', [HomeController::class, 'showProduct']);
