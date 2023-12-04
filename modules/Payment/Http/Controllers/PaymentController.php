<?php

namespace Modules\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\OfflinePayment;
use App\Models\Admin\Market\OnlinePayment;
use App\Models\Admin\Market\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::all();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function show(Payment $payment)
    {
        return view('admin.market.payment.show', compact('payment'));
    }
    public function getOfflinePayments()
    {
        $payments = Payment::where('paymentable_type', OfflinePayment::class)->get();
        return view('admin.market.payment.offline', compact('payments'));
    }
    public function getOnlinePayments()
    {
        $payments = Payment::where('paymentable_type', OfflinePayment::class)->get();
        return view('admin.market.payment.offline', compact('payments'));
    }

    public function getOnDeliveredPayments()
    {
        $payments = Payment::where('paymentable_type', OfflinePayment::class)->get();
        return view('admin.market.payment.offline', compact('payments'));
    }

    public function update(Payment $payment, PaymentRequest $request)
    {
        $payment->status = $request->status;

        if ($payment->save()) {
            return redirect()->back()->with(['success_msg' => 'پرداخت مورد نظر لغو شد!']);
        }
    }


}
