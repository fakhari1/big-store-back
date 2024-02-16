<?php
namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'title' => 'لپ تاپ ایسوز',
                'description' => 'توضیحات لپ تاپ ایسوز',
                'slug' => 'لپ_تاپ_ایسوز',
                'image_id' => null,
                'status' => 1,
                'show_in_menu' => true,
                'tags' => 'لپ تاب,دیجیتال',
                'parent_id' => null,
            ],
            [
                'title' => 'مبلمان راحتی',
                'description' => 'توضیحات مبلمان راحتی',
                'slug' => 'مبلمان_راحتی',
                'image_id' => null,
                'status' => 1,
                'show_in_menu' => true,
                'tags' => 'مبلمان,فرش',
                'parent_id' => null,
            ],
            [
                'title' => 'خودرو سواری',
                'description' => 'توضیحات خودرو سواری',
                'slug' => 'خودرو_سواری',
                'image_id' => null,
                'status' => 1,
                'show_in_menu' => true,
                'tags' => 'خودرو,ماشین',
                'parent_id' => null,
            ],
            [
                'title' => 'خانه و آپارتمان',
                'description' => 'توضیحات خانه و آپارتمان',
                'slug' => 'خانه_آپارتمان',
                'image_id' => null,
                'status' => 1,
                'show_in_menu' => true,
                'tags' => 'خانه,آپارتمان',
                'parent_id' => null,
            ],
        ];

        DB::table('product_categories')->insert($categories);
    }
}
