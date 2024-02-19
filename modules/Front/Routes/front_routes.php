<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\HomeController;
use Modules\Front\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index']);
Route::get('bg-store-prd/{product:slug}', [HomeController::class, 'showProduct']);
Route::get('auth', [AuthController::class, 'showOtpForm'])->name('auth.otp.show-form');
