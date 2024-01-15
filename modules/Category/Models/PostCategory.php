<?php

namespace Modules\Category\Models;

//use App\Models\Admin\Content\Post;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\File\Models\File;

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


    public function images()
    {
        return $this->belongsToMany(File::class, 'image_post_category', 'post_category_id', 'image_id');
    }

    public function getImagePathAttribute()
    {
        $image = $this->images()->first();
        return DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $image->path . DIRECTORY_SEPARATOR . $image->name;
    }

    public function deleteImages()
    {
        $images = $this->images->get();

        foreach ($images as $key => $image) {
            $image->delete();
        }
    }
}
