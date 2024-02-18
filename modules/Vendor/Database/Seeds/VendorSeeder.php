<?php

namespace Modules\Vendor\Database\Seeds;

use Illuminate\Database\Seeder;
use Modules\Vendor\Models\Vendor;


class VendorSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $defaultVendors = [
            [
                'type' => Vendor::TYPE_PERSONAL,
                'juridical_name' => null,
                'juridical_type' => null,
                'shop_name' => 'فروشنده 1',
                'economic_code' => null,
                'national_code' => '5550100500',
                'card_number' => '1111111111111111',
                'shaba_number' => null,
                'phone' => null,
                'mobile' => '9112345671',
                'address_id' => 1,
                'avatar_id' => 1,
                'signatory' => null,
            ], [
                'type' => Vendor::TYPE_PERSONAL,
                'juridical_name' => null,
                'juridical_type' => null,
                'shop_name' => 'فروشنده 2',
                'economic_code' => null,
                'national_code' => '5550100501',
                'card_number' => '1111111111111112',
                'shaba_number' => null,
                'phone' => null,
                'mobile' => '9112345672',
                'address_id' => 1,
                'avatar_id' => 1,
                'signatory' => null,
            ], [
                'type' => Vendor::TYPE_PERSONAL,
                'juridical_name' => null,
                'juridical_type' => null,
                'shop_name' => 'فروشنده 3',
                'economic_code' => null,
                'national_code' => '5550100502',
                'card_number' => '1111111111111113',
                'shaba_number' => null,
                'phone' => null,
                'mobile' => '9112345673',
                'address_id' => 1,
                'avatar_id' => 1,
                'signatory' => null,
            ], [
                'type' => Vendor::TYPE_JURIDICAL,
                'juridical_name' => 'تعاونی 1',
                'juridical_type' => Vendor::TYPE_JURIDICAL_PUBLIC_STOCK,
                'shop_name' => 'غرفه فروشگاهی 1',
                'economic_code' => null,
                'national_code' => '5550100503',
                'card_number' => '1111111111111114',
                'shaba_number' => '135791357913579135791354',
                'phone' => '03142352111',
                'mobile' => null,
                'address_id' => 1,
                'avatar_id' => 1,
                'signatory' => 'فلان فلانی 1',
            ], [
                'type' => Vendor::TYPE_JURIDICAL,
                'juridical_name' => 'تعاونی 2',
                'juridical_type' => Vendor::TYPE_JURIDICAL_PUBLIC_STOCK,
                'shop_name' => 'غرفه فروشگاهی 2',
                'economic_code' => null,
                'national_code' => '5550100504',
                'card_number' => '1111111111111115',
                'shaba_number' => '135791357913579135791355',
                'phone' => '03142352112',
                'mobile' => null,
                'address_id' => 1,
                'avatar_id' => 1,
                'signatory' => 'فلان فلانی 2',
            ],
            [
                'type' => Vendor::TYPE_JURIDICAL,
                'juridical_name' => 'تعاونی 3',
                'juridical_type' => Vendor::TYPE_JURIDICAL_PUBLIC_STOCK,
                'shop_name' => 'غرفه فروشگاهی 3',
                'economic_code' => null,
                'national_code' => '5550100505',
                'card_number' => '1111111111111116',
                'shaba_number' => '135791357913579135791356',
                'phone' => '03142352113',
                'mobile' => null,
                'address_id' => 1,
                'avatar_id' => 1,
                'signatory' => 'فلان فلانی 3',
            ],

        ];

        foreach ($defaultVendors as $vendor) {
            Vendor::create($vendor)->products()->sync([1, 2, 3, 4]);
        }

    }
}
