<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Market\Models\Guaranty;
use Modules\Market\Models\Product;
use Modules\Market\Models\ProductColor;
use Modules\User\Models\User;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendor()
    {
        return $this->belongsTo(CartItem::class);
    }


    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }


    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }


    //productPrice + colorPrice + guranateePrice
    public function cartItemProductPrice()
    {
        $guarantyPriceIncrease = empty($this->guaranty_id) ? 0 : $this->guaranty->price_increase;
        $colorPriceIncrease = empty($this->product_color_id) ? 0 : $this->color->price_increase;
        return $this->product->price + $guarantyPriceIncrease + $colorPriceIncrease;
    }


    // productPrice * (discountPerecentage / 100)
    public function cartItemProductDiscount()
    {
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = empty($this->product->activeAmazingSales()) ? 0 : $cartItemProductPrice * ($this->product->activeAmazingSales()->percentage / 100);
        return $productDiscount;
    }


    //number * (productPrice + colorPrice + guranateePrice - discountPrice)
    public function cartItemFinalPrice()
    {
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * ($cartItemProductPrice - $productDiscount);
    }


    //number * productDiscount
    public function cartItemFinalDiscount()
    {
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * $productDiscount;
    }

}
