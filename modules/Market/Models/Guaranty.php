<?php

namespace Modules\Market\Models;

use App\Models\Admin\Market\OrderItem;
use App\Models\Admin\Market\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guaranty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
        'price_increase',
        'status',
    ];

    public function orderItem()
    {
        return $this->hasOne(OrderItem::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
