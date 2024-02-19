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
        $orders = Order::with([
            'vendor',
            'user',
            'address',
            'payment',
            'payment.paymentable',
            'delivery_method',
            'coupon_discount',
            'common_discount'
        ])->get();

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

    public function create()
    {
        $order = Order::all();

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
            'payment_id' => 'nullable|exists:payments,id',
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
            'vendor_id' => 'nullable|integer',
        ]);

        $order = Order::create($validatedData);

        $order->vendors()->attach(1);

        return Responder::response([
            'message' => 'سفارش ایجاد شد',
            'data' => $order,
        ], 201);
    }

    public function update(Request $request, Order $order)
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
            'vendor_id' => 'nullable|integer',
        ]);

        $order->update($validatedData);

        $order->vendors()->sync(2);

        return Responder::response([
            'message' => 'سفارش ویرایش شد',
            'data' => $order,
        ]);
    }

    public function updateStatus(Order $order)
    {
        $status = null;

        if ($order->status == 0) {
            $status = 1;
        }
        if ($order->status == 1) {
            $status = 2;
        }
        if ($order->status == 2) {
            $status = 0;
        }

        $order->update(['status' => $status]);

        return Responder::response([
            'status' => true,
            'data' => [
                'status' => $order->status
            ],
            'message' => 'اطلاعات با موفقیت بروزرسانی شد'
        ]);
    }

    public function updateSendingStatus(Order $order)
    {
        $delivery_status = null;

        if ($order->delivery_status == 0) {
            $delivery_status = 1;
        }
        if ($order->delivery_status == 1) {
            $delivery_status = 2;
        }
        if ($order->delivery_status == 2) {
            $delivery_status = 3;
        }
        if ($order->delivery_status == 3) {
            $delivery_status = 0;
        }

        $order->update(['delivery_status' => $delivery_status]);

        return Responder::response([
            'status' => true,
            'data' => [
                'delivery_status' => $order->delivery_status
            ],
            'message' => 'اطلاعات با موفقیت بروزرسانی شد'
        ]);
    }

    public function destroy(Order $order)
    {
        $order->vendors()->detach();

        $order->delete();

        return response()->json([
            'message' => 'سفارش حذف شد',
        ]);
    }

    public function sendingOrders()
    {
        $orders = Order::whereHas('delivery_method', function ($query) {
            return $query->where('status', '=', 2);
        })->get();

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
