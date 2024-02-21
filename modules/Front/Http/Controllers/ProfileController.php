<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Order\Models\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profileCompletion()
    {
        $user = Auth::user();

        $cartItems = CartItem::where('user_id', Auth::id())->get();
        return view('Front::profile.index', compact('user', 'cartItems'));

    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $inputs = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'national_code' => $request->national_code,
        ];

        $user->update($inputs);

        return redirect()->route('users.address-and-delivery.show');
    }

    public function updateAddress()
    {

    }
}
