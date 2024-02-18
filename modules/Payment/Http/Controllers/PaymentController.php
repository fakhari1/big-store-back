<?php

namespace Modules\Payment\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Market\Models\DeliveryMethod;
use Modules\Payment\Models\OfflinePayment;
use Modules\Payment\Models\CashPayment;
use Modules\Payment\Models\OnlinePayment;
use Modules\Payment\Models\Payment;

class PaymentController extends Controller
{
    public function show(Payment $payment)
    {
        return Responder::response([
            'payment' => $payment->load(['user', 'vendor', 'paymentable']),
        ]);
    }

    public function getOfflinePayments()
    {
        $payments = OfflinePayment::with(['user', 'vendor'])->get();

        return Responder::response([
            'payments' => $payments
        ]);
    }

    public function getOnlinePayments()
    {
        $payments = OnlinePayment::with(['user', 'vendor'])->get();

        return Responder::response([
            'payments' => $payments
        ]);
    }

    public function getCashPayments()
    {
        $payments = CashPayment::with(['user', 'vendor'])->get();

        return Responder::response([
            'payments' => $payments
        ]);
    }

    public function updateStatus(OnlinePayment $payment)
    {
        $payment->update(['status' => 2]);
        Payment::where('paymentable_id', $payment->id)->update(['status' => 2]);

        return Responder::response([
            'payment' => $payment
        ]);
    }
}
