<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Utils\Responder;
use Modules\File\Services\Uploader\Uploader;
use Modules\Settings\Database\Seeders\SettingsSeeder;
use Modules\Settings\Http\Requests\SettingsRequest;
use Modules\Settings\Models\Settings;
use Modules\User\Models\Address;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
        if (!$settings) (new SettingsSeeder())->run();

        return Responder::response(['settings' => $settings]);
    }

    public function store(SettingsRequest $request, Settings $settings, Uploader $uploader)
    {
        $inputs = [
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => explode(',', $request->keywords),
            'phones' => explode(',', $request->phones),
        ];

        $address = Address::create([
            'text' => $request->address
        ]);

        $inputs['address_id'] = $address->id;

        $logo = $uploader->upload('general');
        $inputs['logo_id'] = $logo->id;

        $icon = $uploader->upload('general');
        $inputs['icon_id'] = $icon->id;

        $settings->update($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }
}
