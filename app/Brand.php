<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brands";
    protected $fillable = [
        'name','slug','category_id'
    ];

    public static function updateData($id, $data){
        $brand = Brand::find($id);
        $brand->update($data);

        return true;
    }

    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function products(){
        return $this->hasMany('App\Product','brand_id','id');
    }
}
