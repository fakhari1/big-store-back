<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Market\Models\Brand;
use Modules\Market\Models\Product;
use Modules\User\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        Auth::login(User::find(5));
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
