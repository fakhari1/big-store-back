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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:product_categories',
            'description' => 'required|string',
            'status' => 'required|integer',
            'show_in_menu' => 'required|boolean',
            'tags' => 'required|string',
            'parent_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $slug = Str::slug($request->input('title')); // Generate a unique slug from the title

        if ($request->hasFile('file')) {
            $file = $uploader->upload($request->file('file'), 'brands');
            $inputs['image_id'] = $file->id;
        }

        $productCategory = new ProductCategory([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'show_in_menu' => $request->input('show_in_menu'),
            'tags' => $request->input('tags'),
            'parent_id' => $request->input('parent_id'),
            'slug' => $slug,
        ]);

        $productCategory->save();

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

    public function update(Request $request, Uploader $uploader,ProductCategory $productCategory)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:product_categories,title,'.$productCategory->id,
            'description' => 'required|string',
            'status' => 'required|integer',
            'show_in_menu' => 'required|boolean',
            'tags' => 'required|string',
            'parent_id' => 'nullable',
//            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $slug = Str::slug($request->input('title')); // Generate a unique slug from the title

        if ($request->hasFile('file')) {
            $file = $uploader->upload($request->file('file'), 'brands');
            $productCategory->image_id = $file->id;
        }

        $productCategory->title = $request->input('title');
        $productCategory->description = $request->input('description');
        $productCategory->status = $request->input('status');
        $productCategory->show_in_menu = $request->input('show_in_menu');
        $productCategory->tags = $request->input('tags');
        $productCategory->parent_id = $request->input('parent_id');
        $productCategory->slug = $slug;

        $productCategory->save();

        return Responder::response([
            'message' => 'دسته بندی بروزرسانی شد!'
        ], 200);
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return \Modules\Common\Utils\Responder::response([
            'message'  => 'دسته بندی حذف شد!'
        ],200);
    }
}
