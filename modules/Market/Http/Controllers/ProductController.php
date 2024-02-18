<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Category\Models\ProductCategory;
use Modules\Common\Utils\Responder;
use Modules\File\Services\Uploader\Uploader;
use Modules\Market\Models\Brand;
use Modules\Market\Models\Product;
use Modules\Market\Models\ProductMeta;
use Modules\Market\Models\ProductProperty;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand', 'category'])->orderBy('created_at', 'desc')->get();
        return Responder::response([
            'products' => $products
        ]);
    }

    public function create()
    {
        $productCategories = ProductCategory::all();
        $brands = Brand::all();
        return Responder::response([
            'categories' => $productCategories,
            'brands' => $brands
        ]);
    }

    public function store(Request $request, Uploader $uploader)
    {
        $properties = [];
        $keyValues = explode(',', $request->key_values);

        foreach($keyValues as $key => $key_value) {
            array_push($properties, explode(':', $key_value));
        }

        DB::transaction(function () use ($request, $uploader, $properties) {
            $inputs = [
                'english_name' => $request->english_name,
                'persian_name' => $request->persian_name,
                'introduction' => $request->introduction ?? 'test',
                'text' => $request->text ?? 'test',
                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height,
                'price' => $request->price,
                'status' => $request->status,
                'is_marketable' => $request->is_marketable,
                'tags' => $request->tags,
                'marketable_number' => $request->marketable_number,
                'brand_id' => $request->brand_id,
                'product_category_id' => $request->product_category_id,
                'published_at' => Carbon::parse($request->published_at)->format('Y-m-d H:i:s'),
                'properties' => $properties
            ];

            if ($request->hasFile('file')) {
                $file = $uploader->upload($request->file('file'), 'products');
                $inputs['image_id'] = $file->id;
            }

            Product::create($inputs);
        });

        return Responder::response([
            'message' => 'اطلاعات با موفقیت ثبت شد'
        ], 201);
    }

    public function show(Product $product)
    {
        return Responder::response([
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        $productCategories = ProductCategory::all();
        $brands = Brand::all();

        return Responder::response([
            'product' => $product,
            'categories' => $productCategories,
            'brands' => $brands
        ]);
    }

    public function update(Request $request, Product $product, Uploader $uploader)
    {
        $properties = [];
        $keyValues = explode(',', $request->key_values);

        foreach($keyValues as $key => $key_value) {
            array_push($properties, explode(':', $key_value));
        }

        DB::transaction(function () use ($request, $uploader, $properties, $product) {
            $inputs = [
                'english_name' => $request->english_name,
                'persian_name' => $request->persian_name,
                'introduction' => $request->introduction,
                'text' => $request->text,
                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height,
                'price' => $request->price,
                'status' => $request->status,
                'is_marketable' => $request->is_marketable,
                'tags' => $request->tags,
                'marketable_number' => $request->marketable_number,
                'brand_id' => $request->brand_id,
                'product_category_id' => $request->product_category_id,
                'published_at' => Carbon::parse($request->published_at)->format('Y-m-d H:i:s'),
                'properties' => $properties

            ];

            if ($request->hasFile('file')) {

                $product->deleteImage();

                $file = $uploader->upload($request->file('file'), 'products');
                $inputs['image_id'] = $file->id;
            }



            $product->update($inputs);

        });

        return Responder::response([
            'message' => 'اطلاعات با موفقیت بروزرسانی شد'
        ]);
    }

    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            $product->vendors()->detach();
            $product->meta()->delete();

            $product->delete();
        });

        return Responder::response([
            'message' => 'محصول یا موفقیت حذف شد'
        ], 200);
    }
}
