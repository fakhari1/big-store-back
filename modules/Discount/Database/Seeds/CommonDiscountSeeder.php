<?php

namespace Modules\Discount\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommonDiscountSeeder extends Seeder
{
    public function run()
    {
        $discounts = [
            [
                'title' => 'تخفیف ویژه',
                'percentage' => 10,
                'discount_ceiling' => 50000,
                'minimal_order_amount' => 100000,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(7),
            ],
            [
                'title' => 'تخفیف فصلی',
                'percentage' => 15,
                'discount_ceiling' => null,
                'minimal_order_amount' => 200000,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addWeeks(2),
            ],
            [
                'title' => 'تخفیف خرید بالا',
                'percentage' => 20,
                'discount_ceiling' => 100000,
                'minimal_order_amount' => 500000,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(1),
            ],
            [
                'title' => 'تخفیف ویژه روزهای تعطیل',
                'percentage' => 25,
                'discount_ceiling' => 200000,
                'minimal_order_amount' => null,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(15),
            ],
        ];

        DB::table('common_discounts')->insert($discounts);
    }
}
