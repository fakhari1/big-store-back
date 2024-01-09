<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\Responder;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Category\Http\Requests\PostCategoryRequest;
use Modules\Category\Models\PostCategory;
use Modules\Category\Models\ProductCategory;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::orderBy('created_at', 'desc')->get();

        return Responder::response([
            'categories' => $categories,
            'message' => 'اطلاعات با موفقیت دریافت شد'
        ]);
    }

    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('admin.market.category.create', compact('productCategories'));
    }

    public function store(PostCategoryRequest $request)
    {
        $inputs = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'tags' => fix_tags_to_meta_format($request->tags),
            'slug' => Str::slug($request->title, '-', 'fa'),
        ];

        $postCategory = PostCategory::create($inputs);

        DB::table('image_post_category')->insert([
            'image_id' => 1,
            'post_category_id' => $postCategory->id
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

    public function show(ProductCategory $category)
    {
        return Responder::response(['category' => $category]);
    }

    public function edit(ProductCategory $category)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();

        return Responder::response([], 200, 'دسته بندی محتوا با موفقیت حذف شد');

    }
}
