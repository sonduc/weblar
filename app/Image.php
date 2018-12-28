<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";
    protected $fillable = [
        'product_id','link','slide',
    ];

    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
