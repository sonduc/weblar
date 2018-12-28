<?php
/**
 * created by tuan anh
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * định nghĩa bảng kết nối
     */
    protected $table = "products";

    /**
     *định nghĩa trường dữ liệu của bảng
     */
    protected $fillable = [
        'code','name','slug','description','content','status','category_id',
        'brand_id','price'
    ];

    /**
     *  lấy id của đối tượng và cập nhật dữ liệu cho những trường đó
     */
    public static function updateData($id, $data){
        $product = Product::find($id);
        $product->update($data);

        return true;
    }

    /**
     * quan hệ của bảng cha
     */
    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }

    /**
     * quan hệ của bảng cha
     */
    public function brand(){
        return $this->belongsTo('App\Brand','brand_id','id');
    }

    /**
     * quan hệ của bảng con
     */
    public function images(){
        return $this->hasMany('App\Image','product_id','id');
    }
}
