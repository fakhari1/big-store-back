<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showOtpForm()
    {
        return view('Front::login');
    }
}
