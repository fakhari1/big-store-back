<?php

namespace Modules\Market\Models;

use App\Models\Admin\Market\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';


    protected $casts = ['image' => 'array'];

    protected $fillable = [
        'image',
        'product_id'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
