<?php

namespace Modules\Category\Models;

//use App\Models\Admin\Content\Post;
//use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\File\Models\File;

class PostCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


//    public function sluggable(): array
//    {
//        return [
//            'slug' => [
//                'source' => 'name'
//            ]
//        ];
//    }

//    public function posts()
//    {
//        return $this->hasMany(Post::class);
//    }


    public function images()
    {
        return $this->belongsToMany(File::class, 'image_post_category', 'post_category_id', 'image_id');
    }
}
