<?php

namespace Modules\Settings\Database\Seeders;
use Illuminate\Database\Seeder;
use Modules\Settings\Settings\GeneralSettings;

class GeneralSettingsSeeder extends Seeder
{
    public function run() {

        $settings = new GeneralSettings();
        $settings->app_name = 'فروشگاه اینترنتی من و ما';
        $settings->description = 'هر آنچه در زندگی نیاز داری را با قیمت مناسب اینجا خواهی یافت!';
        $settings->landline_phones = [
            0 => '031123456789',
            1 => '031123456789',
            2 => '031123456789',
        ];
        $settings->address = 'دفتر مرکزی: اصفهان، تیران و کرون، میدان امام حسین، خیابان طالقانی جنوبی، خیابان امامزاده، مجتمع اداری الماس، طبقه 1، واحد 6';
        $settings->instagram_id = 'manoma';
        $settings->telegram_id = 'manoma';
        $settings->save();
    }
}
