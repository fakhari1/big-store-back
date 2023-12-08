<?php

namespace Modules\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Http\Services\Images\ImageService;
use App\Models\Admin\Content\PostCategory;

class PostCategoryController extends Controller
{

    public function index()
    {
        $post_categories = PostCategory::orderBy('created_at', 'desc')->simplePaginate(15);

        return view('admin.content.category.index', compact('post_categories'));
    }


    public function create()
    {
//        $imageCache = new ImageCacheService();
//        return $imageCache->cache(public_path("images/1.jpg"));
        return view('admin.content.category.create');
    }

    public function store(PostCategoryRequest $request, ImageService $imageService)
    {

        $inputs = [
            'name' => $request->category_name,
            'description' => $request->category_description,
            'tags' => $request->category_tags,
            'status' => $request->category_status
        ];

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            // $result = $imageService->save($request->file('image'));
            // $result = $imageService->fitAndSave($request->file('image'), 600, 150);
            // exit;
            $result = $imageService->createIndexAndSave($request->file('image'));
        }

        if ($result === false) {
            return redirect()->back()->with('error_msg', 'آپلود تصویر با خطا مواجه شد');
        }

        $inputs['image'] = $result;
        $postCategory = PostCategory::create($inputs);
        return redirect()->route('admin.content.category.index')->with(['success_msg' => 'دسته بندی ایجاد شد']);
    }


    public function show(PostCategory $post_category)
    {
    }


    public function edit(PostCategory $post_category)
    {
        return view('admin.content.category.edit', compact('post_category'));
    }


    public function update(PostCategoryRequest $request, PostCategory $post_category, ImageService $imageService)
    {
        $inputs = [
            'name' => $request->category_name,
            'description' => $request->category_description,
            'tags' => $request->category_tags,
            'status' => $request->category_status,
            'currentImage' => $request->currentImage
        ];

        if ($request->hasFile('image')) {

            if (!empty($post_category->image)) {
                $imageService->deleteDirectoryAndFiles($post_category->image['directory']);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {
                return redirect()->back()->with('error_msg', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['image'] = $result;

        } else {

            if (isset($inputs['currentImage']) && !empty($post_category->image)) {
                $image = $post_category->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }

        }

        $post_category->update($inputs);

        return redirect()->route('admin.content.category.index')->with(['success_msg' => 'دسته بندی ویرایش شد']);
    }

    public function destroy(PostCategory $post_category, ImageService $imageService)
    {
        $imageService->deleteDirectoryAndFiles($post_category->image['directory']);

        $result = $post_category->delete();

        if ($result) {
            return redirect()->back()->with(['success_msg' => 'دسته بندی حذف شد']);
        }
    }

    public function status(PostCategory $post_category)
    {
        // toggle post category status
        $post_category->status = $post_category->status == 0 ? 1 : 0;

        if ($post_category->save()) {

            if ($post_category->status == 0) {

                return response()->json(['status' => true, 'checked' => false]);

            }

            return response()->json(['status' => true, 'checked' => true]);

        }
        return response()->json(['status' => false]);

    }
}
