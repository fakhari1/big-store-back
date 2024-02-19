<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Market\Models\Product;

class ProductGuarantyController extends Controller
{
    public function index(Product $product)
    {
        return Responder::response([
            'guaranties' => $product->guaranties,
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $inputs = [
            'title' => $request->title,
            'price_increase' => $request->price_increase,
            'status' => $request->status,
        ];

        $product->guaranties()->create($inputs);

        return Responder::response([
            'message' => 'اطلاعات با موفقیت ثبت شد!'
        ]);
    }
}
