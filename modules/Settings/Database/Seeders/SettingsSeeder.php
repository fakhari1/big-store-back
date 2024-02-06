<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Settings\Models\Settings;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        Settings::create([
            'title' => 'فروشگاه اینترنتی من و ما',
            'keywords' => [
                'فروشگاه'
            ],
            'logo_id' => 1,
            'icon_id' => 2,
            'phones' => [
                '03142362609'
            ],
        ]);
    }
}
