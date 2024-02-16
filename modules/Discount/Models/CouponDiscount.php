<?php

namespace Modules\Discount\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Models\User;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
