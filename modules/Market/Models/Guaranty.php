<?php

namespace Modules\Market\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Models\OrderItem;

class Guaranty extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['image_path'];

    public function order_item()
    {
        return $this->hasOne(OrderItem::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
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
}
