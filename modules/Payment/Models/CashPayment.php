<?php

namespace Modules\Payment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashPayment extends Model
{
    use HasFactory;

    protected $table = 'cash_payments';
    protected $appends = ["bank_label"];

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
}
