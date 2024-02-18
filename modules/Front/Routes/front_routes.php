<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\FrontController;


Route::resource('products', FrontController::class);

