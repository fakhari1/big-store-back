<?php

namespace Modules\Market\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Modules\Market\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'english_name' => 'Laptop ASUS X512',
                'persian_name' => 'لپ تاپ ایسوز X512',
                'introduction' => 'این لپ تاپ به شما امکان کار با سرعت بالا و عملکرد قوی را می‌دهد.',
                'text' => 'این لپ تاپ به شما امکان کار با سرعت بالا و عملکرد قوی را می‌دهد.',
                'image_id' => 2,
                'weight' => 2.5,
                'length' => 35,
                'width' => 24,
                'height' => 2.5,
                'price' => 5000000,
                'status' => 1,
                'is_marketable' => true,
                'tags' => 'لپ تاپ,دیجیتال',
                'sold_number' => 10,
                'quantity_in_cart' => 5,
                'marketable_number' => 50,
                'brand_id' => 1,
                'product_category_id' => 1,
                'published_at' => Carbon::now(),
                'properties' => [
                    ['جنس', 'پشم و شیشه']
                ]
            ],
            [
                'english_name' => 'مبل راحتی مدرن',
                'persian_name' => 'مبل راحتی مدرن',
                'introduction' => 'این مبل راحتی طراحی مدرن و راحتی بی‌نظیری دارد.',
                'text' => 'این مبل راحتی طراحی مدرن و راحتی بی‌نظیری دارد.',
                'image_id' => 2,
                'weight' => 30,
                'length' => 200.,
                'width' => 100,
                'height' => 80,
                'price' => 8000000,
                'status' => 1,
                'is_marketable' => true,
                'tags' => 'مبلمان,فرش',
                'sold_number' => 5,
                'quantity_in_cart' => 2,
                'marketable_number' => 20,
                'brand_id' => 2,
                'product_category_id' => 2,
                'published_at' => Carbon::now(),
                'properties' => [
                    ['جنس', 'پشم و شیشه']
                ]
            ],
            [
                'english_name' => 'ماشین سواری تویوتا',
                'persian_name' => 'ماشین سواری تویوتا',
                'introduction' => 'این ماشین سواری با کیفیت ساخت بالا و امکانات فراوان مورد استفاده قرار می‌گیرد.',
                'text' => 'این ماشین سواری با کیفیت ساخت بالا و امکانات فراوان مورد استفاده قرار می‌گیرد.',
                'image_id' => 3,
                'weight' => 1200,
                'length' => 4600,
                'width' => 1800,
                'height' => 1450,
                'price' => 150000000,
                'status' => 1,
                'is_marketable' => true,
                'tags' => 'خودرو,ماشین',
                'sold_number' => 3,
                'quantity_in_cart' => 1,
                'marketable_number' => 10,
                'brand_id' => 3,
                'product_category_id' => 3,
                'published_at' => Carbon::now(),
                'properties' => [
                    ['جنس', 'پشم و شیشه']
                ]
            ],
            [
                'english_name' => 'خانه شهری',
                'persian_name' => 'خانه شهری',
                'introduction' => 'این خانه شهری با طراحی زیبا و امکانات مدرن واقعدارد.',
                'text' => 'این خانه شهری با طراحی زیبا و امکانات مدرن واقعدارد.',
                'image_id' => 4,
                'weight' => 0.0,
                'length' => 0.0,
                'width' => 0.0,
                'height' => 0.0,
                'price' => 500000000,
                'status' => 1,
                'is_marketable' => true,
                'tags' => 'خانه,آپارتمان',
                'sold_number' => 1,
                'quantity_in_cart' => 0,
                'marketable_number' => 2,
                'brand_id' => 4,
                'product_category_id' => 4,
                'published_at' => Carbon::now(),
                'properties' => [
                    ['جنس', 'پشم و شیشه']
                ]
            ],
        ];

        DB::table('guaranties')->insert([
            [
                'title' => 'گارانتی سه ماهه',
                'product_id' => 1,
                'price_increase' => '100000',
                'status' => 1,
            ],
            [
                'title' => 'گارانتی شش ماهه',
                'product_id' => 1,
                'price_increase' => '0',
                'status' => 1,
            ],
            [
                'title' => 'گارانتی سام سرویس',
                'product_id' => 1,
                'price_increase' => '0',
                'status' => 1,
            ],
            [
                'title' => 'گارانتی برتر',
                'product_id' => 1,
                'price_increase' => '0',
                'status' => 1,
            ],
        ]);
        DB::table('product_colors')->insert([
            [
                'name' => 'سفید',
                'code' => '#FFFFFF',
                'product_id' => 1,
                'price_increase' => '1000000',
                'status' => 1,
                'sold_number' => '0',
                'quantity_in_cart' => '0',
                'marketable_number' => '10',
            ],
            [
                'name' => 'مشکی',
                'code' => '#000000',
                'product_id' => 1,
                'price_increase' => 0,
                'status' => 1,
                'sold_number' => '0',
                'quantity_in_cart' => '0',
                'marketable_number' => '10',
            ],
            [
                'name' => 'آبی',
                'code' => '#0000FF',
                'product_id' => 1,
                'price_increase' => 0,
                'status' => 1,
                'sold_number' => '0',
                'quantity_in_cart' => '0',
                'marketable_number' => '10',
            ],
        ]);
        foreach ($products as $key => $product) {
            Product::create($product);
        }
    }
}
