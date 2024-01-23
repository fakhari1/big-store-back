<?php

namespace Modules\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Content\Http\Requests\PageRequest;
use Modules\Content\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->get();

        return Responder::response([
            'pages' => $pages
        ]);
    }

    public function store(PageRequest $request)
    {
        $inputs = [
            'fa_title' => $request->fa_title,
            'en_title' => $request->en_title,
            'text' => $request->text,
            'tags' => fix_tags_to_meta_format($request->tags),
            'status' => $request->status,
        ];

        Page::create($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }


    public function show(Page $page)
    {
        return Responder::response([
            'page' => $page
        ]);
    }

    public function update(PageRequest $request, Page $page)
    {
        $inputs = [
            'fa_title' => $request->fa_title,
            'en_title' => $request->en_title,
            'text' => $request->text,
            'tags' => fix_tags_to_meta_format($request->tags),
            'status' => $request->status,
        ];

        $page->update($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function updateStatus(Request $request, Page $page)
    {

        try {
            $page->update([
                'status' => $request->status
            ]);

            return Responder::response([
                'status' => true,
                'data' => ['status' => $page->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return Responder::response([
            'status' => true,
            'message' => 'صفحه مورد نظر با موفقیت حذف شد'
        ]);
    }
}
