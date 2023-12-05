<?php

namespace Modules\Market\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Images\ImageService;
use App\Models\Admin\Market\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        return view('admin.market.brand.index');
    }

    public function create()
    {
        return view('admin.market.brand.create');
    }

    public function store(Request $request, ImageService $imageService)
    {
        $inputs = [
            'persian_name' => $request->p_name,
            'original_name' => $request->e_name,
            'tags' => $request->brand_tags,
            'status' => $request->status
        ];

        if ($request->hasFile('brand_logo')) {

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $result = $imageService->createIndexAndSave($request->file('brand_logo'));

            if ($result === false) {
                return redirect()->back()->with('error_msg', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['logo'] = $result;
        }

        $brand = Brand::create($inputs);

        return redirect()->route('admin.market.brand.index')->with(['success_msg' => 'برند ایجاد شد!']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
