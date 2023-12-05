<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Images\ImageService;
use App\Models\Admin\Market\Product;
use App\Models\Admin\Market\ProductImage;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.market.product.gallery.index', compact('product'));
    }

    public function create(Product $product)
    {
        return view('admin.market.product.gallery.create', compact('product'));
    }

    public function store(Request $request, Product $product, ImageService $imageService)
    {
        if ($request->hasFile('image')) {

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'gallery');
            $result = $imageService->save($request->file('image'));

            if ($result === false) {
                return redirect()->back()->with('error_msg', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['image'] = $result;

        }

        $inputs['product_id'] = $product->id;

        ProductImage::create($inputs);

        return redirect()->route('admin.market.product.gallery.index', $product->id)->with(['success_msg' => 'تصویر آپلود شد.']);
    }

    public function destroy(Product $product)
    {

    }
}
