<?php

namespace Modules\Discount\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Market\Models\Product;
use Modules\User\Models\User;
use Morilog\Jalali\Jalalian;

class AmazingDiscount extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected $appends = ['jalali_start_date', 'jalali_end_date'];

    public function getJalaliStartDateAttribute() {
        return Jalalian::fromCarbon(Carbon::parse($this->start_date))->format('Y/m/d H:i');
    }

    public function getJalaliEndDateAttribute()
    {
        return Jalalian::fromCarbon(Carbon::parse($this->end_date))->format('Y/m/d H:i');
    }
}
