<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Market\Models\Product;

class ProductColorController extends Controller
{

    public function index(Product $product)
    {
        return Responder::response([
            'colors' => $product->colors,
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $inputs = [
            'name' => $request->name,
            'code' => $request->code ?? null,
            'price_increase' => $request->price_increase,
            'status' => $request->status,
            'marketable_number' => $request->marketable_number,
        ];

        $product->colors()->create($inputs);

        return Responder::response([
            'message' => 'اطلاعات با موفقیت ثبت شد!'
        ]);
    }

}
