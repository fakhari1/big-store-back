<?php

namespace Modules\Market\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'persian_name',
        'original_name',
        'slug',
        'logo',
        'tags',
        'status'
    ];

    protected $casts = ['logo' => 'array'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
