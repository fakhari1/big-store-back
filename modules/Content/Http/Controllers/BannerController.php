<?php

namespace Modules\Content\Http\Controllers;

use App\Http\Requests\Admin\Content\BannerRequest;
use App\Http\Services\Images\ImageService;
use App\Models\Admin\Content\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    private $positions;

    public function __construct()
    {
        $this->positions = Banner::$positions;
    }

    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')->simplePaginate(15);
        $positions = $this->positions;
        return view('admin.content.banners.index', compact('banners', 'positions'));
    }


    public function create()
    {
        $positions = $this->positions;
        return view('admin.content.banners.create', compact('positions'));
    }

    public function store(BannerRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {

            $destination = 'images' . DIRECTORY_SEPARATOR . 'banners';

            if ($request->file('image')->getClientOriginalExtension() == 'gif') {

                $sub = DIRECTORY_SEPARATOR . date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d');

                $fileName = time() . "." . $request->file('image')->extension();

                $request->file('image')->move(public_path($destination . $sub), $fileName);

                $result = $destination . $sub . DIRECTORY_SEPARATOR . $fileName;

            } else {

                $imageService->setExclusiveDirectory($destination);

                $result = $imageService->save($request->file('image'));

            }


            if ($result == false) {
                return redirect()->route('admin.content.banners.create')->with(['error_msg' => 'آپلود تصویر با خطا مواجه شد']);
            }

            $inputs['image'] = $result;
        }

        $inputs['author_id'] = 1;
        $banner = Banner::create($inputs);

        return redirect()->route('admin.content.banners.index')->with(['success_msg' => 'رکورد با موفقیت ایجاد شد']);
    }

    public function edit(Request $request, Banner $banner)
    {

    }

    public function update(BannerRequest $request, Banner $banner, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($banner->image)) {
                $imageService->deleteDirectoryAndFiles($banner->image['directory']);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'banners');
            $result = $imageService->save($request->file('image'));

            if ($result == false) {
                return redirect()->route('admin.content.banners.index')->with(['error_msg' => 'آپلود تصویر با خطا موجه شد']);
            }

            $inputs['image'] = $result;
        }

        if (isset($inputs['currentImage']) && !empty($banner->image)) {
            $image = $banner->image;
            $image['currentImage'] = $inputs['currentImage'];
            $inputs['image'] = $image;
        }

        $banner->update($inputs);
        return redirect()->route('admin.content.banners.index')->with(['success_msg' => 'رکورد ویرایش شد.']);
    }

    public function destroy(Banner $banner)
    {

    }
}
