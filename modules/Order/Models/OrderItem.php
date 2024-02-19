<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Discount\Models\AmazingDiscount;
use Modules\Market\Models\Guaranty;
use Modules\Market\Models\Product;
use Modules\Market\Models\ProductColor;

class OrderItem extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function amazing_discount()
    {
        return $this->belongsTo(AmazingDiscount::class, 'amazing_discount_id');
    }

    public function product_color()
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }

    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class, 'guaranty_id');
    }
}
