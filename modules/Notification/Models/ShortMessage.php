<?php

namespace Modules\Notification\Models;

use Carbon\Carbon;
use Modules\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class ShortMessage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['jalali_published_at'];

    public function getJalaliPublishedAtAttribute() {
        return Jalalian::fromCarbon(Carbon::parse($this->published_at))->format('Y/m/d H:i');
    }

}
