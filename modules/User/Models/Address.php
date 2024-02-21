<?php

namespace Modules\User\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Vendor\Models\Vendor;

class Address extends Model
{
    use HasFactory;

    protected $appends = ['recipient'];

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getRecipientAttribute()
    {
        return "{$this->recipient_first_name} {$this->recipient_last_name}";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class, 'user_id');
    }
}
