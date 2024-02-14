<?php

namespace Modules\Discount\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected $dates = ['start_date', 'end_date'];

//    public function products()
//    {
//        return $this->belongsToMany(Product::class, 'product_common_discount', 'common_discount_id', 'product_id');
//    }
}
