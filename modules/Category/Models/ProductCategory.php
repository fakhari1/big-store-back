<?php

namespace Modules\Category\Models;

use Modules\File\Models\File;
use Modules\File\Services\Uploader\StorageManager;
use Modules\Market\Models\Product;

//use App\Models\Admin\Market\ProductPropertyAttribute;
//use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['parent_caption', 'image_path'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

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
    public function getParentCaptionAttribute()
    {
        return $this->parent_id == 0 ? 'والد' : $this->parent->title;
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

    public function deleteImage()
    {
        $image = $this->image;
        $storageManager = new StorageManager();

        $this->image->delete();

        return $storageManager->deleteFile($image->name, $image->path, $image->is_private);
    }
}
