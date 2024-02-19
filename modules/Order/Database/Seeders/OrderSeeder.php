<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $orders = [
            [
                'vendor_id' => 2,
                'user_id' => 5,
                'address_id' => 1,
                'sent_address' => 'اصفهان، شهرک غربی جی، جنب مسجد صاحب الزمان، منزل شخصی مشتری',
                'payment_id' => 1,
                'delivery_id' => 1,
                'final_amount' => '100000',
                'total_discounts_amount' => 0,
                'total_products_discount_amount' => 0,
                'status' => 0,
            ],
            [
                'vendor_id' => 2,
                'user_id' => 6,
                'address_id' => 1,
                'sent_address' => 'اصفهان، شهرک غربی جی، جنب مسجد صاحب الزمان، منزل شخصی مشتری 1',
                'payment_id' => 2,
                'delivery_id' => 1,
                'final_amount' => '100000',
                'total_discounts_amount' => 0,
                'total_products_discount_amount' => 0,
                'status' => 0,
            ],
            [
                'vendor_id' => 2,
                'user_id' => 7,
                'address_id' => 1,
                'sent_address' => 'اصفهان، شهرک غربی جی، جنب مسجد صاحب الزمان، منزل شخصی مشتری 3',
                'payment_id' => 3,
                'delivery_id' => 1,
                'final_amount' => '100000',
                'total_discounts_amount' => 0,
                'total_products_discount_amount' => 0,
                'status' => 0,
            ],
        ];

        DB::table('orders')->insert($orders);
    }
}
