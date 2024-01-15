<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\Responder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Modules\Category\Http\Requests\PostCategoryRequest;
use Modules\Category\Models\PostCategory;
use Modules\Category\Models\ProductCategory;
use Modules\File\Services\Uploader\Uploader;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::orderBy('created_at', 'desc')->get();

        return Responder::response([
            'categories' => $categories,
        ]);
    }

    public function store(PostCategoryRequest $request, Uploader $uploader)
    {
        $inputs = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'tags' => fix_tags_to_meta_format($request->tags),
        ];

        $postCategory = PostCategory::create($inputs);

        $file = $uploader->upload('post-categories');

        $postCategory->images()->attach([
            'image_id' => $file->id
        ]);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);

//        if ($request->hasFile('image')) {
//
//            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
//            $result = $imageService->save($request->file('image'));
//
//            if ($result === false) {
//                return redirect()->back()->with('error_msg', 'آپلود تصویر با خطا مواجه شد');
//            }
//
//            $inputs['image'] = $result;
//        }
//
//        ProductCategory::create($inputs);
//
//        return redirect()->route('admin.market.category.index')->with(['success_msg' => 'دسته بندی ثبت شد!']);
    }

    public function show(PostCategory $postCategory)
    {
        return Responder::response(['category' => $postCategory->loadMissing('images')]);
    }

    public function update(PostCategoryRequest $request, PostCategory $postCategory)
    {
        $inputs = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'tags' => fix_tags_to_meta_format($request->tags),
            'slug' => Str::slug($request->title, '-', 'fa'),
        ];

        $postCategory->update($inputs);

        DB::table('image_post_category')->insert([
            'image_id' => 1,
            'post_category_id' => $postCategory->id
        ]);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function updateStatus(Request $request, PostCategory $postCategory)
    {

        try {
            $postCategory->update([
                'status' => $request->status
            ]);

            return Responder::response([
                'status' => true,
                'data' => ['status' => $postCategory->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }

    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();

        //$postCategory->deleteImages();

        return Responder::response([], 200, 'دسته بندی محتوا با موفقیت حذف شد');

    }
}
