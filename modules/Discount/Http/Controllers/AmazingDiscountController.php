<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Illuminate\Support\Facades\Validator;
use Modules\Discount\Models\AmazingDiscount;

class AmazingDiscountController extends Controller
{
    public function index()
    {
        $amazingDiscounts = AmazingDiscount::all();
        return Responder::response([
            'amazings' => $amazingDiscounts->load('product')
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'status' => 'integer',
            'percentage' => 'nullable|numeric|max:100',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        AmazingDiscount::create($request->all());
        return Responder::response([
            'message' => 'تخفیف شگفت انگیز با موفقیت ایجاد شد'
        ], 201);
    }

    public function show(AmazingDiscount $amazingDiscount)
    {
        return Responder::response([
            'amazing' => $amazingDiscount->load('product')
        ]);
    }

    public function update(Request $request, AmazingDiscount $amazingDiscount)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'exists:products,id',
            'status' => 'integer',
            'percentage' => 'nullable|numeric|max:100',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $amazingDiscount->update($request->all());
        return Responder::response([
            'message' => 'تخفیف شگفت انگیز با موفقیت ویرایش شد'
        ], 200);
    }

    public function destroy(AmazingDiscount $amazingDiscount)
    {
        $amazingDiscount->delete();
        return Responder::response([
            'message' => 'تخفیف شگفت انگیز با موفقیت حذف شد'
        ], 200);
    }
}
