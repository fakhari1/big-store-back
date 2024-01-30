<?php

namespace Modules\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Common\Utils\Responder;
use Modules\Content\Http\Requests\CommentRequest;
use Modules\Content\Models\Comment;
use Modules\Content\Models\Post;


class CommentController extends Controller
{

    public function index()
    {
        $unseen_comments = Comment::where('is_seen', 0)->get();

        foreach ($unseen_comments as $key => $comment) {
            $comment->update(['is_seen' => 1]);
        }

        $comments = Comment::orderBy('created_at', 'desc')->with(['author'])->get();
        return Responder::response([
            'comments' => $comments
        ]);
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
        $adminAnswer = $comment->answers()->where('author_id', '=', 1)->first();

        return Responder::response([
            'comment' => $comment->load(['commentable', 'author']),
            'answer' => $adminAnswer ?? null,
        ]);
    }

    public function saveAnswer(CommentRequest $request, Comment $comment)
    {
        $answer = [
            'text' => $request->text,
            'author_id' => 1,
            'parent_id' => $request->parent_id,
            'commentable_id' => $comment->commentable_id,
            'commentable_type' => $comment->commentable_type,
        ];

        Comment::create($answer);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function destroy(Comment $comment)
    {

    }

    public function updateStatus(Request $request, Comment $comment)
    {
        $comment->update(['status' => $request->status]);

        return Responder::response([
            'status' => true,
            'data' => ['status' => $comment->status],
            'message' => 'اطلاعات با موفقیت بروزرسانی شد'
        ]);
    }

    public function updateConfirmationStatus(Request $request, Comment $comment)
    {
        $comment->update(['is_confirmed' => $request->is_confirmed]);

        return Responder::response([
            'status' => true,
            'data' => ['is_confirmed' => $comment->is_confirmed],
            'message' => 'اطلاعات با موفقیت بروزرسانی شد'
        ]);
    }
}
