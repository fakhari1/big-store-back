<?php

namespace Modules\Category\Models;

//use App\Models\Admin\Content\Post;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\File\Models\File;
use Modules\File\Services\Uploader\StorageManager;
use Modules\File\Services\Uploader\Uploader;

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

//    public function posts()
//    {
//        return $this->hasMany(Post::class);
//    }


    public function image()
    {
        return $this->belongsTo(File::class, 'image_id');
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

        return $storageManager->deleteFile($image->name, $image->path, $image->is_private);
    }

}
