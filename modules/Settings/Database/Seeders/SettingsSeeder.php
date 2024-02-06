<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Settings\Settings\Settings;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'title' => 'فروشگاه اینترنتی من و ما',
            'keywords' => 'فروشگاه اینترنتی من و ما',
            'logo_id' => 1,
            'icon_id' => 2,
            'landline_phones' => '["03142362609"]',
        ]);
    }
}
