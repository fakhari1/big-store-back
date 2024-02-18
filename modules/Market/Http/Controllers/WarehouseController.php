<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Common\Utils\Responder;
use Modules\Market\Models\Product;

class WarehouseController extends Controller
{

    public function index()
    {

    }
    public function increment(Request $request, Product $product)
    {
        $product->marketable_number += $request->marketable_number;

        if ($product->save()) {
            Log::info("Receiver => {$request->receiver}, Deliver => {$request->deliver}, Description => {$request->description}, Add => {$request->marketable_number}");
        }

        return Responder::response([
            'message' => 'اطلاعات با موفقیت ثبت شد'
        ]);
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

    }
}
