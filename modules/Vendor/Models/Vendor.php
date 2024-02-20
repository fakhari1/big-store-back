<?php

namespace Modules\Vendor\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\File\Models\File;
use Modules\Market\Models\Brand;
use Modules\Market\Models\Product;
use Modules\Order\Models\Order;

class Vendor extends Model
{
    use HasFactory;

    const TYPE_JURIDICAL = 'حقوقی';
    const TYPE_PERSONAL = 'حقیقی';

    static $types = [
        self::TYPE_JURIDICAL,
        self::TYPE_PERSONAL
    ];
    protected $appends = ['avatar_path'];

//    const TYPE_JURIDICAL_COOPERATIVE = 'cooperative';
//    const TYPE_JURIDICAL_INSTITUTE = 'institute';
    const TYPE_JURIDICAL_PUBLIC_STOCK = 'سهامی عام';
    const TYPE_JURIDICAL_PRIVATE_STOCK = 'سهامی خاص';
    const TYPE_JURIDICAL_OTHER = 'دیگر';

    static $juridical_types = [
//        self::TYPE_JURIDICAL_COOPERATIVE,
//        self::TYPE_JURIDICAL_INSTITUTE,
        self::TYPE_JURIDICAL_PUBLIC_STOCK,
        self::TYPE_JURIDICAL_PRIVATE_STOCK,
        self::TYPE_JURIDICAL_OTHER,
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }


    public function avatar()
    {
        return $this->belongsTo(File::class, 'avatar_id');
    }

    public function getAvatarPathAttribute()
    {
        if ($this->avatar) {
            $image = $this->avatar;
            return env('APP_URL') . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $image->path . DIRECTORY_SEPARATOR . $image->name;
        } else {
            return null;
        }
    }
}
