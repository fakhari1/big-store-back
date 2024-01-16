<?php

namespace Modules\Content\Models;

use Modules\Content\Models\Comment;
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

    public function images()
    {
        return $this->belongsToMany(File::class, 'image_post', 'image_id', 'post_id');
    }

    public function deleteImages()
    {
        $images = $this->images;
        $storageManager = new StorageManager();

        foreach ($images as $key => $image) {
            $storageManager->deleteFile($image->name, $image->path, $image->is_boolean);
        }
    }
}
