<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Category\Models\ProductCategory;
use Modules\Common\Utils\Responder;
use Modules\File\Services\Uploader\Uploader;
use Modules\Market\Models\Brand;
use Modules\Market\Models\Product;
use Modules\Market\Models\ProductMeta;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand', 'category'])->orderBy('created_at', 'desc')->get();
        return Responder::response([
            'products' => $products
        ]);
//        return view('admin.market.product.index', compact('products'));
    }

    public function create()
    {
//        $productCategories = ProductCategory::with(['parent', 'children'])->get();
        $productCategories = ProductCategory::all();
        $brands = Brand::all();
        return Responder::response([
            'categories' => $productCategories,
            'brands' => $brands
        ]);
//        return view('admin.market.product.create', compact('productCategories', 'brands'));
    }

    public function store(Request $request, Uploader $uploader)
    {
        $realTimestampStart = substr($request->published_at, 0, 10);

        $inputs = [
            'title' => $request->title,
            'english_name' => $request->english_name,
            'persian_name' => $request->persian_name,
            'introduction' => $request->description ?? 'test',
            'weight' => $request->weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'price' => $request->price,
            'status' => $request->status,
            'marketable' => $request->marketable,
            'tags' => $request->tags,
            'marketable_number' => $request->marketable_number,
            'brand_id' => $request->brand_id,
            'product_category_id' => $request->product_category_id,
            'published_at' => date("Y-m-d H:i:s", (int)$realTimestampStart)
        ];

        if ($request->hasFile('file')) {
            $file = $uploader->upload($request->file('file'), 'products');
            $inputs['image_id'] = $file->id;
        }

        $productProperties = [];
        if (!is_null($request->keys) && !is_null($request->values)) {
            $productProperties = array_combine(array_filter($request->keys), array_filter($request->values));
        }

        DB::transaction(function () use ($request, $inputs, $productProperties) {
            $product = Product::query()->create($inputs);
            if (count($productProperties)) {
                foreach ($productProperties as $key => $value) {
                    ProductMeta::query()->create([
                        'meta_key' => $key,
                        'meta_value' => $value,
                        'product_id' => $product->id
                    ]);
                }
            }
        });

        return Responder::response([
            'message' => 'محصول ثبت شد.'
        ], 201);
//        return redirect()->route('admin.market.product.index')->with(['success_msg' => 'محصول ثبت شد.']);
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

        // Alternatively, you can return the view with the necessary data:
        // return view('admin.market.product.edit', compact('product', 'productCategories', 'brands'));
    }

    public function update(Request $request, Product $product, Uploader $uploader)
    {
        $realTimestampStart = substr($request->published_at, 0, 10);

        $inputs = [
            'title' => $request->title,
            'english_name' => $request->english_name,
            'persian_name' => $request->persian_name,
            'introduction' => $request->description ?? 'test',
            'weight' => $request->weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'price' => $request->price,
            'status' => $request->status,
            'marketable' => $request->marketable,
            'tags' => $request->tags,
            'marketable_number' => $request->marketable_number,
            'brand_id' => $request->brand_id,
            'product_category_id' => $request->product_category_id,
            'published_at' => date("Y-m-d H:i:s", (int)$realTimestampStart)
        ];

        if ($request->hasFile('file')) {
            $file = $uploader->upload($request->file('file'), 'products');
            $inputs['image_id'] = $file->id;
        }

        $productProperties = [];
        if (!is_null($request->keys) && !is_null($request->values)) {
            $productProperties = array_combine(array_filter($request->keys), array_filter($request->values));
        }

        DB::transaction(function () use ($request, $inputs, $productProperties, $product) {
            $product->update($inputs);

            // Delete existing product meta entries
//            $product->metas()->delete();

            // Create new product meta entries
            foreach ($productProperties as $key => $value) {
                $product->metas()->create([
                    'meta_key' => $key,
                    'meta_value' => $value
                ]);
            }
        });
        return Responder::response([
            'message' => 'محصول با موفقیت ویرایش شد'
        ], 200);
        // return redirect()->route('admin.market.product.index')->with(['success_msg' => 'Product updated successfully.']);
    }

    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            // Delete the associated product meta entries
            $product->meta()->delete();

            // Delete the product
            $product->delete();
        });

        return Responder::response([
            'message' => 'محصول یا موفقیت حذف شد'
        ], 200);
        // return redirect()->route('admin.market.product.index')->with(['success_msg' => 'Product deleted successfully.']);
    }
}
