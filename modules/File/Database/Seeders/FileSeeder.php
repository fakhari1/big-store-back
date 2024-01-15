<?php

namespace Modules\File\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Category\Models\PostCategory;
use Modules\File\Models\File;
use Modules\RolePermission\Models\Role;
use Modules\User\Models\User;

class FileSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $files = [
            [
                'id' => 1,
                'name' => 'medicine.jpg',
                'size' => 120,
                'path' => '\image\\',
                'type' => 'image',
                'is_private' => false
            ],
        ];

        foreach ($files as $file) {
            File::create($file);
        }

    }
}
