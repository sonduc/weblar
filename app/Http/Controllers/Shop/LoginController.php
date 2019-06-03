<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/shop';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('admin.guest')->except('logout');
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        // return view('admin.login');
        return view('shop.pages.loginShop');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        // $request->session()->invalidate();

        return redirect('/shop');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
