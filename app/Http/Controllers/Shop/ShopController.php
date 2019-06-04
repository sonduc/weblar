<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Image;
use App\Order;
use App\Order_detail;
use App\Category;
use App\Brand;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    public function sql()
    {
        $url = parse_url(getenv('DATABASE_URL'));

        $host = $url["host"]?? null;
        $username = $url["user"]?? null;
        $password = $url["pass"]?? null;
        $database = substr($url["path"],1)?? null;
        dd("host-".$host,"username-".$username,"password-".$password,"database-".$database);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('shop.pages.home',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product($id)
    {
        $product = Product::find($id);
        $images = DB::table('images')->where('product_id',$product->id)->get();
        return view('shop.pages.product',compact('product','images'));
    }

    public function cart()
    {
        return view('shop.pages.cart');
    }

    public function postCart(Request $request)
    {
        // dd($request);
        $cart = Cart::add(
            $request['id'], $request['name'],$request['quantity'], $request['price'],['image' => $request->image,'product_code' => $request->product_code]);
        return $cart;
    }

    public function destroyDetail(Request $request)
    {

        $rowId = $request->input('rowID');
        $cart = Cart::remove($rowId);

        return response()->json($request->rowId);
    }

    public function destroyCart()
    {
        return Cart::destroy();
    }
    public function getCheckout()
    {
        return view('shop.pages.checkout');
    }

    public function postCheckout(Request $request)
    {
        // dd(Cart::content());
        $arrBill['code'] = "#".time();
        $arrBill['customer_name'] = $request->name;
        $arrBill['email'] = $request->email;
        $arrBill['address'] = $request->address;
        $arrBill['mobile'] = $request->phone_number;

        $str = str_replace(',', '', Cart::total());

        $arrBill['total'] = floatval($str);
        $bill = Order::create($arrBill);

        $bill_details = Cart::content();
        foreach ($bill_details as $bill_detail) {
            $arrDeatil['quantity'] = $bill_detail->qty;
            $arrDeatil['item_total'] = $bill_detail->price;
            $arrDeatil['order_code'] = $bill->code;
            $arrDeatil['product_code'] = $bill_detail->options->product_code;
            Order_detail::create($arrDeatil);
        }

        return Cart::destroy();

    }

    public function category($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id',$id)->get();
        $brands   = Brand::where('category_id',$id)->get();
        return view('shop.pages.category',compact('category','products','brands'));
    }
}
