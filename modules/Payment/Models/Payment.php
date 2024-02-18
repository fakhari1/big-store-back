<?php

namespace Modules\Payment\Models;

use Modules\User\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Vendor\Models\Vendor;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ["status_label", "status", "online_or_offline_label", "original_amount", "amount_as_tooman"];

    protected $appends = ['status_caption'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function paymentable()
    {
        return $this->morphTo();
    }

    public function getStatusCaptionAttribute()
    {
        if ($this->status == 0) return 'ناموفق';
        if ($this->status == 1) return 'موفق';
        if ($this->status == 2) return 'مرجوع';
    }

    public function getStatusLabelAttribute(): string
    {
        switch ($this->status) {
            case 0:
                $label = "danger";
                $text = "پرداخت نشده";
            case 1:
                $label = "success";
                $text = "پرداخت شده";
                break;
            case 2:
                $label = "warning";
                $text = "باطل شده";
                break;
            case 3:
                $label = "info";
                $text = "برگشت داده شده";
                break;
        }
        return "<span class='btn btn-{$label} btn-sm'>{$text}</span>";
    }

    public function getOnlineOrOfflineLabelAttribute(): string
    {
        $offlineModelName = OfflinePayment::class;
        return $this->paymentable_type == $offlineModelName
            ?
            "<span class='btn btn-secondary btn-sm'>آفلاین</span>"
            :
            "<span class='btn btn-success btn-sm'>آنلاین</span>";
    }

    public function getOnlineOrOfflineAttribute(): string
    {
        $offlineModelName = OfflinePayment::class;
        return $this->paymentable_type == $offlineModelName
            ?
            "آفلاین پرداخت شده است"
            :
            "آنلاین پرداخت شده است";
    }


}
