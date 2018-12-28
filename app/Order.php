<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = [
        'code','user_id','customer_name','email','mobile','address','payment',
        'note','status','receive_at','total'
    ];
}
