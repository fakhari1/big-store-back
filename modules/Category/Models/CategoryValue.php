<?php

namespace App\Models\Admin\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryValue extends Model
{
    use HasFactory;

    protected $guarded = [];

//    protected $appends = ['value'];

    public function CategoryAttribute()
    {
        return $this->belongsTo(CategoryAttribute::class);
    }

    public function getPropertyValueAttribute()
    {
        return (object) json_decode($this->value, true);
    }
}
