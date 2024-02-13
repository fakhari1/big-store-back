<?php

namespace Modules\Content\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'text',
        'parent_id',
        'author_id',
        'commentable_id',
        'commentable_type',
        'is_seen',
        'is_confirmed',
        'status',
    ];

    protected $appends = ['commentable_title'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function getCommentableTitleAttribute()
    {
        return [
            'Modules\\Content\\Models\\Post' => 'پست',
            'Modules\\Market\\Models\\Product' => 'محصول',
        ][$this->commentable_type];
    }

}
