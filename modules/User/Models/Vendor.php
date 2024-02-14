<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    const TYPE_JURIDICAL = 'juridical';
    const TYPE_PERSONAL = 'personal';

    static $types = [
        self::TYPE_JURIDICAL,
        self::TYPE_PERSONAL
    ];

    const TYPE_JURIDICAL_COOPERATIVE = 'cooperative';
    const TYPE_JURIDICAL_INSTITUTE = 'institute';
    const TYPE_JURIDICAL_PUBLIC_STOCK = 'public stock';
    const TYPE_JURIDICAL_PRIVATE_STOCK = 'private stock';
    const TYPE_JURIDICAL_OTHER = 'other';

    static $juridical_types = [
        self::TYPE_JURIDICAL_COOPERATIVE,
        self::TYPE_JURIDICAL_INSTITUTE,
        self::TYPE_JURIDICAL_PUBLIC_STOCK,
        self::TYPE_JURIDICAL_PRIVATE_STOCK,
        self::TYPE_JURIDICAL_OTHER,
    ];
}
