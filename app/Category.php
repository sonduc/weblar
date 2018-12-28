<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = [
        'name','slug'
    ];

    public function del($id){
        return Category::find($id)->delete();
    }
    public static function updateData($id, $data){
        $category = Category::find($id);
        $category->update($data);

        return true;
    }

    public function brands(){
        return $this->hasMany('App\Brand','category_id','id');
    }

    public function products(){
        return $this->hasMany('App\Product','product_id','id');
    }
}
