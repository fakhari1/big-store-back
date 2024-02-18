<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Utils\Responder;
use Modules\File\Services\Uploader\Uploader;
use Modules\Market\Models\Product;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    public function index(Product $product)
    {
        return Responder::response([
            'images' => $product->images
        ]);
    }

    public function store(Request $request, Product $product, Uploader $uploader)
    {
        if ($request->hasFile('file')) {
            $file = $uploader->upload($request->file('file'), 'products' . DIRECTORY_SEPARATOR . 'images');
            $inputs['image_id'] = $file->id;
        }

        return Responder::response([
            'message' => 'اطلاعات با موفقیت ثبت شد'
        ], 201);
    }
    public function destroy(Product $product)
    {

    }
}
