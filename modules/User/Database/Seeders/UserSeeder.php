<?php

namespace Modules\User\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\RolePermission\Models\Role;
use Modules\User\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $defaultUsers = [
            [
                'first_name' => 'حسین',
                'last_name' => 'فخاری',
                'mobile' => '9010335658',
                'activated' => '1',
                'activated_at' => Carbon::now(),
                'role' => Role::ROLE_SUPER_ADMIN,
            ], [
                'first_name' => 'مدیر',
                'last_name' => '1',
                'mobile' => '9123456789',
                'role' => Role::ROLE_MANAGER,
            ], [
                'first_name' => 'مدیر',
                'last_name' => '2',
                'mobile' => '9134567890',
                'role' => Role::ROLE_MANAGER,
            ],[
                'first_name' => 'مدیر',
                'last_name' => '3',
                'mobile' => '9134567000',
                'role' => Role::ROLE_MANAGER,
            ], [
                'first_name' => 'مشتری',
                'last_name' => '1',
                'mobile' => '9134567892',
                'national_code' => '1231222344',
                'role' => Role::ROLE_CUSTOMER,
            ],
            [
                'first_name' => 'مشتری',
                'last_name' => '2',
                'mobile' => '9134567893',
                'national_code' => '1231222345',
                'role' => Role::ROLE_CUSTOMER,
            ], [
                'first_name' => 'مشتری',
                'last_name' => '3',
                'mobile' => '9134567894',
                'national_code' => '1231222346',
                'role' => Role::ROLE_CUSTOMER,
            ],

        ];

        foreach ($defaultUsers as $user) {
            User::firstOrCreate([
                'mobile' => $user['mobile'],
            ], [
                'mobile' => $user['mobile'],
                'national_code' => $user['national_code'] ?? null,
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
            ])->assignRole($user['role']);
        }

    }
}
