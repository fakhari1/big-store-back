<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Market\Models\Brand;
use Modules\Market\Models\DeliveryMethod;
use Modules\Market\Models\Product;
use Modules\Order\Models\CartItem;
use Modules\User\Models\User;
use Modules\Vendor\Models\Vendor;

class MarketController extends Controller
{
//    public function __construct()
//    {
//        Auth::login(User::findOrFail(5));
//    }
    public function product(Vendor $vendor, Product $product)
    {
        $product->loadMissing(['vendors', 'guaranties', 'colors', 'images']);
        $related_products = Product::all();
        return view('Front::product.index', compact('vendor', 'product', 'related_products'));
    }

    public function showAddressAndDeliveryMethodForm()
    {
        $user = Auth::user();

        if (empty(CartItem::where('user_id', '=', Auth::id()))) {
            return redirect()->route('users.buys.cart');
        }

        $user->loadMissing('addresses');
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $deliveryMethods = DeliveryMethod::where('status', 1)->get();

        return view('Front::address.index', compact('cartItems', 'deliveryMethods', 'user'));
    }

    public function chooseAddressAndDelivery()
    {
        $user = Auth::user();

        if (empty($user->first_name) || empty($user->last_name) || empty($user->national_code) || empty($user->address_id)) {
            return redirect()->route('users.profile.show');
        }
    }

}
