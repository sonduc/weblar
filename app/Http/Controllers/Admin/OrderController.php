<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use App\Order;
use App\Order_detail;
use DB;

class OrderController extends Controller
{
    /**
     * gọi đến view(giao diện)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.index');
    }

    /**
     * lấy dữ liệu từ model để đổ ra view
     * @return [type] [description]
     */
    public function anyData()
    {
        $orders = Order::select('orders.*');
        return Datatables::of($orders)
        ->addColumn('action', function ($order) {
            return'
            <a show="'. $order->id .'" class="btn btn-xs btn-info" id="showOrder"><i class="icon-im icon-im-eye"></i></a>
            ';
        })
        ->setRowId('tr-{{$id}}')
        ->editColumn('total', '{{ number_format($total)}}.VND')
        ->make(true);
    }

    /**
     * lấy dữ liệu từ model để đổ ra view (dựa vào id)
     */
    public function orderDetails($id)
    {
        $order = Order::find($id);
        $order_details = Order_detail::select('order_details.*', 'products.name as product_name', 'products.price as product_price')
        ->join('products', 'order_details.product_code', '=', 'products.code')
        ->where('order_details.order_code',$order->code)
        ->get();
        return response()->json(['data' => $order_details], 200);
        return Datatables::of($order_details)
        ->editColumn('product_price', '{{ number_format($product_price)}}.VND')
        ->editColumn('item_total', '{{ number_format($item_total)}}.VND')
        ->make(true);
    }

}
