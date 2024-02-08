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

        if (!$settings) {
            (new SettingsSeeder())->run() ;
            $settings = Settings::all();
        }

        return Responder::response(['settings' => $settings]);
    }

    public function show(Settings $settings)
    {
        return Responder::response([
            'settings' => $settings
        ]);
    }

    public function update(SettingsRequest $request, Settings $settings, Uploader $uploader)
    {
        $inputs = [
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => explode(',', $request->keywords),
            'phones' => explode(',', $request->phones),
        ];


        if ($settings->address) {
            $settings->address()->update([
                'text' => $request->address_text
            ]);
        } else {
            $address = $settings->address()->create([
                'text' => $request->address_text
            ]);
            $inputs['address_id'] = $address->id;
        }

        if ($request->hasFile('logo')) {
            $logo = $uploader->upload($request->file('logo'), 'general');
            $inputs['logo_id'] = $logo->id;
        }

        if ($request->hasFile('icon')) {
            $icon = $uploader->upload($request->file('icon'), 'general');
            $inputs['icon_id'] = $icon->id;
        }

        $settings->update($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }
}
