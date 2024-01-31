<?php

namespace Modules\Notification\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
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

    public function store(ShortMessageRequest $request, Uploader $uploader)
    {
        $inputs = [
            'title' => $request->title,
            'tags' => fix_tags_to_meta_format($request->tags),
            'category_id' => $request->category_id,
            'status' => $request->status,
            'has_comment' => $request->comment_ability,
            'published_at' => Carbon::parse($request->published_at)->format('Y-m-d H:i:s'),
            'summary' => $request->summary,
            'text' => $request->text,
        ];

        $file = $uploader->upload('short_messages');
        $inputs['image_id'] = $file->id;

        $inputs['author_id'] = 1;
        ShortMessage::create($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function update(ShortMessageRequest $request, ShortMessage $shortMessage, Uploader $uploader)
    {
        $inputs = [
            'title' => $request->title,
            'tags' => fix_tags_to_meta_format($request->tags),
            'category_id' => $request->category_id,
            'status' => $request->status,
            'has_comment' => $request->comment_ability,
            'published_at' => Carbon::parse($request->published_at)->format('Y-m-d H:i:s'),
            'summary' => $request->summary,
            'text' => $request->text,
        ];


        if ($request->hasFile('file')) {

            $shortMessage->deleteImage();

            $file = $uploader->upload('short_messages');

            $inputs['image_id'] = $file->id;
        }

        $shortMessage->update($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

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

    public function updateCommentAbilityStatus(Request $request, ShortMessage $shortMessage)
    {

        try {
            $shortMessage->update([
                'has_comment' => $request->comment_ability
            ]);

            return Responder::response([
                'status' => true,
                'data' => ['comment_ability' => $shortMessage->has_comment],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }

    public function destroy(ShortMessage $shortMessage)
    {
        $shortMessage->deleteImage();

        $shortMessage->delete();

        return Responder::response([
            'status' => true,
            'message' => 'پست مورد نظر با موفقیت حذف شد'
        ]);
    }

}
