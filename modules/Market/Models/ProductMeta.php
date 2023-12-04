<?php

namespace Modules\Market\Models;

use App\Models\Admin\Market\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function getNamespace()
    {
        return $this->getAppNamesapce();
    }
}
