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
            'delivery_time' => 'nullable',
            'delivery_time_unit' => 'nullable',
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




    public function updateStatus(Request $request, DeliveryMethod $deliveryMethod)
    {
        try {
            $deliveryMethod->update([
                'status' => $request->status
            ]);

            return \App\Utils\Responder::response([
                'status' => true,
                'data' => ['status' => $deliveryMethod->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }
}
