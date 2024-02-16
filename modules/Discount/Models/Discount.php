<?php

namespace Modules\Discount\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Discount extends Model
{
    protected $fillable = [
        'discount_id',
        'discount_type',
        'status',
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function amazingDiscount()
    {
        return $this->belongsTo(AmazingDiscount::class);
    }

    public function CommonDiscount()
    {
        return $this->belongsTo(CommonDiscount::class);
    }

    public function CouponDiscount()
    {
        return $this->belongsTo(CouponDiscount::class);
    }

    // public function commentable(): BelongsTo
    // {
    //     return $this->belongsTo(Product::class, 'commentable_id');
    // }

//    public function comments(): MorphMany
//    {
//        return $this->morphMany(Comment::class, 'commentable');
//    }
}
