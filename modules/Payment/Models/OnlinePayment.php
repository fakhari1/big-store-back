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

    protected $appends = ["bank_label", 'jalali_payed_at', 'status_caption'];

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

    public function getBankLabelAttribute()
    {
        $label = "";
        $text = "";
        switch ($this->gateway) {
            case "MellatGateway":
                $label = "danger";
                $text = "ملت";
                break;
            case "SepahGateway":
                $label = "secondary";
                $text = "سپه";
                break;
            case "MaskanGateway":
                $label = "orange";
                $text = "مسکن";
                break;
        }
        $tag = "<span class='btn btn-{$label} btn-sm w-50'>{$text}</span>";
        return $tag;
    }

    public function getStatusCaptionAttribute()
    {
        return $this->status == 1 ? 'موفق' : 'نا موفق';
    }
    public function getJalaliPayedAtAttribute() {
        return Jalalian::fromCarbon(Carbon::parse($this->payed_at))->format('Y/m/d H:i');
    }
}
