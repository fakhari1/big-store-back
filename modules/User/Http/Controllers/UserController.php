<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Utils\Responder;
use Modules\Payment\Models\OnlinePayment;
use Modules\User\Models\User;
class UserController extends Controller
{

    public function show(User $user)
    {
        return Responder::response([
            'user' => $user
        ]);
    }

    public function getOnlinePayments()
    {
        $payments = OnlinePayment::with(['user', 'vendor'])->where('vendor_id', "2")->get();

        return Responder::response([
            'payments' => $payments
        ]);
    }

}
