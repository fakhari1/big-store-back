<?php

namespace Modules\Vendor\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Utils\Responder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Vendor\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return Responder::response([
            'vendors' => $vendors
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:' . implode(',', Vendor::$types),
            'juridical_name' => 'nullable|string',
            'juridical_type' => 'nullable|in:' . implode(',', Vendor::$juridical_types),
            'economic_code' => 'nullable|unique:vendors|string',
            'national_code' => 'required|unique:vendors|string',
            'card_number' => 'nullable|unique:vendors|string|size:16',
            'shaba_number' => 'nullable|unique:vendors|string|size:24',
            'phone' => 'nullable|unique:vendors|string',
            'mobile' => 'nullable|unique:vendors|string|size:10',
            'mobile_verified_at' => 'nullable|date',
            'shop_name' => 'nullable|string',
            'address_id' => 'nullable|exists:addresses,id',
            'avatar_id' => 'nullable|exists:avatars,id',
            'status' => 'nullable|integer|in:0,1',
            'signatory' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        Vendor::create($request->all());

        return Responder::response([
            'message' => 'فروشنده ثبت شد!'
        ], 201);
    }

    public function show(Vendor $vendor)
    {
        return response()->json(['data' => $vendor]);
    }

    public function update(Request $request, Vendor $vendor)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:' . implode(',', Vendor::$types),
            'juridical_name' => 'nullable|string',
            'juridical_type' => 'nullable|in:' . implode(',', Vendor::$juridical_types),
            'economic_code' => 'nullable|unique:vendors,economic_code,' . $vendor->id . '|string',
            'national_code' => 'required|unique:vendors,national_code,' . $vendor->id . '|string',
            'card_number' => 'nullable|unique:vendors,card_number,' . $vendor->id . '|string|size:16',
            'shaba_number' => 'nullable|unique:vendors,shaba_number,' . $vendor->id . '|string|size:24',
            'phone' => 'nullable|unique:vendors,phone,' . $vendor->id . '|string',
            'mobile' => 'nullable|unique:vendors,mobile,' . $vendor->id . '|string|size:10',
            'mobile_verified_at' => 'nullable|date',
            'shop_name' => 'nullable|string',
            'address_id' => 'nullable|exists:addresses,id',
            'avatar_id' => 'nullable|exists:avatars,id',
            'status' => 'nullable|integer|in:0,1',
            'signatory' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $vendor->update($request->all());

        return Responder::response([
            'message' => 'فروشنده ویرایش شد!'
        ], 200);
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return Responder::response([
            'message' => 'فروشنده حذف شد!'
        ], 200);
    }
}

