<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Discount\Models\CommonDiscount;
use Modules\Discount\Models\CouponDiscount;
use Modules\Market\Models\DeliveryMethod;
use Modules\Payment\Models\Payment;
use Modules\User\Models\Address;
use Modules\User\Models\User;
use Modules\Vendor\Models\Vendor;

class Order extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function order() {
        return $this->belongsTo(Vendor::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function delivery_method()
    {
        return $this->belongsTo(DeliveryMethod::class);
    }

    public function coupon_discount()
    {
        return $this->belongsTo(CouponDiscount::class);
    }

    public function common_discount()
    {
        return $this->belongsTo(CommonDiscount::class);
    }

    protected $appends = [
        'status_caption',

    ];
//    public function orderItems()
//    {
//        return $this->hasMany(OrderItem::class);
//    }
//
//    public function getOrderStatusLabelAttribute()
//    {
//        $text = '';
//        $color = '';
//
//        switch ($this->order_status) {
//            case 0:
//                $text = 'بررسی نشده';
//                $color = 'dark';
//                break;
//            case 1:
//                $text = 'در انتظار';
//                $color = 'warning';
//                break;
//            case 2:
//                $text = 'عدم تایید';
//                $color = 'info';
//                break;
//            case 3:
//                $text = 'تایید';
//                $color = 'success';
//                break;
//            case 4:
//                $text = 'باطل';
//                $color = 'danger';
//                break;
//            default:
//                $text = 'مرجوع';
//                $color = 'secondary';
//                break;
//        }
//        return "<span class='btn btn-sm btn-{$color} text-nowrap' style='width: 78px;'>{$text}</span>";
//    }
//

    public function getStatusCaptionAttribute()
    {
        if ($this->status == 0) return 'در انتظار تایید';
        if ($this->status == 1) return 'تایید';
        if ($this->status == 2) return 'عدم تایید';
    }

}
