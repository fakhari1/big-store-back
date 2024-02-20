<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Market\Models\Brand;
use Modules\Market\Models\Product;
use Modules\Vendor\Models\Vendor;

class MarketController extends Controller
{
    public function product(Vendor $vendor, Product $product)
    {
        $product->loadMissing(['vendors', 'guaranties', 'colors', 'images']);
        $related_products = Product::all();
        return view('Front::product.index', compact('vendor', 'product', 'related_products'));
    }

}
