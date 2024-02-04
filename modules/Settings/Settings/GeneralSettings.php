<?php

namespace Modules\Settings\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public $site_name;
    public $specialization;
    public $doctor_name;
    public $landline_phones;
    public $description;
    public $address;
    public $instagram_id;
    public $telegram_id;

    public static function group(): string
    {
        return 'general';
    }

    public function logo()
    {

    }

}
