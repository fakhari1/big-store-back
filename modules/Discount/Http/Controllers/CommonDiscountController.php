<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Common\Utils\Responder;
use Modules\Discount\Models\CommonDiscount;
use Illuminate\Validation\Rule;

class CommonDiscountController extends Controller
{
    public function index()
    {
        $commonDiscounts = CommonDiscount::all();
        return Responder::response([
            'commons' => $commonDiscounts
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'discount_ceiling' => 'nullable|integer|gt:minimal_order_amount',
            'minimal_order_amount' => 'nullable|integer',
            'status' => 'integer',
            'percentage' => 'nullable|numeric|max:100',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $commonDiscount = CommonDiscount::create($request->all());
        return Responder::response([
            'message' => ' تخفیف عمومی با موفقیت ایجاد شد'
        ], 201);
    }

    public function show(CommonDiscount $commonDiscount)
    {
        return Responder::response([
            'common' => $commonDiscount
        ]);
    }

    public function update(Request $request, CommonDiscount $commonDiscount)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string',
            'discount_ceiling' => [
                'nullable',
                'integer',
                Rule::requiredIf(function () use ($request) {
                    return !empty($request->minimal_order_amount);
                }),
                'gt:minimal_order_amount'
            ],
            'minimal_order_amount' => 'nullable|integer',
            'status' => 'integer',
            'percentage' => 'nullable|numeric|max:100',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $commonDiscount->update($request->all());
        return Responder::response([
            'message' => ' تخفیف عمومی با موفقیت ویرایش شد'
        ], 200);
    }

    public function destroy(CommonDiscount $commonDiscount)
    {
        $commonDiscount->delete();
        return Responder::response([
            'message' => ' تخفیف عمومی با موفقیت حذف شد'
        ], 200);
    }

    public function updateStatus(Request $request, CommonDiscount $commonDiscount)
    {
        try {
            $commonDiscount->update([
                'status' => $request->status
            ]);

            return \App\Utils\Responder::response([
                'status' => true,
                'data' => ['status' => $commonDiscount->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }
}
