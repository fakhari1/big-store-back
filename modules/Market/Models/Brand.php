<?php

namespace Modules\Market\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Vendor\Models\Vendor;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'persian_name',
        'english_name',
        'slug',
        'logo_id',
        'tags',
        'status'
    ];

    protected $casts = ['logo' => 'array'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class);
    }
}
