<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Discount\Models\CouponDiscount;
use Illuminate\Support\Facades\Validator;
use Modules\Discount\Models\Discount;

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
            'is_private' => 'required',
            'status' => 'integer',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        CouponDiscount::create($validator);
        Discount::create($validator);


        return Responder::response([
            'message' => 'اطلاعات با موفقیت ثبت شد',
        ], 201);
    }

    public function update(Request $request, CouponDiscount $couponDiscount)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'price' => 'nullable',
            'percentage' => 'required',
            'discount_ceiling' => 'required',
            'is_private' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'nullable',
        ]);

        $couponDiscount->update($validator->attributes());
        $couponDiscount->discounts()->update($validator->attributes());
        return Responder::response([
            'message' => 'اطلاعات با موفقیت بروزرسانی شد',
        ]);
    }

    public function destroy(CouponDiscount $couponDiscount)
    {
        $couponDiscount->delete();
        return Responder::response([
            'message' => 'کوپن با موفقیت حذف شد',
        ], 200);
    }

    public function updateStatus(Request $request, CouponDiscount $couponDiscount)
    {
        try {
            $couponDiscount->update([
                'status' => $request->status
            ]);

            return \App\Utils\Responder::response([
                'status' => true,
                'data' => ['status' => $couponDiscount->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }
}
