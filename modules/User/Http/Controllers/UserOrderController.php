<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\Common\Utils\Responder;
use Modules\Order\Models\Order;


class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'vendor',
            'user',
            'address',
            'payment',
            'payment.paymentable',
            'delivery_method',
            'coupon_discount',
            'common_discount'
        ])->where('user_id', "5")->get();

        return Responder::response([
            'orders' => $orders,
        ]);
    }


    public function show(Order $order)
    {
        return Responder::response([
            'order' => $order->load([
                'order_items',
                'order_items.amazing_discount',
                'order_items.product',
                'vendor',
                'user',
                'address',
                'payment',
                'delivery_method',
                'coupon_discount',
                'common_discount',
            ]),
        ]);
    }
}
