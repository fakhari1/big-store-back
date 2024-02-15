<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\Common\Utils\Responder;
use Modules\Order\Models\Order;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return Responder::response([
            'orders' => $orders,
        ]);
    }

    public function create()
    {
        $order = Order::all();

        return Responder::response([
            'order' => $order,
        ]);
    }

    public function edit(Order $order)
    {
        return Responder::response([
            'order' => $order,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address_id' => 'nullable|exists:addresses,id',
            'sent_address' => 'nullable|string',
//            'payment_id' => 'nullable|exists:payments,id',
            'payment_id' => 'nullable',

            'payment_object' => 'nullable|string',
            'payment_type' => 'required|numeric',
            'payment_status' => 'required|numeric',
            'delivery_id' => 'nullable|exists:delivery_methods,id',
            'delivery_object' => 'nullable|string',
            'delivery_amount' => 'nullable|numeric',
            'delivery_status' => 'required|numeric',
            'delivery_date' => 'nullable|date',
            'final_amount' => 'nullable|numeric',
            'discount_amount' => 'nullable|numeric',
            'coupon_id' => 'nullable|exists:coupon_discounts,id',
            'coupon_object' => 'nullable|string',
            'coupon_discount_amount' => 'nullable|numeric',
            'common_discount_id' => 'nullable|exists:common_discounts,id',
            'common_discount_object' => 'nullable|string',
            'common_discount_amount' => 'nullable|numeric',
            'total_products_discount_amount' => 'nullable|numeric',
            'status' => 'required|numeric',
        ]);

        $order = Order::create($validatedData);

        return Responder::response([
            'message' => 'سفارش ایجاد شد',
            'data' => $order,
        ], 201);
    }

    public function update(Request $request,Order $order)
    {

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address_id' => 'nullable|exists:addresses,id',
            'sent_address' => 'nullable|string',
//            'payment_id' => 'nullable|exists:payments,id',
            'payment_id' => 'nullable',
            'payment_object' => 'nullable|string',
            'payment_type' => 'required|numeric',
            'payment_status' => 'required|numeric',
            'delivery_id' => 'nullable|exists:delivery_methods,id',
            'delivery_object' => 'nullable|string',
            'delivery_amount' => 'nullable|numeric',
            'delivery_status' => 'required|numeric',
            'delivery_date' => 'nullable|date',
            'final_amount' => 'nullable|numeric',
            'discount_amount' => 'nullable|numeric',
            'coupon_id' => 'nullable|exists:coupon_discounts,id',
            'coupon_object' => 'nullable|string',
            'coupon_discount_amount' => 'nullable|numeric',
            'common_discount_id' => 'nullable|exists:common_discounts,id',
            'common_discount_object' => 'nullable|string',
            'common_discount_amount' => 'nullable|numeric',
            'total_products_discount_amount' => 'nullable|numeric',
            'status' => 'required|numeric',
        ]);

        $order->update($validatedData);

        return Responder::response([
            'message' => 'سفارش ویرایش شد',
            'data' => $order,
        ]);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'message' => 'سفارش حذف شد',
        ]);
    }

    public function sendingOrders()
    {
        $orders = Order::where('delivery_status', '1')->get();
        return Responder::response([
            'orders' => $orders,
        ]);
    }

    public function returnedOrders()
    {
        $orders = Order::where('delivery_status', '3')->get();
        return Responder::response([
            'orders' => $orders,
        ]);
    }

    public function canceledOrders()
    {
        $orders = Order::where('delivery_status', '0')->get();
        return Responder::response([
            'orders' => $orders,
        ]);
    }

    public function unpaidOrders()
    {
        $orders = Order::where('payment_status', false)->get();
        return Responder::response([
            'orders' => $orders,
        ]);
    }



//    public function getOrdersByDeliveryStatus($deliveryStatus)
//    {
//
//        $order = $this->getDeliveryTextStatusAttribute($deliveryStatus);
//        $orders = Order::where('delivery_status', $order)->get();
//
//        return Responder::response([
//            'data' => $orders,
//        ]);
//    }
//
//    public function getDeliveryTextStatusAttribute($status)
//    {
//        if ($status == 'failure')
//            return '0';
//        else if ($status == 'sending')
//            return  '1';
//        else if ($status == 'sent')
//            return '2';
//        else
//            return '3';
//    }
}
