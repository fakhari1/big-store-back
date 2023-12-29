<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\Responder;
use Illuminate\Http\Response;
use Modules\Category\Models\PostCategory;
use Modules\Category\Models\ProductCategory;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::orderBy('created_at', 'desc')->get();

        dd($categories);

        return Responder::response([
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('admin.market.category.create', compact('productCategories'));
    }

    public function store(Request $request, ImageService $imageService)
    {
        $inputs = [
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'show_in_menu' => $request->show_in_menu,
            'tags' => $request->product_tags,
            'parent_id' => $request->parent
        ];

        if ($request->hasFile('image')) {

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->save($request->file('image'));

            if ($result === false) {
                return redirect()->back()->with('error_msg', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['image'] = $result;
        }

        ProductCategory::create($inputs);

        return redirect()->route('admin.market.category.index')->with(['success_msg' => 'دسته بندی ثبت شد!']);
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

    public function destroy($id)
    {
        //
    }
}
