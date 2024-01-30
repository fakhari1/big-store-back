<?php

namespace Modules\Content\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Content\Models\Comment;
use Modules\Content\Models\Post;

class CommentSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'text' => 'ایول دمت گرم',
                'parent_id' => null,
                'is_seen' => 0,
                'author_id' => 1,
                'commentable_id' => 1,
                'commentable_type' => Post::class,
            ], [
                'text' => 'اصلا خوب نبود',
                'parent_id' => null,
                'is_seen' => 0,
                'author_id' => 1,
                'commentable_id' => 1,
                'commentable_type' => Post::class,
            ], [
                'text' => 'فعلا دارم استفاده میکنم',
                'parent_id' => null,
                'is_seen' => 0,
                'author_id' => 1,
                'commentable_id' => 1,
                'commentable_type' => Post::class,
            ], [
                'text' => 'حالا شدید فروشگاه واقعی خسته نباشید واقعا',
                'parent_id' => null,
                'is_seen' => 0,
                'author_id' => 1,
                'commentable_id' => 1,
                'commentable_type' => Post::class,
            ], [
                'text' => 'این دیگه چیه؟',
                'parent_id' => null,
                'is_seen' => 0,
                'author_id' => 1,
                'commentable_id' => 1,
                'commentable_type' => Post::class,
            ], [
                'text' => 'نظری ندارم خواستم فقط یه چیزی بنویسم',
                'parent_id' => null,
                'is_seen' => 0,
                'author_id' => 1,
                'commentable_id' => 1,
                'commentable_type' => Post::class,
            ], [
                'text' => 'هیچی ولش کن',
                'parent_id' => null,
                'is_seen' => 0,
                'author_id' => 1,
                'commentable_id' => 1,
                'commentable_type' => Post::class,
            ], [
                'text' => 'نظر شماره 8',
                'parent_id' => null,
                'is_seen' => 0,
                'author_id' => 1,
                'commentable_id' => 1,
                'commentable_type' => Post::class,
            ],
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }

    }
}
