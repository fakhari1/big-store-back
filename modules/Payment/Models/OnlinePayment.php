<?php

namespace Modules\Payment\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;
use Modules\Vendor\Models\Vendor;
use Morilog\Jalali\Jalalian;

class OnlinePayment extends Model
{
    use HasFactory;

    protected $guarded = [];
    const MELLAT_BANK_GATEWAY = 'درگاه بانک ملت';
    const SEPAH_BANK_GATEWAY = 'درگاه بانک سپه';
    const MELLI_BANK_GATEWAY = 'درگاه بانک ملی';

    static $gatewayes = [
        self::MELLAT_BANK_GATEWAY,
        self::SEPAH_BANK_GATEWAY,
        self::MELLI_BANK_GATEWAY,
    ];


    protected $appends = ['jalali_payed_at', 'status_caption'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function getStatusCaptionAttribute()
    {
        if ($this->status == 0) return 'ناموفق';
        if ($this->status == 1) return 'موفق';
        if ($this->status == 2) return 'مرجوع';
    }
    public function getJalaliPayedAtAttribute() {
        return Jalalian::fromCarbon(Carbon::parse($this->payed_at))->format('Y/m/d H:i');
    }
}
