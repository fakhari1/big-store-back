<?php

namespace Modules\Content\Models;

use Modules\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $casts = ['image' => 'array'];

    protected $fillable = [
        'title',
        'image',
        'url',
        'position',
        'status',
        'author_id'
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public static $positions = [
        0 => 'اسلاید شو (صفحه اصلی)',
        1 => 'کنار اسلاید شو (صفحه اصلی)',
        2 => 'دو بنر تبلیغی بین دو اسلایدر (صفحه اصلی)',
        3 => 'بنر تبلیغی بزرگ پایین دو اسلایدر (صفحه اصلی)',
    ];
}
