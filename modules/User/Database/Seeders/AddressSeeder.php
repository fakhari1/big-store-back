<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $defaultAddresses = [
            [
                'user_id' => 1,
                'text' => 'اصفهان، بلوار کاوه، خیابان آل محمد، کوچه شفق، مجتمع پزشکی سهروردی 1',
                'mobile' => '9010335657',
            ], [
                'user_id' => 1,
                'text' => 'اصفهان، بلوار کاوه، خیابان آل محمد، کوچه شفق، مجتمع پزشکی سهروردی 1',
                'mobile' => '9123456789',
            ], [
                'user_id' => 1,
                'text' => 'اصفهان، بلوار کاوه، خیابان آل محمد، کوچه شفق، مجتمع پزشکی سهروردی 2',
                'mobile' => '9134567890',
            ], [
                'user_id' => 1,
                'text' => 'اصفهان، بلوار کاوه، خیابان آل محمد، کوچه شفق، مجتمع پزشکی سهروردی 3',
                'mobile' => '9134567891',
            ], [
                'user_id' => 1,
                'text' => 'اصفهان، بلوار کاوه، خیابان آل محمد، کوچه شفق، مجتمع پزشکی سهروردی 4',
                'mobile' => '9134567892',
            ],
            [
                'user_id' => 1,
                'text' => 'اصفهان، بلوار کاوه، خیابان آل محمد، کوچه شفق، مجتمع پزشکی سهروردی 5',
                'mobile' => '9134567893',
            ], [
                'user_id' => 1,
                'text' => 'اصفهان، بلوار کاوه، خیابان آل محمد، کوچه شفق، مجتمع پزشکی سهروردی 6',
                'mobile' => '9134567894',
            ],

        ];

        foreach ($defaultAddresses as $address) {
            Address::firstOrCreate([
                'mobile' => $address['mobile'],
            ], [
                'mobile' => $address['mobile'],
                'user_id' => $address['user_id'],
                'text' => $address['text'],
            ]);
        }

    }
}
