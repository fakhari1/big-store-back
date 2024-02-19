<?php

namespace Modules\Market\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Models\OrderItem;

class Guaranty extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function order_item()
    {
        return $this->hasOne(OrderItem::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
