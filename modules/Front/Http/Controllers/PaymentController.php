<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Payment\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Order\Models\CartItem;
use Modules\Discount\Models\CouponDiscount;
use Modules\Payment\Models\OnlinePayment;
use Modules\Order\Models\Order;
use Modules\Order\Models\OrderItem;
use Modules\Payment\Models\Payment;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $order = Order::where('user_id', Auth::id())->where('status', 0)->first();

        return view('Front::payment.index', compact('cartItems', 'order'));
    }

    public function couponDiscount(Request $request)
    {
        $request->validate(
            ['coupon' => 'required']
        );

        $coupon = CouponDiscount::where([
            ['code', $request->coupon],
            ['status', 1],
            ['end_date', '>', now()],
            ['start_date', '<', now()]
        ])->first();


        if ($coupon != null) {
            if ($coupon->user_id != null) {
                $coupon = CouponDiscount::where([
                    ['code', $request->coupon],
                    ['status', 1],
                    ['end_date', '>', now()],
                    ['start_date', '<', now()],
                    ['user_id', Auth::id()]
                ])->first();
                if ($coupon == null) {
                    return redirect()->back()->withErrors(['error' => ['کد تخفیف اشتباه وارد شده است']]);
                }
            }

            $order = Order::where([
                ['user_id', Auth::id()],
                ['status', 0],
                ['coupon_id', null],
            ])->first();

            if ($order) {
                if ($coupon->price == null) {
                    $couponDiscountAmount = $order->final_amount * ($coupon->percentage / 100);
                    if ($couponDiscountAmount > $coupon->discount_ceiling) {
                        $couponDiscountAmount = $coupon->discount_ceiling;
                    }
                } else {
                    $couponDiscountAmount = $coupon->percentage;
                }

                $order->final_amount = $order->final_amount - $couponDiscountAmount;

                $order->total_products_discount_amount += $couponDiscountAmount;
                $order->coupon_id = $coupon->id;
                $order->save();

                return redirect()->back()->with(['success' => 'کد تخفیف با موفقیت اعمال شد']);


            } else {

                return redirect()->back()->withErrors(['error' => ['کد تخفیف اشتباه وارد شده است']]);

            }
        } else {

            return redirect()->back()->withErrors(['error' => ['کد تخفیف منقضی شده یا اشتباه وارد شده است']]);

        }
    }

    public function paymentSubmit(Request $request, PaymentService $paymentService)
    {
        $request->validate(
            ['payment_type' => 'required']
        );

        $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->first();
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        $cash_receiver = null;

        switch ($request->payment_type) {
            case '1':
                $targetModel = OnlinePayment::class;
                $type = 0;
                break;
            case '2':
                $targetModel = OfflinePayment::class;
                $type = 1;
                break;
            case '3':
                $targetModel = CashPayment::class;
                $type = 2;
                $cash_receiver = $request->cash_receiver ? $request->cash_receiver : null;
                break;
            default:
                return redirect()->back()->withErrors(['error' => 'خطا']);
        }

        $paymented = $targetModel::create([
            'amount' => $order->order_final_amount,
            'user_id' => auth()->user()->id,
            'pay_date' => now(),
            'cash_receiver' => $cash_receiver,
            'status' => 1,
        ]);

        $payment = Payment::create(
            [
                'amount' => $order->order_final_amount,
                'user_id' => auth()->user()->id,
                'pay_date' => now(),
                'type' => $type,
                'paymentable_id' => $paymented->id,
                'paymentable_type' => $targetModel,
                'staus' => 1,
            ]
        );

        if ($request->payment_type == 1) {
            $paymentService->zarinpal($order->order_final_amount, $order, $paymented);
        }

        $order->update(
            ['order_status' => 3]
        );

        foreach ($cartItems as $cartItem) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product' => $cartItem->product,
                'amazing_sale_id' => $cartItem->product->activeAmazingSales()->id ?? null,
                'amazing_sale_object' => $cartItem->product->activeAmazingSales() ?? null,
                'amazing_sale_discount_amount' => empty($cartItem->product->activeAmazingSales()) ? 0 : $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100),
                'number' => $cartItem->number,
                'final_product_price' => empty($cartItem->product->activeAmazingSales()) ? $cartItem->cartItemProductPrice() : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100)),
                'final_total_price' => empty($cartItem->product->activeAmazingSales()) ? $cartItem->cartItemProductPrice() * ($cartItem->number) : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100)) * ($cartItem->number),
                'color_id' => $cartItem->color_id,
                'guarantee_id' => $cartItem->guarantee_id,
            ]);

            $cartItem->delete();
        }

        return redirect()->route('customer.home')->with('success', 'سفارش شما با موفقیت ثبت شد');

    }

    public function paymentCallback(Order $order, OnlinePayment $onlinePayment, PaymentService $paymentService)
    {
        $amount = $onlinePayment->amount * 10;
        $result = $paymentService->zarinpalVerify($amount, $onlinePayment);
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product' => $cartItem->product,
                'amazing_sale_id' => $cartItem->product->activeAmazingSales()->id ?? null,
                'amazing_sale_object' => $cartItem->product->activeAmazingSales() ?? null,
                'amazing_sale_discount_amount' => empty($cartItem->product->activeAmazingSales()) ? 0 : $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100),
                'number' => $cartItem->number,
                'final_product_price' => empty($cartItem->product->activeAmazingSales()) ? $cartItem->cartItemProductPrice() : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100)),
                'final_total_price' => empty($cartItem->product->activeAmazingSales()) ? $cartItem->cartItemProductPrice() * ($cartItem->number) : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100)) * ($cartItem->number),
                'color_id' => $cartItem->color_id,
                'guarantee_id' => $cartItem->guarantee_id,
            ]);

            $cartItem->delete();
        }
        if ($result['success']) {
            $order->update(
                ['order_status' => 3]
            );

            return redirect()->route('customer.home')->with('success', 'پرداخت شما با موفقیت انجام شد');
        } else {
            $order->update(
                ['order_status' => 2]
            );
            return redirect()->route('customer.home')->with('danger', 'سفارش شما با  خطا مواجه شد');
        }

    }
}
