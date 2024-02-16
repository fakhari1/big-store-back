<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Discount\Models\CouponDiscount;
use Illuminate\Support\Facades\Validator;

class CouponDiscountController extends Controller
{
    public function index()
    {
        $couponDiscounts = CouponDiscount::all();
        return Responder::response([
            'coupons' => $couponDiscounts
        ]);
    }

    public function show(CouponDiscount $couponDiscount)
    {
        return Responder::response([
            'coupon' => $couponDiscount
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'price' => 'nullable|numeric',
            'percentage' => 'nullable|numeric|max:100',
            'discount_ceiling' => 'nullable|numeric',
            'is_private' => 'boolean',
            'status' => 'integer',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'user_id' => 'nullable|exists:users,id',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $couponDiscount = CouponDiscount::create($request->all());
        return Responder::response([
            'message' => 'کوپن با موفقیت ایجاد شد',
            'coupon' => $couponDiscount,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'string',
            'price' => 'nullable|numeric',
            'percentage' => 'nullable|numeric|max:100',
            'discount_ceiling' => 'nullable|numeric',
            'is_private' => 'boolean',
            'status' => 'integer',
            'start_date' => 'date|before_or_equal:end_date',
            'end_date' => 'date|after_or_equal:start_date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $couponDiscount = CouponDiscount::findOrFail($id);
        $couponDiscount->update($request->all());
        return Responder::response([
            'message' => 'کوپن با موفقیت ویرایش شد',
            'coupon' => $couponDiscount,
        ], 200);
    }

    public function destroy($id)
    {
        $couponDiscount = CouponDiscount::findOrFail($id);
        $couponDiscount->delete();
        return Responder::response([
            'message' => 'کوپن با موفقیت حذف شد',
        ], 200);
    }
}
