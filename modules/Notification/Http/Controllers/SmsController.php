<?php

namespace Modules\Notification\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Notification\Http\Requests\ShortMessageRequest;
use Modules\Notification\Models\ShortMessage;

class SmsController extends Controller
{

    public function index()
    {
        $shortMessages = ShortMessage::orderBy('created_at', 'desc')->get();

        return Responder::response([
            'short_messages' => $shortMessages
        ]);
    }

    public function show(ShortMessage $shortMessage)
    {
        return Responder::response([
            'short_message' => $shortMessage
        ]);
    }

    public function store(ShortMessageRequest $request)
    {
        $inputs = [
            'title' => $request->title,
            'status' => $request->status,
            'published_at' => Carbon::parse($request->published_at)->format('Y-m-d H:i:s'),
            'text' => $request->text,
        ];

        ShortMessage::create($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

//    public function update(ShortMessageRequest $request, ShortMessage $shortMessage)
//    {
//        $inputs = [
//            'title' => $request->title,
//            'tags' => fix_tags_to_meta_format($request->tags),
//            'category_id' => $request->category_id,
//            'status' => $request->status,
//            'has_comment' => $request->comment_ability,
//            'published_at' => Carbon::parse($request->published_at)->format('Y-m-d H:i:s'),
//            'summary' => $request->summary,
//            'text' => $request->text,
//        ];
//
//        $shortMessage->update($inputs);
//
//        return Responder::response([
//            'status' => true,
//            'message' => 'اطلاعات با موفقیت ذخیره شد'
//        ]);
//    }

    public function updateStatus(Request $request, ShortMessage $shortMessage)
    {
        try {
            $shortMessage->update([
                'status' => $request->status
            ]);

            return Responder::response([
                'status' => true,
                'data' => ['status' => $shortMessage->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }

//    public function destroy(ShortMessage $shortMessage)
//    {
//        $shortMessage->delete();
//
//        return Responder::response([
//            'status' => true,
//            'message' => 'پیام کوتاه مورد نظر با موفقیت حذف شد'
//        ]);
//    }

}
