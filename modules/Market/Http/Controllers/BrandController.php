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
            'vendor_id' => $request->vendor_id,
        ];
            if ($request->hasFile('file')) {
                $file = $uploader->upload($request->file('file'), 'brands');
                $inputs['logo_id'] = $file->id;
            }
        $brand = Brand::create($inputs);

        $brand->vendors()->attach(1);

        return Responder::response([
            'message' => 'برند ثبت شد.'
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

    public function update(Request $request, Brand $brand)
    {
        $inputs = [
            'persian_name' => $request->persian_name,
            'english_name' => $request->english_name,
            'tags' => $request->tags,
            'status' => $request->status,
            'vendor_id' => $request->vendor_id,
        ];

        if ($request->hasFile('file')) {
            $uploader = app(Uploader::class);

            // Delete the old logo file if it exists
            if ($brand->logo) {
                $uploader->delete($brand->logo);
            }

            $file = $uploader->upload($request->file('file'), 'brands');
            $inputs['logo_id'] = $file->id;
        }

        $brand->update($inputs);

        $brand->vendors()->sync(2);

        return Responder::response([
            'message' => 'برند بروزرسانی شد.'
        ], 200);
    }

    public function destroy(Brand $brand)
    {
        // Delete the logo file if it exists
        if ($brand->logo) {
            $uploader = app(Uploader::class);
            $uploader->delete($brand->logo);
        }

        $brand->vendors()->detach();

        $brand->delete();

        return Responder::response([
            'message' => 'برند حذف شد.'
        ], 200);
    }
}
