<?php

namespace Modules\Payment\Services;

use App\Models\Market\OnlinePayment;
use Illuminate\Support\Facades\Redirect;
use Request;
use Zarinpal\Zarinpal;
use Zarinpal\Clients\GuzzleClient;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Client\RequestException;

class PaymentService
{


    public function gateway($amount, $order, $onlinePayment)
    {
        $data = [
            'pin' => 'sandbox',
            'amount' => $amount,
            'callback' => route('users.payments.verify', ['order' => $order, 'online_payment' => $onlinePayment]),
            'invoice_id' => $order->id,
            'description' => 'Description'
        ];

        $data = json_encode($data);
        $ch = curl_init('https://panel.aqayepardakht.ir/api/v2/create');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        if ($result->status == "success") {
            $onlinePayment->update(['transaction_id' => $result->transid, 'bank_first_response' => $result->status]);

            return redirect()->to('https://panel.aqayepardakht.ir/startpay/sandbox/' . $result->transid)->send();
        }

    }

    public function verify($amount, $onlinePayment)
    {
        $data = [
            'pin'    => 'sandbox',
            'amount'    => $amount,
            'transid' => $onlinePayment->transaction_id
        ];

        $data = json_encode($data);
        $ch = curl_init('https://panel.aqayepardakht.ir/api/v2/verify');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        if ($result->code == "1") {
            $onlinePayment->update(['bank_second_response' => 'success']);
            return true;
        } else {
            $onlinePayment->update(['bank_second_response' => 'error']);
            return false;
        }
    }


}


