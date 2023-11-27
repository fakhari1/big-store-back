<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Market\Models\DeliveryMethod;

class DeliveryMethodController extends Controller
{
    public function index()
    {
        $deliveryMethods = Delivery::all();
        return view("admin.market.delivery.index", compact("deliveryMethods"));
    }


    public function create()
    {
        return view("admin.market.delivery.create");
    }


    public function store(Request $request)
    {
        $inputs = [
            "name" => $request->name,
            "amount" => $request->cost,
            "delivery_time" => $request->time,
            "delivery_time_unit" => $request->unit,
            "status" => $request->status
        ];

        Delivery::create($inputs);

        return redirect()->route('admin.market.delivery.index')->with(['success_msg' => "روش ارسال ثبت شد!"]);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function status(Delivery $delivery)
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
