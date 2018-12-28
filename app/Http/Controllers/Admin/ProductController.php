<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use App\Product;
use App\Brand;
use App\Category;
use App\Image;
use DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     *gọi đến view(giao diện)
     */
    public function index()
    {
        $categories = Category::all();
        $brands     = Brand::all();
        return view('admin.product.index',compact('categories','brands'));
    }

    /**
     * lấy dữ liệu từ model để đổ ra view
     * @return [type] [description]
     */
    public function anyData()
    {
        $products = Product::select('products.*', 'categories.name as category_name', 'brands.name as brand_name')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'products.category_id', '=', 'brands.id');
        return Datatables::of($products)
        ->addColumn('action', function ($product) {
            return'
            <a showImage="'. $product->id .'" class="btn btn-xs btn-info" id="imageProduct"><i class="icon-im icon-im-images"></i></a>
            <a show="'. $product->id .'" class="btn btn-xs btn-theme" id="showProduct"><i class="icon-im icon-im-eye"></i></a>
            <a edit="'. $product->id .'" class="btn btn-xs btn-success" id="editProduct"><i class="icon-fa icon-fa-pencil"></i></a>
            <a delete="'. $product->id .'" class="btn btn-xs btn-danger" id="deleteProduct"><i class="icon-ln icon-ln-trash"></i></a>
            ';
        })
        ->setRowId('tr-{{$id}}')
        ->editColumn('price', '{{ number_format($price)}}.VND')
        ->rawColumns(['status', 'action'])
        ->editColumn('status', function($product) {
            return $product->status == 0 ? 'Không nổi bật' : 'Nổi bật';
        })
        ->make(true);
    }

    /**
     * lấy id của đối tượng cha để lấy những dữ liệu của bảng quan hệ
     */
    public function showImage($id)
    {
        $image = Image::where('product_id', $id)->get();
        return $image;
    }

    /**
     * thêm dữ liệu của ảnh
     */
    public function storeImage(Request $request)
    {
        $data = array();
        if($files=$request->file('image')){
            foreach($files as $key =>$file){
                $temp = [];
                $temp['link'] = $file->store('images');
                $temp['product_id'] = $request['product_id'];
                $data[] = Image::create($temp);
            }

        }
        return response()->json($data);
    }
    /**
     * xóa ảnh dựa vào id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroyImage($id)
    {
        $image=DB::table('images')->find($id)->link;
        Storage::disk('local')->delete('public/'.$image);
        return DB::table('images')->where('id',$id)->delete();

    }

    /**
     *nhận dữ liệu từ request để thêm vào database
     *
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['code'] = "#".time();
        $data['slug'] = str_slug($request['name']);
        $product = Product::create($data);

        return response()->json(['data' => $product], 200);
    }

    /**
     * nhận id để lấy ra toàn bộ thông tin của đối tượng đó để sửa
     */
    public function edit($id)
    {
        return Product::find($id);
    }

    /**
     * nhận id và thông tin request để sửa đối tượng đó
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = str_slug($request['name']);
        Product::updateData($id, $data);
        $product = Product::find($id);
        return $product;
    }

    /**
     * lấy trường id và xóa đối tượng khỏi database
     */
    public function destroy($id)
    {
        return DB::table('products')->where('id',$id)->delete();
    }
}
