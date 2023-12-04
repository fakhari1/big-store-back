<?php

namespace Modules\Market\Models;

use App\Models\Admin\Market\OrderItem;
use App\Models\Admin\Market\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'color_name',
        'color_code',
        'product_id',
        'price_increase',
        'status',
        'sold_number',
        'frozen_number',
        'marketable_number'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
