<?php

namespace Modules\Market\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['real_price'];

    protected $fillable = [
        'name',
        'introduction',
        'slug',
        'image',
        'weight',
        'length',
        'width',
        'height',
        'price',
        'status',
        'is_marketable',
        'tags',
        'sold_number',
        'frozen_number',
        'marketable_number',
        'brand_id',
        'category_id',
        'published_at'
    ];

    protected $casts = ['image' => 'array'];

//    public function comments()
//    {
//        return $this->morphMany(Comment::class, 'commentable');
//    }
//
//    public function activeComments()
//    {
//        return $this->comments()->where('approved', '=', '1')->whereNull('parent_id')->get();
//    }
//
//    public function metas()
//    {
//        return $this->hasMany(ProductMeta::class);
//    }
//
//    public function category()
//    {
//        return $this->belongsTo(ProductCategory::class, 'category_id');
//    }
//
//    public function images()
//    {
//        return $this->hasMany(ProductImage::class);
//    }
//
//    public function brand()
//    {
//        return $this->belongsTo(Brand::class, 'brand_id');
//    }
//
//    public function colors()
//    {
//        return $this->hasMany(ProductColor::class);
//    }
//
//    public function guarantees()
//    {
//        return $this->hasMany(Guarantee::class);
//    }
//
//    public function amazingSales()
//    {
//        return $this->hasMany(AmazingSale::class);
//    }
//
//    public function activeAmazingSale()
//    {
//        return $this
//            ->amazingSales()
//            ->where('start_date', '<', Carbon::now())
//            ->where('end_date', '>', Carbon::now())
//            ->first();
//    }
//
//    public function CategoryValues()
//    {
//        return $this->hasMany(CategoryValue::class)->with('CategoryAttribute');
//    }
//
//    public function getRealPriceAttribute()
//    {
//        if ($this->weight >= 1000) {
//            return $this->weight / 1000 . " کیلوگرم";
//        } else {
//            return $this->weight . " گرم";
//        }
//    }
//
//    public function users() {
//        return $this->belongsToMany(User::class);
//    }
}
