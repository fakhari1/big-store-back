<?php

namespace Modules\Content\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Content\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'پست شماره 1',
                'summary' => 'this is summary test text',
                'text' => 'this is test text for body',
                'has_comment' => true,
                'tags' => 'tag1,tag2,tag3,tag4',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'image_id' => 1,
                'author_id' => 5,
                'category_id' => 1,
            ], [
                'title' => 'پست شماره 2',
                'summary' => 'this is summary test text',
                'text' => 'this is test text for body',
                'has_comment' => true,
                'tags' => 'tag1,tag2,tag3,tag4',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'image_id' => 1,
                'author_id' => 6,
                'category_id' => 1,
            ], [
                'title' => 'پست شماره 3',
                'summary' => 'this is summary test text',
                'text' => 'this is test text for body',
                'has_comment' => true,
                'tags' => 'tag1,tag2,tag3,tag4',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'image_id' => 1,
                'author_id' => 7,
                'category_id' => 1,
            ], [
                'title' => 'پست شماره 4',
                'summary' => 'this is summary test text',
                'text' => 'this is test text for body',
                'has_comment' => true,
                'tags' => 'tag1,tag2,tag3,tag4',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'image_id' => 1,
                'author_id' => 7,
                'category_id' => 1,
            ], [
                'title' => 'پست شماره 5',
                'summary' => 'this is summary test text',
                'text' => 'this is test text for body',
                'has_comment' => true,
                'tags' => 'tag1,tag2,tag3,tag4',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'image_id' => 1,
                'author_id' => 6,
                'category_id' => 1,
            ], [
                'title' => 'پست شماره 6',
                'summary' => 'this is summary test text',
                'text' => 'this is test text for body',
                'has_comment' => true,
                'tags' => 'tag1,tag2,tag3,tag4',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'image_id' => 1,
                'author_id' => 5,
                'category_id' => 1,
            ], [
                'title' => 'پست شماره 7',
                'summary' => 'this is summary test text',
                'text' => 'this is test text for body',
                'has_comment' => true,
                'tags' => 'tag1,tag2,tag3,tag4',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'image_id' => 1,
                'author_id' => 6,
                'category_id' => 1,
            ], [
                'title' => 'پست شماره 8',
                'summary' => 'this is summary test text',
                'text' => 'this is test text for body',
                'has_comment' => true,
                'tags' => 'tag1,tag2,tag3,tag4',
                'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'image_id' => 1,
                'author_id' => 5,
                'category_id' => 1,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

    }
}
