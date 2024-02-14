<?php

namespace Modules\Market\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "amount",
        "delivery_time",
        "delivery_time_unit",
        "status"
    ];

    const UNIT_WEEKLY = 'weekly';

    const UNIT_DAILY = 'daily';

    const UNIT_HOURLY = 'hourly';

    public static $delivery_time_units = [
        self::UNIT_WEEKLY,
        self::UNIT_DAILY,
        self::UNIT_HOURLY,
    ];

}
