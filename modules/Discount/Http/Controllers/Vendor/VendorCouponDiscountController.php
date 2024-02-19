<?php

namespace Modules\Discount\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Common\Utils\Responder;
use Modules\Discount\Models\CouponDiscount;

use Modules\Discount\Models\Discount;

class VendorCouponDiscountController extends Controller
{
    public function index()
    {
        $couponDiscounts = CouponDiscount::where('user_id', '2')->get();

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
        $validatedData = $request->validate([
            'code' => 'required|string',
            'price' => 'nullable|numeric',
            'percentage' => 'nullable|numeric|max:100',
            'discount_ceiling' => 'nullable|numeric',
            'is_private' => 'required',
            'status' => 'integer',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $validatedData['user_id'] = 2;

        $couponDiscount = CouponDiscount::create($validatedData);

        $discount = $couponDiscount->discounts()->create([
            'percentage' => $couponDiscount->percentage,
            'user_id' => 2,
            'status' => $couponDiscount->status,
            'start_date' => $couponDiscount->start_date,
            'end_date' => $couponDiscount->end_date,
        ]);

        return Responder::response([
            'message' => 'اطلاعات با موفقیت ثبت شد',
        ], 201);
    }

    public function update(Request $request, CouponDiscount $couponDiscount)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'price' => 'nullable',
            'percentage' => 'required',
            'discount_ceiling' => 'required',
            'is_private' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $couponDiscount->update($validatedData);
        $couponDiscount->discounts()->update([
            'percentage' => $validatedData['percentage'],
            'status' => $validatedData['status'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ]);

        return Responder::response([
            'message' => 'اطلاعات با موفقیت بروزرسانی شد',
        ]);
    }

    public function destroy(CouponDiscount $couponDiscount)
    {
        $couponDiscount->discounts()->delete();
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
