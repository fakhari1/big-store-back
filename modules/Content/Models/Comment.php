<?php

namespace Modules\Content\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'author_id',
        'commentable_id',
        'commentable_type',
        'parent_id',
        'status',
        'approved'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    public function answers() {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}
