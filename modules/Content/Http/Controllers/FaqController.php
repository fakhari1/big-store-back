<?php

namespace Modules\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Content\Models\Faq;
use Modules\Content\Http\Requests\FaqRequest;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->get();

        return Responder::response([
            'faqs' => $faqs
        ]);
    }

    public function store(FaqRequest $request)
    {
        $inputs = [
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status,
            'tags' => fix_tags_to_meta_format($request->tags),
        ];

        Faq::create($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function show(Faq $faq)
    {
        return Responder::response([
            'faq' => $faq
        ]);
    }

    public function update(FaqRequest $request, Faq $faq)
    {
        $inputs = [
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status,
            'tags' => fix_tags_to_meta_format($request->tags),
        ];

        $faq->update($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function updateStatus(Request $request, Faq $faq)
    {

        try {
            $faq->update([
                'status' => $request->status
            ]);

            return Responder::response([
                'status' => true,
                'data' => ['status' => $faq->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }


    public function destroy(Faq $faq)
    {
        $faq->delete();

        return Responder::response([
            'status' => true,
            'message' => 'پست مورد نظر با موفقیت حذف شد'
        ]);
    }
}
