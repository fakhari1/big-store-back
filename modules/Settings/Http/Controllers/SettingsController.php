<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Utils\Responder;
use Modules\Settings\Database\Seeders\GeneralSettingsSeeder;
use Modules\Settings\Http\Requests\SettingsRequest;
use Modules\Settings\Settings\Settings;

class SettingsController extends Controller
{


    public function create()
    {
        $settings = new Settings();

        if (!$settings) (new GeneralSettingsSeeder())->run();

        return Responder::response([
            'settings' => $settings
        ]);
    }

    public function store(SettingsRequest $request, Settings $settings)
    {
        $settings->site_name = $request->site_name;
        $settings->doctor_name = $request->doctor_name;
        $settings->specialization = $request->specialization;
        $settings->description = $request->description ?? '';
        $settings->landline_phones = $request->phones;
        $settings->address = $request->address;
        $settings->telegram_id = $request->telegram_id ?? '';
        $settings->instagram_id = $request->instagram_id ?? '';

        $settings->save();

        return redirect()
            ->route('dashboard.admin.index')
            ->with(['success_msg' => 'تنظیمات با موفقیت  ثبت شد!']);
    }
}
