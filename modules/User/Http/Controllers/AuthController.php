<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\User\Http\Requests\AuthenticateRequest;
use Modules\User\Models\Otp;
use Modules\User\Models\User;

class AuthController extends Controller
{
    public function showOtpForm()
    {
        return view('Front::login');
    }

    public function authenticate(AuthenticateRequest $request)
    {
        $mobile = $request->mobile;
        $user = null;
        if (preg_match('/^(\+98|98|0)9\d{9}$', $mobile)) {

            $mobile = ltrim($mobile, '0');
            $mobile = substr($mobile, 0, 2) === '98' ? substr($mobile, 2) : $mobile;
            $mobile = str_replace('+98', '', $mobile);


        }

        $user = User::whereMobile('mobile')->first();

        if (empty($user)) {
            $newUser = [
                'activated' => 1,
                'activated_at' => Carbon::now(),
            ];

            $user = User::create($newUser);
        }

        // create otp code

        $code = rand(111111, 999999);
        $token = Str::random(60);

        $otp_inputs = [
            'token' => $token,
            'otp_code' => $code,
            'user_id' => $user->id,
        ];

        Otp::create($otp_inputs);
    }
}
