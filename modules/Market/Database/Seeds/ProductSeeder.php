<?php

namespace Modules\Market\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'slug' => 'لپ_تاپ_ایسوز_X512',
                'image_id' => 1,
                'weight' => 2.5,
                'length' => 35.0,
                'width' => 24.0,
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
            ],
            [
                'english_name' => 'مبل راحتی مدرن',
                'persian_name' => 'مبل راحتی مدرن',
                'introduction' => 'این مبل راحتی طراحی مدرن و راحتی بی‌نظیری دارد.',
                'text' => 'این مبل راحتی طراحی مدرن و راحتی بی‌نظیری دارد.',
                'slug' => 'مبل_راحتی_مدرن',
                'image_id' => 2,
                'weight' => 30.0,
                'length' => 200.0,
                'width' => 100.0,
                'height' => 80.0,
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
            ],
            [
                'english_name' => 'ماشین سواری تویوتا',
                'persian_name' => 'ماشین سواری تویوتا',
                'introduction' => 'این ماشین سواری با کیفیت ساخت بالا و امکانات فراوان مورد استفاده قرار می‌گیرد.',
                'text' => 'این ماشین سواری با کیفیت ساخت بالا و امکانات فراوان مورد استفاده قرار می‌گیرد.',
                'slug' => 'ماشین_سواری_تویوتا',
                'image_id' => 3,
                'weight' => 1200.0,
                'length' => 460.0,
                'width' => 180.0,
                'height' => 145.0,
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
            ],
            [
                'english_name' => 'خانه شهری',
                'persian_name' => 'خانه شهری',
                'introduction' => 'این خانه شهری با طراحی زیبا و امکانات مدرن واقعدارد.',
                'text' => 'این خانه شهری با طراحی زیبا و امکانات مدرن واقعدارد.',
                'slug' => 'خانه_شهری',
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
            ],
        ];

        DB::table('products')->insert($products);
    }
}
