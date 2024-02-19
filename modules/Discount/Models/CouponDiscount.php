<?php

namespace Modules\Discount\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Models\User;
use Morilog\Jalali\Jalalian;

class CouponDiscount extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    protected $appends = ['jalali_start_date', 'jalali_end_date'];

    public function getJalaliStartDateAttribute() {
        return Jalalian::fromCarbon(Carbon::parse($this->start_date))->format('Y/m/d H:i');
    }

    public function getJalaliEndDateAttribute()
    {
        return Jalalian::fromCarbon(Carbon::parse($this->end_date))->format('Y/m/d H:i');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discounts()
    {
        return $this->morphMany(Discount::class, 'discountable');
    }

}
