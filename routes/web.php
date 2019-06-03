<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


Route::prefix('shop')->group(function (){
    Route::get('login', 'Shop\LoginController@showLoginForm')->name('shop.login');
    Route::post('login', 'Shop\LoginController@login')->name('shop.post.login');
    Route::post('logout', 'Shop\LoginController@logout')->name('shop.logout');

    Route::get('register', 'Shop\RegisterController@showRegistrationForm')->name('shop.register');
    Route::post('register', 'Shop\RegisterController@register')->name('shop.post.register');


    Route::get('/','Shop\ShopController@index')->name('shop.index');
    Route::get('modalDetail/{id}','Shop\ShopController@modalDetail')->name('shop.modalDetail');
    Route::get('product/{id}','Shop\ShopController@product')->name('shop.product');
    Route::post('postCart','Shop\ShopController@postCart')->name('shop.postCart');
    Route::get('cart','Shop\ShopController@cart')->name('shop.cart');
    Route::post('deleteDetail','Shop\ShopController@destroyDetail')->name('shop.deleteDetail');
    Route::post('destroyCart','Shop\ShopController@destroyCart')->name('shop.destroyDetail');
    Route::get('checkout','Shop\ShopController@getCheckout')->name('shop.getCheckout');
    Route::post('postCheckout','Shop\ShopController@postCheckout')->name('shop.postCheckout');
    Route::get('category/{id}','Shop\ShopController@category');
});
//
// Route::get('/', function () {
//     return view('shop.layouts.index');
// });
Route::get('/','Shop\ShopController@index')->name('shop.index');
//
Route::prefix('admin')->group(function(){
    // Category
    Route::get('categories/anyData','Admin\CategoryController@anyData')->name('category.anyData');
    Route::resource('categories','Admin\CategoryController');
    // Brand
    Route::get('brands/anyData','Admin\BrandController@anyData')->name('brand.anyData');
    Route::resource('brands','Admin\BrandController');
    // Product
    Route::get('products/anyData','Admin\ProductController@anyData')->name('product.anyData');
    Route::resource('products','Admin\ProductController');
    Route::get('products/showImage/{id}','Admin\ProductController@showImage')->name('product.showImage');
    Route::post('products/storeImage','Admin\ProductController@storeImage')->name('product.storeImage');
    Route::delete('products/deleteImage/{id}','Admin\ProductController@destroyImage')->name('product.deleteImage');
    // Admin
    Route::get('admins/anyData','Admin\AdminController@anyData')->name('admin.anyData');
    Route::resource('admins','Admin\AdminController');
    // User
    Route::get('users/anyData','Admin\UserController@anyData')->name('admin.anyData');
    Route::resource('users','Admin\UserController');
    // Order
    Route::get('orders/anyData','Admin\OrderController@anyData')->name('order.anyData');
    Route::resource('orders','Admin\OrderController');
    Route::get('order_details/anyData/{id}','Admin\OrderController@orderDetails');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
