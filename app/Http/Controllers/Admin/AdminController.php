<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Admin;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin.index');
    }

    public function anyData()
    {
        $admins = Admin::select('admins.*');
        return Datatables::of($admins)
        ->addColumn('action', function ($admin) {
            return'
            <a show="'. $admin->id .'" class="btn btn-xs btn-info" id="showAdmin"><i class="icon-im icon-im-eye"></i></a>
            <a edit="'. $admin->id .'" class="btn btn-xs btn-success" id="editAdmin"><i class="icon-fa icon-fa-pencil"></i></a>
            <a delete="'. $admin->id .'" class="btn btn-xs btn-danger" id="deleteAdmin"><i class="icon-ln icon-ln-trash"></i></a>
            ';
        })
        ->setRowId('tr-{{$id}}')
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['password'] = Hash::make($request['password']);
        $admin = Admin::create($data);
        return response()->json(['data' => $admin], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Admin::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['name'] = $request['name'];
        $data['password'] = Hash::make($request['password']);
        Admin::updateData($id, $data);
        $admin = Admin::find($id);
        return $admin;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('admins')->where('id',$id)->delete();
    }
}
