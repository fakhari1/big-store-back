<?php

namespace Modules\Category\Models;

use Modules\Content\Models\Post;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\File\Models\File;
use Modules\File\Services\Uploader\StorageManager;

class PostCategory extends Model
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

    public function posts()
    {
        return $this->hasMany(Post::class);
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

        return $storageManager->deleteFile($image->name, $image->path, $image->is_private);
    }

}
