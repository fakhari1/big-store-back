<?php

namespace Modules\Content\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "menus";

    protected $fillable = [
        'name',
        'url',
        'status',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id')->with('parent');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->with('children');
    }
}
