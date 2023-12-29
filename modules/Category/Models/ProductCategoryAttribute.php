<?php

namespace App\Models\Admin\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryAttribute extends Model
{
    use HasFactory;

    public function CategoryValues()
    {
        return $this->hasMany(ProductCategoryValue::class);
    }

}
