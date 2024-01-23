<?php

namespace Modules\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Category\Models\PostCategory;
use Modules\Common\Utils\Responder;
use Modules\Content\Http\Requests\PostRequest;
use Modules\File\Services\Uploader\Uploader;
use Modules\Content\Models\Post;

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

    public function show(Post $post)
    {
        return Responder::response([
            'post' => $post
        ]);
    }

    public function store(PostRequest $request, Uploader $uploader)
    {
        $inputs = [
            'title' => $request->title,
            'tags' => fix_tags_to_meta_format($request->tags),
            'category_id' => $request->category_id,
            'status' => $request->status,
            'has_comment' => $request->comment_ability,
            'published_at' => Carbon::parse($request->published_at)->format('Y-m-d H:i:s'),
            'summary' => $request->summary,
            'text' => $request->text,
        ];

        $file = $uploader->upload('posts');
        $inputs['image_id'] = $file->id;

        $inputs['author_id'] = 1;
        Post::create($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function update(PostRequest $request, Post $post, Uploader $uploader)
    {
        $inputs = [
            'title' => $request->title,
            'tags' => fix_tags_to_meta_format($request->tags),
            'category_id' => $request->category_id,
            'status' => $request->status,
            'has_comment' => $request->comment_ability,
            'published_at' => Carbon::parse($request->published_at)->format('Y-m-d H:i:s'),
            'summary' => $request->summary,
            'text' => $request->text,
        ];


        if ($request->hasFile('file')) {

            $post->deleteImage();

            $file = $uploader->upload('posts');

            $inputs['image_id'] = $file->id;
        }

        $post->update($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function updateStatus(Request $request, Post $post)
    {

        try {
            $post->update([
                'status' => $request->status
            ]);

            return Responder::response([
                'status' => true,
                'data' => ['status' => $post->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }

    public function updateCommentAbilityStatus(Request $request, Post $post)
    {

        try {
            $post->update([
                'has_comment' => $request->comment_ability
            ]);

            return Responder::response([
                'status' => true,
                'data' => ['comment_ability' => $post->has_comment],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }

    public function destroy(Post $post)
    {
        $post->deleteImage();

        $post->delete();

        return Responder::response([
            'status' => true,
            'message' => 'پست مورد نظر با موفقیت حذف شد'
        ]);
    }

}
