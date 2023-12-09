<?php

namespace Modules\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\CommentRequest;
use App\Models\Admin\Content\Comment;
use App\Models\Admin\Content\Post;
use Illuminate\Http\Request;


class CommentController extends Controller
{

    public function index()
    {
        $unseen_comments = Comment::where('seen', 0)->get();
        foreach ($unseen_comments as $key => $unseen_comment) {
            $unseen_comment->seen = 1;
            $unseen_comment->save();
        }

        $comments = Comment::with(['author', 'parent'])->paginate(15);
        return view('admin.content.comments.index', compact('comments'));
    }

    public function store(Comment $comment, CommentRequest $request)
    {
        $inputs = [
            'body' => $request->body,
            'parent_id' => $comment->id,
            'commentable_id' => $comment->commentable_id,
            'commentable_type' => $comment->commentable_type,
            'author_id' => 1,
            'approved' => 1,
            'status' => 1
        ];

        Comment::create($inputs);

        return redirect()->route('admin.content.comment.index')->with(['success_msg' => 'پاسخ نظر با موفقیت ذخیر شد!']);
    }

    public function show(Comment $comment)
    {
        return view('admin.content.comments.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {

    }

    public function status(Comment $comment)
    {
        $comment->status = $comment->status === 0 ? 1 : 0;

        if ($comment->save()) {
            if ($comment->status == 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            }

            return response()->json([
                'status' => true,
                'checked' => true
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }

    public function approved(Comment $comment)
    {
        $comment->approved = $comment->approved == 0 ? 1 : 0;

        if ($comment->save()) {
            if ($comment->approved == 1) {
                return response()->json([
                    'status' => true,
                    'approved' => true,
                    'text' => 'رد تایید',
                    'class' => 'btn-outline-danger'
                ]);
            }
            return response()->json([
                'status' => true,
                'approved' => false,
                'text' => 'تایید کردن',
                'class' => 'btn-outline-success'
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }
}
