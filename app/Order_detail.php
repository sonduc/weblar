<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = "order_details";
    protected $fillable = [
        'order_code','product_code','quantity','item_total','warehouse_id'
    ];
}
