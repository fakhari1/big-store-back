<?php

namespace Modules\Notification\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Notification\Http\Requests\ShortMessageRequest;
use Modules\Notification\Models\ShortMessage;

class EmailController extends Controller
{

    public function index()
    {
        return response()->json(['message' => 'این سرویس در حال حاضر برای فروشگاه تعریف نشده است']);
    }

}
