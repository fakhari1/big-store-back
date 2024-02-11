<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
//use App\Http\Services\Images\ImageService;
//use App\Models\Admin\Market\Brand;


//use App\Models\Admin\Market\ProductMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Category\Models\ProductCategory;
use Modules\Common\Utils\Responder;
use Modules\File\Services\Uploader\Uploader;
use Modules\Market\Models\Brand;
use Modules\Market\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand', 'category'])->orderBy('created_at', 'desc')->get();
        return Responder::response([
            $products
        ]);
//        return view('admin.market.product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function create()
    {
        $productCategories = ProductCategory::with(['parent', 'children'])->get();
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
            'name' => $request->name,
            'introduction' => $request->description ?? 'test',
            'weight' => $request->weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'price' => $request->price,
            'status' => $request->status,
            'marketable' => $request->marketable,
            'tags' => $request->tags_name,
            'marketable_number' => $request->marketable_number,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'published_at' => date("Y-m-d H:i:s", (int)$realTimestampStart)
        ];

        $file = $uploader->upload('posts');
        $inputs['image_id'] = $file->id;

        $productProperties = array_combine(array_filter($request->keys), array_filter($request->values));

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

        return redirect()->route('admin.market.product.index')->with(['success_msg' => 'محصول ثبت شد.']);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
