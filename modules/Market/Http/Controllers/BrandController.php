<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\File\Services\Uploader\Uploader;
use Modules\Market\Models\Brand;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::all();
        return Responder::response([
            'brands' => $brands
        ]);
    }

    public function store(Request $request, Uploader $uploader)
    {
        $inputs = [
            'persian_name' => $request->persian_name,
            'english_name' => $request->english_name,
            'tags' => $request->tags,
            'status' => $request->status,
        ];

        if ($request->hasFile('file')) {
            $file = $uploader->upload($request->file('file'), 'brands');
            $inputs['logo_id'] = $file->id;
        }

        Brand::create($inputs);

        return Responder::response([
            'message' => 'اطلاعات با موفقیت ثبت شد'
        ], 201);
    }

    public function show(Brand $brand)
    {
        return Responder::response([
            'brand' => $brand
        ]);
    }

    public function edit(Brand $brand)
    {
        return Responder::response([
            'brand' => $brand
        ]);
    }

    public function update(Request $request, Brand $brand, Uploader $uploader)
    {
        $inputs = [
            'persian_name' => $request->persian_name,
            'english_name' => $request->english_name,
            'tags' => $request->tags,
            'status' => $request->status,
        ];

        if ($request->hasFile('file')) {

            $brand->deleteLogo();

            $file = $uploader->upload($request->file('file'), 'brands');

            $inputs['logo_id'] = $file->id;
        }

        $brand->update($inputs);

        return Responder::response([
            'message' => 'اطلاعات با موفقیت بروزرسانی شد.'
        ], 200);
    }

    public function destroy(Brand $brand, Uploader $uploader)
    {
//        $brand->vendors()->detach();

        $brand->delete();

        return Responder::response([
            'message' => 'برند مورد نظر با موفقیت حذف شد'
        ], 200);
    }
}
