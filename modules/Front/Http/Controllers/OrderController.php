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
use Modules\User\Models\User;

class OrderController extends Controller
{
    public function __construct()
    {
        Auth::login(User::findOrFail(5));
    }
    public function chooseAddressAndDelivery(Request $request)
    {
        $inputs = [
            'vendor_id' => $request->vendor_id,
            'user_id' => Auth::id(),
            'address_id' => $request->address_id,
            'delivery_id' => $request->delivery_id,
        ];

        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $totalProductPrice = 0;
        $totalDiscount = 0;
        $totalFinalPrice = 0;
        $totalFinalDiscountPriceWithNumbers = 0;

        foreach ($cartItems as $key => $item) {
//            $totalProductPrice += $item->cartItemProductPrice();
//            $totalDiscount += $item->cartItemProductDiscount();
            $totalFinalPrice += $item->cartItemFinalPrice();
            $totalFinalDiscountPriceWithNumbers += $item->cartItemFinalDiscount();
        }




        $inputs['final_amount'] = $totalFinalPrice;
        $inputs['total_discounts_amount'] = $totalFinalDiscountPriceWithNumbers;
        $inputs['total_products_discount_amount'] = $totalFinalDiscountPriceWithNumbers;

        Order::updateOrCreate([
            'user_id' => Auth::id(),
            'status' => 0
        ],$inputs);

        return redirect()->route('users.payments.show');
    }

}
