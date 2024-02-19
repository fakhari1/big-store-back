<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Market\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('Front::index');
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
