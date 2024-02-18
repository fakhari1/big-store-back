<?php

namespace Modules\Market\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Models\ProductCategory;
use Modules\File\Models\File;
use Modules\File\Services\Uploader\StorageManager;
use Modules\Vendor\Models\Vendor;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $appends = ['real_price', 'image_path'];

    protected $guarded = [];

    protected $casts = [
        'properties' => 'array'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'persian_name'
            ]
        ];
    }

//    public function comments()
//    {
//        return $this->morphMany(Content::class, 'commentable');
//    }
//
//    public function activeComments()
//    {
//        return $this->comments()->where('approved', '=', '1')->whereNull('parent_id')->get();
//    }

    public function properties()
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function images()
    {
        return $this->belongsToMany(File::class, 'image_product', 'product_id', 'file_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }
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
//        return $this->hasMany(ProductCategoryValue::class)->with('ProductCategoryAttribute');
//    }
//
    public function getRealPriceAttribute()
    {
        if ($this->weight >= 1000) {
            return $this->weight / 1000 . " کیلوگرم";
        } else {
            return $this->weight . " گرم";
        }
    }

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id');
    }

    public function deleteImage()
    {
        $image = $this->image;
        if ($image) {
            $storageManager = new StorageManager();

            $this->image->delete();

            return $storageManager->deleteFile($image->name, $image->path, $image->is_private);
        } else
            return true;
    }

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $image = $this->image;
            return env('APP_URL') . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $image->path . DIRECTORY_SEPARATOR . $image->name;
        } else {
            return null;
        }
    }
}
