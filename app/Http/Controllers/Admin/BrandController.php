<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use App\Brand;
use App\Category;
use DB;

class BrandController extends Controller
{
    /**
     * gọi đến view(giao diện)
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.brand.index',compact('categories'));
    }

    /**
     * lấy dữ liệu từ model để đổ ra view
     * @return [type] [description]
     */
    public function anyData()
    {

        $brands = Brand::select('brands.*', 'categories.name as category_name')
        ->join('categories', 'brands.category_id', '=', 'categories.id');
        return Datatables::of($brands)
        ->addColumn('action', function ($brand) {
            return'
            <a show="'. $brand->id .'" class="btn btn-xs btn-info" id="showBrand"><i class="icon-im icon-im-eye"></i></a>
            <a edit="'. $brand->id .'" class="btn btn-xs btn-success" id="editBrand"><i class="icon-fa icon-fa-pencil"></i></a>
            <a delete="'. $brand->id .'" class="btn btn-xs btn-danger" id="deleteBrand"><i class="icon-ln icon-ln-trash"></i></a>
            ';
        })
        ->setRowId('tr-{{$id}}')
        ->make(true);
    }

    /**
     * nhận dữ liệu từ request để thêm vào database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['name'] = $request['name'];
        $data['category_id'] = $request['category_id'];
        $data['slug'] = str_slug($request['name']);
        $brand = Brand::create($data);

        return response()->json(['data' => $brand], 200);
    }

    /**
     * nhận id để lấy ra toàn bộ thông tin của đối tượng đó để sửa
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Brand::find($id);
    }

    /**
     * nhận id và thông tin request để sửa đối tượng đó
     */
    public function update(Request $request, $id)
    {
        $data['name'] = $request['name'];
        $data['category_id'] = $request['category_id'];
        $data['slug'] = str_slug($request['name']);
        brand::updateData($id, $data);
        $brand = brand::find($id);
        return $brand;
    }

    /**
     * lấy trường id và xóa đối tượng khỏi database
     */
    public function destroy($id)
    {
        return DB::table('brands')->where('id',$id)->delete();
    }
}
