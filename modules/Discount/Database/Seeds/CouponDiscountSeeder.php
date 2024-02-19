<?php

namespace Modules\Discount\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CouponDiscountSeeder extends Seeder
{
    public function run()
    {
        $coupons = [
            [
                'code' => 'code-5-%',
                'percentage' => 5,
                'discount_ceiling' => 500000,
                'is_private' => false,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'code' => 'code-10-%',
                'percentage' => 10,
                'discount_ceiling' => 600000,
                'is_private' => false,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'code' => 'code-20-%',
                'percentage' => 20,
                'discount_ceiling' => 700000,
                'is_private' => false,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'code' => 'code-30-%',
                'percentage' => 30,
                'discount_ceiling' => 800000,
                'is_private' => false,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'code' => 'code-40-%',
                'percentage' => 40,
                'discount_ceiling' => 900000,
                'is_private' => false,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'code' => 'code-50-%',
                'percentage' => 50,
                'discount_ceiling' => 100000,
                'is_private' => false,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
        ];

        $discounts = [
            [
                'discountable_id' => '1',
                'discountable_type' => 'Modules\\Discount\\Models\\CouponDiscount',
                'percentage' => '5',
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'discountable_id' => '2',
                'discountable_type' => 'Modules\\Discount\\Models\\CouponDiscount',
                'percentage' => '10',
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'discountable_id' => '3',
                'discountable_type' => 'Modules\\Discount\\Models\\CouponDiscount',
                'percentage' => '20',
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'discountable_id' => '4',
                'discountable_type' => 'Modules\\Discount\\Models\\CouponDiscount',
                'percentage' => '30',
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'discountable_id' => '5',
                'discountable_type' => 'Modules\\Discount\\Models\\CouponDiscount',
                'percentage' => '40',
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'discountable_id' => '6',
                'discountable_type' => 'Modules\\Discount\\Models\\CouponDiscount',
                'percentage' => '50',
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],

        ];

        DB::table('discounts')->insert($discounts);
        DB::table('coupon_discounts')->insert($coupons);
    }
}
