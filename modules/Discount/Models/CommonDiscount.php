<?php

namespace Modules\Discount\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Models\User;
use Morilog\Jalali\Jalalian;

class CommonDiscount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'percentage',
        'discount_ceiling',
        'minimal_order_amount',
        'status',
        'start_date',
        'end_date',
    ];

    protected $appends = ['jalali_start_date', 'jalali_end_date'];

    public function getJalaliStartDateAttribute() {
        return Jalalian::fromCarbon(Carbon::parse($this->start_date))->format('Y/m/d H:i');
    }

    public function getJalaliEndDateAttribute()
    {
        return Jalalian::fromCarbon(Carbon::parse($this->end_date))->format('Y/m/d H:i');
    }

//    public function products()
//    {
//        return $this->belongsToMany(Product::class, 'product_common_discount', 'common_discount_id', 'product_id');
//    }
}
