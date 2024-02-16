<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Common\Utils\Responder;
use Modules\Market\Models\DeliveryMethod;


class DeliveryMethodController extends Controller
{
    public function index()
    {
        $deliveryMethods = DeliveryMethod::all();
        return Responder::response([
            'deliveries' => $deliveryMethods
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'amount' => 'nullable|numeric',
            'delivery_time' => 'nullable|integer',
            'delivery_time_unit' => 'nullable|string',
            'status' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DeliveryMethod::create($request->all());
        return Responder::response([
            'message' => 'روش های ارسال با موفقیت ایجاد شد'
        ], 201);
    }

    public function show(DeliveryMethod $deliveryMethod)
    {
        return Responder::response([
            'delivery' => $deliveryMethod
        ]);
    }

    public function update(Request $request, DeliveryMethod $deliveryMethod)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'amount' => 'nullable|numeric',
            'delivery_time' => 'nullable|integer',
            'delivery_time_unit' => 'nullable|string',
            'status' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $deliveryMethod->update($request->all());
        return Responder::response([
            'message' => 'روش های ارسال با موفقیت ویرایش شد'
        ], 200);
    }

    public function destroy(DeliveryMethod $deliveryMethod)
    {
        $deliveryMethod->delete();
        return Responder::response([
            'message' => 'روش های ارسال با موفقیت حذف شد'
        ], 200);
    }


    public function status(DeliveryMethod $delivery)
    {
        $delivery->status = $delivery->status == 1 ? 0 : 1;
        if ($delivery->update()) {
            if ($delivery->status == 1) {
                return response()->json([
                    'status' => true,
                    'checked' => true
                ]);
            }
            return response()->json([
                'status' => true,
                'checked' => false
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }
}
