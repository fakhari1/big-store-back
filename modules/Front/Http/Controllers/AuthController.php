<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Market\Models\Product;

class AuthController extends Controller
{
    public function showOtpForm()
    {
        return view('Front::login');
    }
}
