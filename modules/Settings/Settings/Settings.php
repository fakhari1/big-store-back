<?php

namespace Modules\Settings\Settings;

use Illuminate\Database\Eloquent\Model;
use Modules\File\Models\File;
use Modules\User\Models\Address;

class Settings extends Model
{
    protected $table = 'settings';
    protected $guarded = [];

    protected $casts = [
        'landline_phones' => 'array',
        'keywords' => 'array'
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
}
