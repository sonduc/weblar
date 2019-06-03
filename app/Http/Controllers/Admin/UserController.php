<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    public function anyData()
    {
        $users = User::select('users.*');
        return Datatables::of($users)
        ->addColumn('action', function ($user) {
            return'
            <a show="'. $user->id .'" class="btn btn-xs btn-info" id="showUser"><i class="icon-im icon-im-eye"></i></a>
            <a edit="'. $user->id .'" class="btn btn-xs btn-success" id="editUser"><i class="icon-fa icon-fa-pencil"></i></a>
            <a delete="'. $user->id .'" class="btn btn-xs btn-danger" id="deleteUser"><i class="icon-ln icon-ln-trash"></i></a>
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
        $data['mobile'] = $request['mobile'];
        $data['email'] = $request['email'];
        $data['address'] = $request['address'];
        $data['password'] = Hash::make($request['password']);
        $user = User::create($data);
        return response()->json(['data' => $user], 200);
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
        return User::find($id);
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
        $data['mobile'] = $request['mobile'];
        $data['address'] = $request['address'];
        $data['name'] = $request['name'];
        //$data['password'] = Hash::make($request['password']);
        User::updateData($id, $data);
        $user = User::find($id);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('users')->where('id',$id)->delete();
    }
}
