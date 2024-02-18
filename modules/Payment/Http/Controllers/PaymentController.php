<?php

namespace Modules\Payment\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Market\Models\DeliveryMethod;
use Modules\Payment\Models\OfflinePayment;
use Modules\Payment\Models\OnDeliveredPayment;
use Modules\Payment\Models\OnlinePayment;
use Modules\Payment\Models\Payment;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::with('user')->get();
        return Responder::response([
            'payments' => $payments
        ], 200);
//        return view('admin.market.payment.index', compact('payments'));
    }

    public function show(Payment $payment)
    {
        return view('admin.market.payment.show', compact('payment'));
    }
    public function getOfflinePayments()
    {
        $payments = OfflinePayment::all();

        return Responder::response([
            'payments' => $payments
        ], 200);
    }
    public function getOnlinePayments()
    {
        $payments = OnlinePayment::all();

        return Responder::response([
            'payments' => $payments
        ], 200);
    }

    public function getOnDeliveredPayments()
    {
        $payments = OnDeliveredPayment::all();

        return Responder::response([
            'payments' => $payments
        ], 200);
//        $payments = Payment::where('paymentable_type', OfflinePayment::class)->get();
//        return view('admin.market.payment.offline', compact('payments'));
    }

    public function update(Payment $payment, Request $request)
    {
        $payment->status = $request->status;

        if ($payment->save()) {
            return redirect()->back()->with(['success_msg' => 'پرداخت مورد نظر لغو شد!']);
        }
    }

    public function updateStatus(Request $request, Payment $payment)
    {
        try {
            $payment->update([
                'status' => $request->status
            ]);

            return \App\Utils\Responder::response([
                'status' => true,
                'data' => ['status' => $payment->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }


}
