<?php
namespace Modules\Market\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'persian_name' => 'لپ تاپ ایسوز',
                'english_name' => 'Laptop ASUS',
                'slug' => 'لپ_تاپ_ایسوز',
                'tags' => 'لپ تاب,دیجیتال',
                'status' => 1,
            ],
            [
                'persian_name' => 'لپ تاپ لنوو',
                'english_name' => 'Laptop ASUS',
                'slug' => 'لپ_تاپ_لنوو',
                'tags' => 'لپ تاب,دیجیتال',
                'status' => 0,
            ],
            [
                'persian_name' => 'گوشی موبایل سامسونگ',
                'english_name' => 'Samsung Mobile Phone',
                'slug' => 'گوشی_موبایل_سامسونگ',
                'tags' => 'گوشی,موبایل',
                'status' => 1,
            ],
            [
                'persian_name' => 'تبلت هوآوی',
                'english_name' => 'Huawei Tablet',
                'slug' => 'تبلت_هوآوی',
                'tags' => 'تبلت,دیجیتال',
                'status' => 1,
            ],
        ];
        DB::table('brands')->insert($categories);
    }
}
