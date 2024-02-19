<?php

namespace Modules\Market\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    use HasFactory;

    protected $guarded = [];

    const UNIT_WEEKLY = 'هفته';

    const UNIT_DAILY = 'روز';

    const UNIT_HOURLY = 'ساعت';

    public static $delivery_time_units = [
        self::UNIT_WEEKLY,
        self::UNIT_DAILY,
        self::UNIT_HOURLY,
    ];


}
