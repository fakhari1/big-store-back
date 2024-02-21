<?php

namespace Modules\Discount\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'discountable_id',
        'discountable_type',
        'percentage',
        'user_id',
        'status',
        'start_date',
        'end_date',
    ];

    protected $guarded = [];

    public function discountable()
    {
        return $this->morphTo();
    }
}
