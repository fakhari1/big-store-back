<?php

namespace Modules\Content\Models;

use Modules\Category\Models\PostCategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\File\Models\File;
use Modules\File\Services\Uploader\StorageManager;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $guarded = [];

    protected $appends = ['image_path'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id');
    }

    public function getImagePathAttribute()
    {
        return $this->image ? $this->image->public_path : null;
    }


    public function deleteImage()
    {
        $image = $this->image;
        $storageManager = new StorageManager();

        $storageManager->deleteFile($image->name, $image->path, $image->is_boolean);
    }
}
