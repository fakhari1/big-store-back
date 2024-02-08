<?php

namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Modules\File\Models\File;
use Modules\User\Models\Address;

class Settings extends Model
{
    protected $table = 'settings';
    protected $guarded = [];
    protected $casts = [
        'phones' => 'array',
        'keywords' => 'array'
    ];

    protected $appends = [
        'keywords_to_string_format',
        'phones_to_string_format',
        'address_text',
        'logo_path',
        'icon_path'
    ];

    public function logo()
    {
        return $this->belongsTo(File::class, 'logo_id');
    }

    public function icon()
    {
        return $this->belongsTo(File::class, 'icon_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function getKeywordsToStringFormatAttribute()
    {
        $kws = '';

        foreach ($this->keywords as $key => $kw) {
            $kws .= $kw . ',';
        }


        return rtrim($kws, ',');
    }

    public function getPhonesToStringFormatAttribute()
    {
        $phs = '';

        foreach ($this->phones as $key => $phone) {
            $phs .= $phone . ',';
        }


        return rtrim($phs, ',');
    }

    public function getAddressTextAttribute()
    {
        return $this->address->text ?? null;
    }

    public function getLogoPathAttribute()
    {
        if ($this->logo) {
            $image = $this->logo;
            return env('APP_URL') . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $image->path . DIRECTORY_SEPARATOR . $image->name;
        } else {
            return null;
        }
    }

    public function getIconPathAttribute()
    {
        if ($this->icon) {
            $image = $this->icon;
            return env('APP_URL') . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $image->path . DIRECTORY_SEPARATOR . $image->name;
        } else {
            return null;
        }
    }
}
