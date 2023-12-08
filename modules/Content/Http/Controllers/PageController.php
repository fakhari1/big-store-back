<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PageBuilderRequest;
use App\Models\Admin\Content\PageBuilder;

class PageController extends Controller
{
    public function index()
    {
        $pages = PageBuilder::all();
        return view('admin.content.page-builder.index', compact('pages'));
    }


    public function create()
    {
        return view('admin.content.page-builder.create');
    }


    public function store(PageBuilderRequest $request)
    {
        $inputs = [
            'title' => $request->title,
            'body' => $request->body,
            'tags' => $request->tags,
            'status' => $request->status,
            'slug' => $request->url
        ];

        PageBuilder::create($inputs);

        return redirect()->route('admin.content.builder.index')->with(['success_msg' => 'صفحه جدید با موفقیت ساخته شد!']);
    }


    public function show($id)
    {
        //
    }


    public function edit(PageBuilder $page)
    {
        return view('admin.content.page-builder.edit', compact('page'));
    }


    public function update(PageBuilderRequest $request, PageBuilder $page)
    {
        $inputs = [
            'title' => $request->title,
            'slug' => $request->url,
            'body' => $request->body,
            'tags' => $request->tags,
            'status' => $request->status
        ];

        $page->update($inputs);
        return redirect()->route('admin.content.builder.index')->with(['success_msg' => 'رکورد مورد نظر بروزرسانی شد!']);
    }

    public function destroy(PageBuilder $page)
    {
        if ($page->delete()) {
            return redirect()->back()->with(['success_msg' => 'رکورد مورد نظر حذف شد']);
        }
    }

    public function status(PageBuilder $page) {
        $page->status = $page->status == 0 ? 1 : 0;

        if ($page->save()) {
            if ($page->status == 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            }

            return response()->json([
                'status' => true,
                'checked' => true
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }
}
