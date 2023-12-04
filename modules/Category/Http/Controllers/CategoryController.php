<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Services\Images\ImageService;
use App\Models\Admin\Market\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $productCategories = ProductCategory::paginate(15);
        return view('admin.market.category.index', compact('productCategories'));
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
