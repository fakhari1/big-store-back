<?php
namespace Modules\Market\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Market\Models\DeliveryMethod;

class DeliveryMethodSeeder extends Seeder
{
    public function run()
    {
        $deliveryMethods = [
            [
                'name' => 'پست پیشتاز',
                'amount' => 20000.5,
                'delivery_time' => 3,
                'delivery_time_unit' => DeliveryMethod::UNIT_DAILY,
                'status' => 1,
            ],
            [
                'name' => 'پیک موتوری',
                'amount' => 35000,
                'delivery_time' => 2,
                'delivery_time_unit' => DeliveryMethod::UNIT_DAILY,
                'status' => 1,
            ],
            [
                'name' => 'پست سفارشی',
                'amount' => null,
                'delivery_time' => 7,
                'delivery_time_unit' => DeliveryMethod::UNIT_HOURLY,
                'status' => 1,
            ],
            [
                'name' => 'تحویل حضوری',
                'amount' => null,
                'delivery_time' => null,
                'delivery_time_unit' => DeliveryMethod::UNIT_WEEKLY,
                'status' => 0,
            ],
        ];

        DB::table('delivery_methods')->insert($deliveryMethods);
    }
}
