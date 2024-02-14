<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\Responder;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Modules\Category\Models\ProductCategory;
use Modules\File\Services\Uploader\Uploader;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::all();

        return Responder::response([
            'productCategories' => $productCategories
        ]);
    }

    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('admin.market.category.create', compact('productCategories'));
    }

    public function store(Request $request, Uploader $uploader)
    {
        $inputs = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'show_in_menu' => $request->show_in_menu,
            'tags' => $request->tags,
            'parent_id' => $request->parent_id
        ];

        if ($request->hasFile('file')) {
            $file = $uploader->upload($request->file('file'), 'brands');
            $inputs['image_id'] = $file->id;
        }

        ProductCategory::create($inputs);

        return Responder::response([
            'message' => 'دسته بندی ثبت شد!'
        ], 201);
    }

    public function show(ProductCategory $productCategory)
    {
        return Responder::response(['productCategory' => $productCategory]);
    }

    public function edit(ProductCategory $productCategory)
    {
        $productCategories = ProductCategory::all();
        return view('admin.market.category.edit', compact('productCategory', 'productCategories'));
    }

    public function update(Request $request, ProductCategory $productCategory, Uploader $uploader)
    {
        $inputs = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'show_in_menu' => $request->show_in_menu,
            'tags' => $request->tags,
            'parent_id' => $request->parent_id
        ];

        if ($request->hasFile('file')) {
            $file = $uploader->upload($request->file('file'), 'brands');
            $inputs['image_id'] = $file->id;
        }

        $productCategory->update($inputs);
        return \Modules\Common\Utils\Responder::response([
            'message' => 'دسته بندی بروزرسانی شد!'
        ],200);
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return \Modules\Common\Utils\Responder::response([
            'message'  => 'دسته بندی حذف شد!'
        ],200);
    }
}
