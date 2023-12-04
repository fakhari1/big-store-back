<?php

namespace Modules\Article\Models;

use App\Models\Admin\Content\Comment;
use App\Models\Admin\Content\PostCategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'body',
        'image',
        'status',
        'commentability',
        'tags',
        'published_at',
        'author_id',
        'category_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
