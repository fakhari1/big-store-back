<?php

namespace Modules\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Utils\Responder;
use Modules\Content\Http\Requests\PostRequest;
use Modules\File\Services\Uploader\Uploader;
use Modules\Content\Models\Post;
use Modules\Category\Models\PostCategory;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with(['category'])->get();

        return Responder::response([
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $post_categories = PostCategory::all();

        return Responder::response([
            'categories' => $post_categories
        ]);
    }

    public function store(PostRequest $request, Uploader $uploader)
    {
        dd($request->all());

        $inputs = [
            'title' => $request->title,
            'tags' => $request->tags,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'commentability' => $request->commentability,
            'published_at' => date("Y-m-d H:i:s", (int)$realTimestampStart),
            'summary' => $request->summary,
            'body' => $request->body,
        ];

        if ($request->hasFile('image')) {

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {
                return redirect()->back()->with('error_msg', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['image'] = $result;

        }

        $inputs['author_id'] = 1;
        $post = Post::create($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        $postCategories = PostCategory::all();
        return view('admin.content.post.edit', compact('post', 'postCategories'));
    }

    public function update(PostRequest $request, Post $post, ImageService $imageService)
    {
        // date fixing
        $realTimestampStart = substr($request->published_at, 0, 10);

        $inputs = [
            'title' => $request->title,
            'tags' => $request->tags,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'commentability' => $request->commentability,
            'published_at' => date("Y-m-d H:i:s", (int)$realTimestampStart),
            'summary' => $request->summary,
            'body' => $request->body,
        ];

        if ($request->hasFile('image')) {

            if (!empty($post->image)) {
                $imageService->deleteDirectoryAndFiles($post->image['directory']);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {
                return redirect()->back()->with('error_msg', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['image'] = $result;

        }

        $inputs['author_id'] = 1;
        $post->update($inputs);

        return redirect()->route('admin.content.post.index')->with(['success_msg' => 'پست با موفقیت بروزرسانی شد!']);
    }

    public function destroy(Post $post, ImageService $imageService)
    {
        if (!empty($post->image)) {
            $imageService->deleteDirectoryAndFiles($post->image['directory']);
        }

        if ($post->delete()) {
            return redirect()->route('admin.content.post.index')->with(['success_msg' => 'پست با موفقیت حذف شد!']);
        }
    }

    public function status(Post $post)
    {
        // toggle post status
        $post->status = $post->status == 0 ? 1 : 0;

        if ($post->save()) {
            if ($post->status == 1)
                return response()->json(['status' => true, 'checked' => true]);
            else
                return response()->json(['status' => true, 'checked' => false]);
        }

        return response()->json(['status' => false]);
    }

    public function commentability(Post $post)
    {
        // toggle post commentability
        $post->commentability = $post->commentability == 0 ? 1 : 0;

        if ($post->save()) {
            if ($post->commentability == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        }

        return response()->json(['status' => false]);
    }
}
