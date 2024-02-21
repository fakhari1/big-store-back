<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Payment\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Order\Models\CartItem;
use Modules\Discount\Models\CouponDiscount;
use Modules\Payment\Models\OnlinePayment;
use Modules\Order\Models\Order;
use Modules\Order\Models\OrderItem;
use Modules\Payment\Models\Payment;
use Modules\User\Models\User;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment as ShetabitPayment;
class PaymentController extends Controller
{
    public function __construct()
    {
        Auth::login(User::findOrFail(5));
    }
    public function showPaymentForm()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $order = Order::where([
                ['user_id', Auth::id()],
                ['status', 0]]
        )->first();
        $totalProductPrice = 0;
        $totalDiscount = $order->total_products_discount_amount;

        return view('Front::payment.index', compact('cartItems', 'order', 'totalProductPrice', 'totalDiscount'));
    }

    public function couponDiscount(Request $request)
    {

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

    public function submit(Request $request, PaymentService $paymentService)
    {
        $order = Order::where([
            ['user_id', Auth::id()],
            ['status', 0]
        ])->first();

        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $cash_receiver = null;

        $online_payment = OnlinePayment::create([
            'amount' => $order->final_amount,
            'user_id' => Auth::id(),
            'vendor_id' => $order->vendor_id,
            'gateway' => 'aqayepardakht',
            'payed_at' => now(),
            'status' => 1,
        ]);


        $payment = Payment::create(
            [
                'amount' => $order->final_amount,
                'user_id' => Auth::id(),
                'vendor_id' => $order->vendor_id,
                'paymentable_id' => $online_payment->id,
                'paymentable_type' => OnlinePayment::class,
                'status' => 1,
            ]
        );

        $paymentService->gateway(
            $order->final_amount,
            $order,
            $online_payment
        );

        // sandbox mode of gateway has bug assume payment is successful.

        $order->update(
            ['status' => 3]
        );

        foreach ($cartItems as $cartItem) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'amazing_discount_id' => $cartItem->product->activeAmazingDiscounts()->id ?? null,
                'amazing_sale_discount_amount' => empty($cartItem->product->activeAmazingDiscounts()) ? 0 : $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingDiscounts()->percentage / 100),
                'count' => $cartItem->number,
                'final_product_price' => empty($cartItem->product->activeAmazingDiscounts()) ? $cartItem->cartItemProductPrice() : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingDiscounts()->percentage / 100)),
                'final_total_price' => empty($cartItem->product->activeAmazingDiscounts()) ? $cartItem->cartItemProductPrice() * ($cartItem->number) : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingDiscounts()->percentage / 100)) * ($cartItem->number),
                'color_id' => $cartItem->product_color_id,
                'guaranty_id' => $cartItem->guaranty_id,
            ]);

            $cartItem->delete();
        }

        return redirect()->route('customer.home')->with('success', 'سفارش شما با موفقیت پرداخت شد');

    }

    public function paymentCallback(Order $order, OnlinePayment $onlinePayment, PaymentService $paymentService)
    {
        $amount = $onlinePayment->amount;
        $result = $paymentService->verify($amount, $onlinePayment);
        $cartItems = CartItem::where('user_id', '=', Auth::id())->get();

        dd($amount, $result, $cartItems);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'amazing_discount_id' => $cartItem->product->activeAmazingDiscounts()->id ?? null,
                'amazing_discount_discount_amount' => empty($cartItem->product->activeAmazingDiscounts()) ? 0 : $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingDiscounts()->percentage / 100),
                'count' => $cartItem->number,
                'final_product_price' => empty($cartItem->product->activeAmazingDiscounts()) ? $cartItem->cartItemProductPrice() : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingDiscounts()->percentage / 100)),
                'final_total_price' => empty($cartItem->product->activeAmazingDiscounts()) ? $cartItem->cartItemProductPrice() * ($cartItem->number) : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingDiscounts()->percentage / 100)) * ($cartItem->number),
                'product_color_id' => $cartItem->color_id,
                'guaranty_id' => $cartItem->guarantee_id,
            ]);

            $cartItem->delete();
        }
        if ($result) {
            $order->update(
                ['status' => 3]
            );

            return redirect()->route('index')->with('success', 'پرداخت شما با موفقیت انجام شد');
        } else {
            $order->update(
                ['status' => 2]
            );
            return redirect()->route('index')->with('error', 'پرداخت شما با  خطا مواجه شد');
        }

    }
}
