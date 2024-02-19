<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Market\Models\Brand;
use Modules\Market\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        $most_viewed = Product::latest()->take(10)->get();
        $special_offer = Product::latest()->take(10)->get();

        return view('Front::index', compact('brands', 'most_viewed', 'special_offer'));
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
