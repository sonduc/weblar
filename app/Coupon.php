<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = "coupons";
    protected $fillable = [
        'code','quantity','discount_percent','discount_money','branh_id','category_id'
    ];
}
