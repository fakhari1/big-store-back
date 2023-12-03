<?php

namespace Modules\Discount\Models;

use App\Models\Admin\Market\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmazingDiscount extends Model
{
    use HasFactory;

    protected $guarded = [];

//    public function product()
//    {
//        return $this->belongsTo(Product::class);
//    }
}
