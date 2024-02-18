<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Market\Models\Product;
use Modules\Payment\Models\OfflinePayment;
use Modules\Payment\Models\OnDeliveredPayment;
use Modules\Payment\Models\OnlinePayment;
use Modules\Payment\Models\Payment;

class FrontController extends Controller
{

    public function index()
    {
        $products = Product::with(
            'properties',
            'category',
//            'images',
            'brand',
            'vendors',
        )->get();

        return view('product', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with(
            'category',
            'images',
            'brand',
            'vendors',
        )->findOrFail($id);
        return view('product', compact('product'));
    }


}
