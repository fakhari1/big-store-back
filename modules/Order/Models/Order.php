<?php

namespace Modules\Order\Models;

use App\Models\Admin\Market\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Discount\Models\CommonDiscount;
use Modules\Discount\Models\CouponDiscount;
use Modules\Market\Models\DeliveryMethod;
use Modules\User\Models\Address;
use Modules\User\Models\User;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'address_id',
        'sent_address',
        'payment_id',
        'payment_object',
        'payment_type',
        'payment_status',
        'delivery_id',
        'delivery_object',
        'delivery_amount',
        'delivery_status',
        'delivery_date',
        'final_amount',
        'discount_amount',
        'coupon_id',
        'coupon_object',
        'coupon_discount_amount',
        'common_discount_id',
        'common_discount_object',
        'common_discount_amount',
        'total_products_discount_amount',
        'status',
    ];

    protected $dates = ['deleted_at'];

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

    public function delivery()
    {
        return $this->belongsTo(DeliveryMethod::class);
    }

    public function coupon()
    {
        return $this->belongsTo(CouponDiscount::class);
    }

    public function commonDiscount()
    {
        return $this->belongsTo(CommonDiscount::class);
    }

    // Define any relationships or additional methods here


//    protected $appends = ['order_status_label', 'payment_status_label', 'payment_type_label', 'payment_type_text', 'delivery_status_label', 'delivery_status_text'];

//    public function payment()
//    {
//        return $this->belongsTo(Payment::class);
//    }
//
//    public function address()
//    {
//        return $this->belongsTo(Address::class);
//    }
//
//    public function delivery()
//    {
//        return $this->belongsTo(Delivery::class);
//    }
//
//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
//
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
//    public function getPaymentStatusLabelAttribute()
//    {
//        $title = '';
//        $color = '';
//
//        if ($this->payment_status == 0) {
//            $title = 'عدم پرداخت';
//            $color = 'danger';
//        } else {
//            $title = 'پرداخت';
//            $color = 'success';
//        }
//        return "<span class='btn btn-{$color} btn-sm text-nowrap' style='width: 78px;'>{$title}</span>";
//
//    }
//
//
//    public function getPaymentStatusTextAttribute()
//    {
//        return $this->payment_status == 0 ?
//            "عدم پرداخت" :
//            "پرداخت";
//    }
//
//    public function getPaymentTypeLabelAttribute()
//    {
//        if ($this->payment_status == 0) {
//            return "-";
//        }
//
//        $label = '';
//        if ($this->payment_type == 0)
//            $label = '<span class="btn btn-success btn-sm" style="width: 78px;">آنلاین</span>';
//        else if ($this->payment_type == 1)
//            $label = '<span class="btn btn-warning btn-sm" style="width: 78px;">آفلاین</span>';
//        else
//            $label = '<span class="btn btn-sm btn-orange" style="width: 78px;">در محل</span>';
//
//        return $label;
//    }
//
//    public
//    function getPaymentTypeTextAttribute()
//    {
//        if ($this->payment_status == 0) {
//            return "-";
//        }
//
//        if ($this->payment_type == 0)
//            return "آنلاین";
//        else if ($this->payment_type == 1)
//            return "آفلاین";
//        else
//            return "در محل";
//    }
//
//    public
//    function getDeliveryStatusLabelAttribute()
//    {
//        $label = '';
//
//        if ($this->delivery_status == 0 || $this->order_status == 3 || $this->payment_status == 0)
//            $label = '<span class="btn btn-danger btn-sm text-nowrap" style="width: 78px">عدم ارسال</span>';
//        else if ($this->delivery_status == 1)
//            $label = '<span class="btn btn-warning btn-sm text-nowrap" style="width: 78px">در حال ارسال</span>';
//        else if ($this->delivery_status == 2)
//            $label = '<span class="btn btn-primary btn-sm text-nowrap" style="width: 78px">ارسال</span>';
//        else
//            $label = '<span class="btn btn-success btn-sm text-nowrap" style="width: 78px">تحویل</span>';
//
//        return $label;
//    }
//
    public
    function getDeliveryStatusTextAttribute()
    {
        if ($this->delivery_status == 0 || $this->order_status == 3 || $this->payment_status == 0)
            return 'عدم ارسال';
        else if ($this->delivery_status == 1)
            return 'در حال ارسال';
        else if ($this->delivery_status == 2)
            return 'ارسال';
        else
            return 'تحویل';
    }
//
}
