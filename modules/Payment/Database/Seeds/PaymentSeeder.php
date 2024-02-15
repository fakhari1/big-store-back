<?php

namespace Modules\Payment\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $payments = [
            [
                'amount' => 50000.5,
                'user_id' => 1,
                'status' => 1,
                'type' => 1, // online
                'paymentable_id' => 1,
                'paymentable_type' => 'App\Models\Order',
            ],
            [
                'amount' => 100000,
                'user_id' => 2,
                'status' => 1,
                'type' => 2, // offline
                'paymentable_id' => 2,
                'paymentable_type' => 'App\Models\Order',
            ],
            [
                'amount' => 75000.75,
                'user_id' => 1,
                'status' => 1,
                'type' => 3, // cash
                'paymentable_id' => 3,
                'paymentable_type' => 'App\Models\Order',
            ],
            [
                'amount' => 250000,
                'user_id' => 3,
                'status' => 1,
                'type' => 1, // online
                'paymentable_id' => 4,
                'paymentable_type' => 'App\Models\Invoice',
            ],
        ];

        DB::table('payments')->insert($payments);
    }
}
