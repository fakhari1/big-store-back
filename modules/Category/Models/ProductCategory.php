<?php

namespace Modules\Category\Models;

//use App\Models\Admin\Market\Product;
//use App\Models\Admin\Market\ProductPropertyAttribute;
//use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'image_id',
        'status',
        'show_in_menu',
        'tags',
        'parent_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

//    public function products()
//    {
//        return $this->hasMany(Product::class);
//    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id')->with('parent');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }

//    public function attribute()
//    {
//        return $this->hasMany(ProductPropertyAttribute::class);
//    }
}
