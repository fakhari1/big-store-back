<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Market\Models\Product;
use Modules\Order\Models\CartItem;
use Modules\User\Models\User;
use Modules\Vendor\Models\Vendor;

class CartController extends Controller
{
//    public function __construct()
//    {
//        Auth::login(User::findOrFail(5));
//    }

    public function addToCart(Request $request, Vendor $vendor, Product $product)
    {
        if (Auth::check()) {
            $request->validate([
                'color' => 'nullable|exists:product_colors,id',
                'guaranty' => 'nullable|exists:guaranties,id',
                'number' => 'numeric|min:1|max:5',
            ]);

            $cartItems = CartItem::where('product_id', $product->id)
                ->where('user_id', '=', Auth::id())
                ->where('vendor_id', '=', $vendor->id)
                ->get();

            if (!isset($request->color)) {
                $request->color = null;
            }
            if (!isset($request->guaranty)) {
                $request->guaranty = null;
            }

            foreach ($cartItems as $cartItem) {
                if ($cartItem->product_color_id == $request->color &&
                    $cartItem->guaranty_id == $request->guaranty && $cartItem->vendor_id == $vendor->id) {
//                    if ($cartItem->number != $request->number) {
                    $cartItem->update(['number' => $cartItem->number + $request->number]);
//                    }
                    return back()->with(['success' => 'سبد خرید بروزرسانی شد']);
                }
            }

            $inputs = [];
            $inputs['product_color_id'] = $request->color;
            $inputs['guaranty_id'] = $request->guaranty;
            $inputs['user_id'] = Auth::id();
            $inputs['vendor_id'] = $vendor->id;
            $inputs['product_id'] = $product->id;
            $inputs['number'] = $request->number;

            CartItem::create($inputs);

            return redirect()->back()->with(['success' => 'محصول مورد نظر با موفقیت به سبد خرید اضافه شد']);

        } else {
            return redirect()->route('auth.otp.show-form');
        }
    }

    public function cart()
    {
        if (Auth::check()) {
            $cartItems = CartItem::where('user_id', Auth::id())->with(['product', 'user', 'vendor', 'color', 'guaranty'])->get();
//            if ($cartItems->count() > 0) {
            $relatedProducts = Product::all();
            return view('Front::cart.index', compact('cartItems', 'relatedProducts'));
//            } else {
//                return redirect()->back();
//            }

        } else {
            return redirect()->route('auth.otp.show-form');
        }
    }

    public function updateCart(Request $request)
    {
        $inputs = $request->all();
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        foreach ($cartItems as $cartItem) {
            if (isset($inputs['number'][$cartItem->id])) {
                $cartItem->update(['number' => $inputs['number'][$cartItem->id]]);
            }
        }
        return redirect()->route('customer.sales-process.address-and-delivery');
    }


    public function removeFromCart(CartItem $cartItem)
    {
        if ($cartItem->user_id === Auth::user()->id) {
            $cartItem->delete();
        }
        return back();
    }
}
