<?php

namespace Modules\User\Services\Sms;

use Illuminate\Support\Facades\Http;
use SoapClient;

class IpPanelSmsProvider
{
    public function sendSmsViaSoapClient($mobile, $text)
    {
        try {
            $client = new SoapClient(config('sms.wsdl_url'));
            $input_data = array("verification_code" => $text);

            $res = $client->sendPatternSms(
                config('sms.originator'),
                $mobile,
                config('sms.username'),
                config('sms.password'),
                config('sms.pattern_code'),
                $input_data
            );

            if (is_numeric($res)) {
                return true;
            } else {
                return false;
            }
        } catch (\SoapFault $e) {
            return "{$e->getCode()} {$e->getMessage()}";
        }
    }

    public function sendSmsViaHttp($api_key, $from, array $to, $text, $is_flash = true)
    {
        $api_key = $api_key ?? config()->get('sms.api_key');

        foreach ($to as $key => $item) {

            Http::get('http://ippanel.com:8080/', [
                "apikey" => $api_key,
                "pid" => "7g66",
                "fnum" => "+983000505",
                "tnum" => $to,
                "p1" => "code",
                "v1" => $text,
            ]);

        }

        $res = array("message" => "sms sent", "status" => "success");
        return response()->json($res);
    }

    function test()
    {
        $otp = Otp::create([
            'user_id' => '$user->id',
            'mobile' => '$mobile',
            'verification_code' => '$verificationCode',
            'expired_at' => Carbon::now()->addMinutes(2)->addSeconds(2)->format('Y-m-d H:i:s'),
            'token' => '$token'
        ]);

        $client = new SoapClient(config('sms.wsdl_url'));
        $input_data = array("verification_code" => '$verificationCode');

        $res = $client->sendPatternSms(
            config('sms.originator'),
            '$mobile',
            config('sms.username'),
            config('sms.password'),
            config('sms.pattern_code'),
            $input_data
        );

        if (is_numeric($res)) {
            return redirect()->route('otps.get', ['token' => '$token']);
        }

        return redirect()->back()->with('error_msg', 'اشکال در ارسال پیامک با پشتیبانی تماس بگیرید!');
    }

}
