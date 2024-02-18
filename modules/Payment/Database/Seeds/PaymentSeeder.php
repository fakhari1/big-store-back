<?php

namespace Modules\Payment\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $onlinePayments = [
            [
                'amount' => '100000',
                'vendor_id' => 2,
                'user_id' => 5,
                'gateway' => 'Test',
                'transaction_id' => '123456789',
                'bank_first_response' => '200',
                'bank_second_response' => '200',
                'status' => '1',
                'payed_at' => Carbon::now(),
            ],
            [
                'amount' => '100000',
                'vendor_id' => 3,
                'user_id' => 6,
                'gateway' => 'Test',
                'transaction_id' => '1234567810',
                'bank_first_response' => '200',
                'bank_second_response' => '200',
                'status' => '1',
                'payed_at' => Carbon::now(),
            ],
            [
                'amount' => '100000',
                'vendor_id' => 4,
                'user_id' => 7,
                'gateway' => 'Test',
                'transaction_id' => '1234567811',
                'bank_first_response' => '200',
                'bank_second_response' => '200',
                'status' => '1',
                'payed_at' => Carbon::now(),
            ],

        ];

        $offlinePayments = [
            [
                'amount' => '100000',
                'vendor_id' => 2,
                'user_id' => 5,
                'transaction_id' => '123456789',
                'status' => '1',
                'payed_at' => Carbon::now(),
            ],
            [
                'amount' => '100000',
                'vendor_id' => 2,
                'user_id' => 6,
                'transaction_id' => '123456789',
                'status' => '1',
                'payed_at' => Carbon::now(),
            ],
            [
                'amount' => '100000',
                'vendor_id' => 2,
                'user_id' => 7,
                'transaction_id' => '123456789',
                'status' => '1',
                'payed_at' => Carbon::now(),
            ],

        ];
        $payments = [
            [
                'amount' => '100000',
                'user_id' => 5,
                'vendor_id' => 2,
                'status' => 1,
                'type' => 1, // online
                'paymentable_id' => 1,
                'paymentable_type' => 'Modules\\Payment\\Models\\OnlinePayment',
            ],
            [
                'amount' => '100000',
                'user_id' => 6,
                'vendor_id' => 3,
                'status' => 1,
                'type' => 1, // online
                'paymentable_id' => 2,
                'paymentable_type' => 'Modules\\Payment\\Models\\OnlinePayment',
            ],
            [
                'amount' => '100000',
                'user_id' => 7,
                'vendor_id' => 4,
                'status' => 1,
                'type' => 1, // online
                'paymentable_id' => 3,
                'paymentable_type' => 'Modules\\Payment\\Models\\OnlinePayment',
            ],
            [
                'amount' => '100000',
                'user_id' => 5,
                'vendor_id' => 2,
                'status' => 1,
                'type' => 2, // offline
                'paymentable_id' => 1,
                'paymentable_type' => 'Modules\\Payment\\Models\\OfflinePayment',
            ],
            [
                'amount' => '100000',
                'user_id' => 6,
                'vendor_id' => 2,
                'status' => 1,
                'type' => 2, // offline
                'paymentable_id' => 2,
                'paymentable_type' => 'Modules\\Payment\\Models\\OfflinePayment',
            ],
            [
                'amount' => '100000',
                'user_id' => 4,
                'vendor_id' => 2,
                'status' => 1,
                'type' => 2, // offline
                'paymentable_id' => 3,
                'paymentable_type' => 'Modules\\Payment\\Models\\OfflinePayment',
            ],

        ];

        DB::table('online_payments')->insert($onlinePayments);
        DB::table('offlinePayments')->insert($offlinePayments);
        DB::table('payments')->insert($payments);
    }
}
