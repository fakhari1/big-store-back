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

    protected $fillable = [
        'code',
        'price',
        'percentage',
        'discount_ceiling',
        'is_private',
        'status',
        'start_date',
        'end_date',
        'user_id',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'deleted_at',
    ];

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

}
