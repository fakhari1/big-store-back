<?php

namespace Modules\User\Models;

use App\Models\Admin\Market\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $appends = ['recipient'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getRecipientAttribute()
    {
        return "{$this->recipient_first_name} {$this->recipient_last_name}";
    }
}
