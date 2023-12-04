<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content\FAQ;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Content\FAQRequest;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::paginate(15);
        return view('admin.content.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.content.faq.create');
    }

    public function store(FAQRequest $request)
    {
        $inputs = [
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status,
            'tags' => $request->tags
        ];

        FAQ::create($inputs);

        return redirect()->route('admin.content.faq.index')->with(['success_msg' => 'سوال و پاسخ با موفقیت ایجاد شد']);
    }

    public function edit(FAQ $faq)
    {
        return view('admin.content.faq.edit', compact('faq'));
    }

    public function update(FAQ $faq, FAQRequest $request)
    {
        $inputs = [
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status,
            'tags' => $request->tags
        ];

        $faq->update($inputs);

        return redirect()->route('admin.content.faq.index')->with(['success_msg' => "سوال مورد نظر با موفقیت بروزرسانی شد!"]);
    }

    public function destroy(FAQ $faq)
    {
        if ($faq->delete()) {
            return redirect()->back()->with(['success_msg' => 'رکورد مورد نظر با موفقیت حذف شد!']);
        }
    }

    public function status(FAQ $faq)
    {
        $faq->status = $faq->status === 0 ? 1 : 0;

        if ($faq->save()) {
            if ($faq->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            }
            return response()->json(['status' => true, 'checked' => true]);
        }
        return response()->json(['status' => false]);
    }
}
