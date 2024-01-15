<?php

namespace Modules\Category\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Category\Models\PostCategory;
use Modules\RolePermission\Models\Role;
use Modules\User\Models\User;

class PostCategorySeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'title' => 'دسته بندی پست 1',
                'slug' => 'دسته-بندی-پست-1',
                'description' => 'دسته بندی پست 1',
                'tags' => 'دسته_بندی_پست_1',
            ], [
                'id' => 2,
                'title' => 'دسته بندی پست 2',
                'slug' => 'دسته-بندی-پست-2',
                'description' => 'دسته بندی پست 2',
                'tags' => 'دسته_بندی_پست_2',
            ], [
                'id' => 3,
                'title' => 'دسته بندی پست 3',
                'slug' => 'دسته-بندی-پست-3',
                'description' => 'دسته بندی پست 3',
                'tags' => 'دسته_بندی_پست_3',
            ], [
                'id' => 4,
                'title' => 'دسته بندی پست 4',
                'slug' => 'دسته-بندی-پست-4',
                'description' => 'دسته بندی پست 4',
                'tags' => 'دسته_بندی_پست_4',
            ], [
                'id' => 5,
                'title' => 'دسته بندی پست 5',
                'slug' => 'دسته-بندی-پست-5',
                'description' => 'دسته بندی پست 5',
                'tags' => 'دسته_بندی_پست_5',
            ], [
                'id' => 6,
                'title' => 'دسته بندی پست 6',
                'slug' => 'دسته-بندی-پست-6',
                'description' => 'دسته بندی پست 6',
                'tags' => 'دسته_بندی_پست_6',
            ], [
                'id' => 7,
                'title' => 'دسته بندی پست 7',
                'slug' => 'دسته-بندی-پست-7',
                'description' => 'دسته بندی پست 7',
                'tags' => 'دسته_بندی_پست_7',
            ], [
                'id' => 8,
                'title' => 'دسته بندی پست 8',
                'slug' => 'دسته-بندی-پست-8',
                'description' => 'دسته بندی پست 8',
                'tags' => 'دسته_بندی_پست_8',
            ],
        ];

        foreach ($categories as $category) {
            PostCategory::create([
                'title' => $category['title'],
                'slug' => $category['slug'],
                'description' => $category['description'],
                'image_id' => 1,
                'tags' => $category['tags']
            ]);
        }

    }
}
