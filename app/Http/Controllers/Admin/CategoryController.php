<?php
/**
 * created by phong
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use App\Category;
use DB;

class CategoryController extends Controller
{
    /**
     * gọi đến view(giao diện)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     *  lấy dữ liệu từ model để đổ ra view
     * @return [type] [description]
     */
    public function anyData()
    {
        $categories = Category::select('categories.*');
        return Datatables::of($categories)
        ->addColumn('action', function ($category) {
            return'
            <a edit="'. $category->id .'" class="btn btn-xs btn-success" id="editCategory"><i class="icon-fa icon-fa-pencil"></i></a>
            <a delete="'. $category->id .'" class="btn btn-xs btn-danger" id="deleteCategory"><i class="icon-ln icon-ln-trash"></i></a>
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
        $data['slug'] = str_slug($request['name']);
        $category = Category::create($data);

        return response()->json(['data' => $category], 200);
    }

    /**
     * nhận id để lấy ra toàn bộ thông tin của đối tượng đó để sửa
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Category::find($id);
    }

    /**
     *  nhận id và thông tin request để sửa đối tượng đó
     */
    public function update(Request $request, $id)
    {
        $data['name'] = $request['name'];
        $data['slug'] = str_slug($request['name']);
        Category::updateData($id, $data);
        $category = Category::find($id);
        return $category;
    }

    /**
     * lấy trường id và xóa đối tượng đó khỏi database
     */
    public function destroy($id)
    {
        return DB::table('categories')->where('id',$id)->delete();
    }
}
