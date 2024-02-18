<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\Responder;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Category\Models\ProductCategory;
use Modules\File\Services\Uploader\Uploader;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();

        return Responder::response([
            'categories' => $categories
        ]);
    }

    public function store(Request $request, Uploader $uploader)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:product_categories',
            'description' => 'required|string',
            'status' => 'required|integer',
            'show_in_menu' => 'required|boolean',
            'tags' => 'required|string',
            'parent_id' => 'nullable',
        ]);

        if ($request->hasFile('file')) {
            $file = $uploader->upload($request->file('file'), 'product-categories');
            $inputs['image_id'] = $file->id;
        }

        $productCategory = new ProductCategory([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'show_in_menu' => $request->input('show_in_menu'),
            'tags' => $request->input('tags'),
            'parent_id' => $request->input('parent_id'),
        ]);

        $productCategory->save();

        return Responder::response([
            'message' => 'دسته بندی ثبت شد'
        ], 201);
    }

    public function show(ProductCategory $productCategory)
    {
        return Responder::response(['category' => $productCategory]);
    }

    public function update(Request $request, ProductCategory $productCategory, Uploader $uploader)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:product_categories,title,' . $productCategory->id,
            'description' => 'required|string',
            'status' => 'required|integer',
            'show_in_menu' => 'required|boolean',
            'tags' => 'required|string',
            'parent_id' => 'nullable',
//            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $uploader->upload($request->file('file'), 'product-categories');
            $productCategory->image_id = $file->id;
        }

        $productCategory->title = $request->input('title');
        $productCategory->description = $request->input('description');
        $productCategory->status = $request->input('status');
        $productCategory->show_in_menu = $request->input('show_in_menu');
        $productCategory->tags = $request->input('tags');
        $productCategory->parent_id = $request->input('parent_id') == 'null' ? null : $request->input('parent_id');

        $productCategory->save();

        return Responder::response([
            'message' => 'دسته بندی بروزرسانی شد'
        ], 200);
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return \Modules\Common\Utils\Responder::response([
            'message' => 'دسته بندی حذف شد!'
        ], 200);
    }
}
