<?php

namespace Modules\Market\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Market\Models\Product;
use Modules\Market\Models\ProductProperty;

class ProductPropertyController extends Controller
{
    public function index()
    {
        $properties = ProductProperty::all();
        return Responder::response([
            'properties' => $properties
        ]);
    }

    public function create()
    {
        $products = Product::all();
        return Responder::response([
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'property' => 'required|string',
            'value' => 'required|string',
        ]);
        ProductProperty::create($request->all());

        return Responder::response([
            'success_msg' => 'ویژگی محصول ثبت شد.'
        ]);
    }

        public function show(ProductProperty $property)
        {
            return Responder::response([
                'property' => $property
            ]);
        }

    public function edit(ProductProperty $productProperty)
    {
        return Responder::response([
            'property' => $productProperty
        ]);
    }

    public function update(Request $request, ProductProperty $property)
    {
        $request->validate([
            'product_id' => 'required',
            'property' => 'required',
            'value' => 'required',
        ]);

        $property->update($request->all());

        return Responder::response([
            'success_msg' => 'ویژگی محصول ویرایش شد.'
        ]);
    }

    public function destroy(ProductProperty $property)
    {
        $property->delete();

        return Responder::response([
            'success_msg' => 'ویژگی محصول حذف شد.'
        ]);
    }
}
