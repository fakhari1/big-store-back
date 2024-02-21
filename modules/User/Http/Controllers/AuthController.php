<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Common\Utils\Responder;
use Modules\User\Http\Requests\AuthenticateRequest;
use Modules\User\Models\Otp;
use Modules\User\Models\User;
use Modules\User\Services\MessageService;
use Modules\User\Services\Sms\SimpleSmsGenerator;

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
        if (preg_match('/^(\+98|98|0)9\d{9}$/', $mobile)) {

            $mobile = ltrim($mobile, '0');
            $mobile = substr($mobile, 0, 2) === '98' ? substr($mobile, 2) : $mobile;
            $mobile = str_replace('+98', '', $mobile);


        }

        $user = User::where('mobile', '=', $mobile)->first();

        if (empty($user)) {
            $newUser = [
                'mobile' => $mobile,
                'activated' => 1,
                'activated_at' => Carbon::now(),
            ];

            $user = User::create($newUser);
        }

        // create otp code

        $code = rand(111111, 999999);
        $token = Str::random(60);

        $otp_inputs = [
            'login_identity' => $mobile,
            'token' => $token,
            'otp_code' => $code,
            'user_id' => $user->id,
        ];

        Otp::create($otp_inputs);

        // send sms
//        $sms_generator = new SimpleSmsGenerator();
//        $sms_generator->setTo($user->mobile)->setText($code)->send();
//
//        $msgService = new MessageService($sms_generator);
//
//        $msgService->send();

        return redirect()->route('auth.otp.show-confirmation-form', $token);
    }

    public function showConfirmationCodeForm($token)
    {
        $otp = Otp::where('token', '=', $token)->first();

        if (empty($otp)) {
            return route('auth.otp.show-form');
        }

        return view('Front::confirmation', compact('token', 'otp'));
    }

    public function confirmationCode(Request $request)
    {
        $otp = Otp::where('token', '=', $request->token)
            ->where('otp_code', '=', $request->code)
            ->where('used', '=', 0)
            ->where('created_at', '>=', Carbon::now()->subMinutes(2)->toDateTimeString())
            ->first();

        if (is_null($otp)) {
            return redirect()->route('auth.otp.show-form')->with(['error' => 'کد مورد نظر اشتباه یا منقضی شده است؛ دوباره تلاش کنید.']);
        }

        $otp->update(['used' => 1]);

        $user = $otp->user()->first();

        if (empty($user->mobile_verified_at)) {
            $user->update([
                'mobile_verified_at' => Carbon::now()->toDateTimeString(),
                'activated' => 1,
                'activated_at' => Carbon::now()->toDateTimeString()
            ]);
        }

//        $auth_token = $user->createToken($user->mobile)->plainTextToken;

        Auth::login($user);

//        if ($request->wantsJson()) {
//            return Responder::response([
//                'token' => $auth_token
//            ]);
//        }

        return redirect()->route('index');
    }

    public function getAuthUser()
    {
        return Auth::user();
    }

    public function logout()
    {
        Auth::logout();

        return route('index');
    }
}
