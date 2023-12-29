<?php

namespace Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

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
//    public
//    function getDeliveryStatusTextAttribute()
//    {
//        if ($this->delivery_status == 0 || $this->order_status == 3 || $this->payment_status == 0)
//            return 'عدم ارسال';
//        else if ($this->delivery_status == 1)
//            return 'در حال ارسال';
//        else if ($this->delivery_status == 2)
//            return 'ارسال';
//        else
//            return 'تحویل';
//    }
//
}
