<?php

namespace Modules\Market\Models;
t;
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
