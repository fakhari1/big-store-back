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
                'code' => 'کدتخفیف۱۰',
                'price' => 10000,
                'percentage' => 0,
                'discount_ceiling' => 50000,
                'is_private' => false,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
                'user_id' => null,
            ],
            [
                'code' => 'تخفیف۲۰درصد',
                'price' => null,
                'percentage' => 20,
                'discount_ceiling' => null,
                'is_private' => true,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addWeeks(2),
                'user_id' => null,
            ],
            [
                'code' => 'تخفیفتابستان',
                'price' => 50000,
                'percentage' => 0,
                'discount_ceiling' => 0,
                'is_private' => false,
                'status' => 1,
                'start_date' => Carbon::createFromDate(2024, 6, 21),
                'end_date' => Carbon::createFromDate(2024, 9, 22),
                'user_id' => null,
            ],
            [
                'code' => 'تخفیفویژه',
                'price' => null,
                'percentage' => 30,
                'discount_ceiling' => 200000,
                'is_private' => false,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(15),
                'user_id' => null,
            ],
        ];
        DB::table('coupon_discounts')->insert($coupons);
    }
}
