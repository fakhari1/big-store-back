<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\AmazingSale;
use App\Models\Admin\Market\Product;

class AmazingDiscountController extends Controller
{
    public function index()
    {
        $amazingSales = AmazingSale::all();
        return view("admin.market.discounts.amazing.index", compact('amazingSales'));
    }


    public function create()
    {
        $products = Product::all();
        return view('admin.market.discounts.amazing.create', compact('products'));
    }


    public function store(Request $request)
    {
        //
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
}
