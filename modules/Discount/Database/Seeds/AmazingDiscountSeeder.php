<?php

namespace Modules\Discount\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AmazingDiscountSeeder extends Seeder
{
    public function run()
    {
        $discounts = [
            [
                'product_id' => 1,
                'percentage' => 10,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(7),
            ],
            [
                'product_id' => 2,
                'percentage' => 15,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addWeeks(2),
            ],
            [
                'product_id' => 3,
                'percentage' => 20,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(1),
            ],
            [
                'product_id' => 4,
                'percentage' => 25,
                'status' => 1,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(15),
            ],
        ];

        DB::table('amazing_discounts')->insert($discounts);
    }
}
