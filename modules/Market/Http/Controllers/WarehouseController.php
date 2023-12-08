<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WarehouseController extends Controller
{

    public function index()
    {
        $products = Product::orderBy("created_at", "desc")->simplePaginate(15);
        return view('admin.market.store.index', compact("products"));
    }


    public function add(Product $product)
    {
        return view('admin.market.store.increase-inventory', compact('product'));
    }


    public function adding(Request $request, Product $product)
    {
        $product->marketable_number += $request->marketable_number;

        if ($product->save()) {
            Log::info("Receiver => {$request->receiver}, Deliver => {$request->deliver}, Description => {$request->description}, Add => {$request->marketable_number}");
        }

        $message = "موجودی جدید به تعداد " .
            "{$request->marketable_number}" .
            " به " .
            "{$product->name}" .
            "اضافه شد!";

        return redirect()->route('admin.market.store.index')->with([
            'success_msg' => $message
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
