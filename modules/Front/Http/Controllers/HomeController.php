<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Market\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product', compact('products'));
    }

    public function showProduct(Product $product)
    {
        $product->load([
            'properties',
            'category',
            'images',
            'brand',
            'vendors',
            'colors'
        ]);

        return view('product', compact('product'));
    }


}
