<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Utils\Responder;
use Modules\Payment\Models\OnlinePayment;
use Modules\Payment\Models\Payment;

class UserPaymentController extends Controller
{
    public function show(Payment $payment)
    {
        if($payment->vendor_id == "2"){
            return Responder::response([
                'payment' => $payment->load(['user', 'vendor', 'paymentable']),
            ]);
        }
    }

    public function getOnlinePayments()
    {
        $payments = OnlinePayment::with(['user', 'vendor'])->where('user_id', "5")->get();

        return Responder::response([
            'payments' => $payments
        ]);
    }
}
