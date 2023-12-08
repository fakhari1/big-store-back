<?php

namespace Modules\Content\Models;

use App\Models\Admin\Content\Post;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = 'post_categories';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'status',
        'tags'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
