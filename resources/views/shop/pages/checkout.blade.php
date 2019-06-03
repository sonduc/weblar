@extends('shop.layouts.index')
@section('content')
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb--ys pull-left">
            <li class="home-link"><a href="{{ route('shop.index') }}" class="icon icon-home"></a></li>
        </ol>
    </div>
</div>
<!-- /breadcrumbs -->
<!-- CONTENT section -->
<div id="pageContent">
    <div class="container">
        <!-- title -->
        <div class="title-box">
            <h1 class="text-center text-uppercase title-under">Checkout</h1>
        </div>
        <!-- /title -->
        <div class="row">
            <section class="col-md-8 col-lg-8">
                <!-- checkout-step -->
                <div class="panel-group" id="checkout">
                    <div class="panel panel-checkout" role="tablist">
                        <!-- panel heading -->
                        <div class="panel-heading active" role="tab">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapseOne">Thông tin cá nhân</a>
                            </h4>
                            <div class="panel-heading__number">1</div>
                        </div>
                        <!-- /panel heading -->
                        <!-- panel body -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                @guest
                                    <form  id="fromCheckUser" method="post" >
                                        @csrf
                                        <a class="pull-right link-functional" href="#">
                                            <span class="icon icon-create"></span>Edit
                                        </a>
                                        <div class="form-group">
                                            <label for="">Tên<sup>*</sup></label>
                                            <input type="text" class="form-control" id="nameUser">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email<sup>*</sup></label>
                                            <input type="email" class="form-control" id="emailUser">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Địa chỉ<sup>*</sup></label>
                                            <input type="text" class="form-control" id="addressUser">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số điện thoại<sup>*</sup></label>
                                            <input type="number" class="form-control" id="phoneUser">
                                        </div>

                                    </form>
                                @else
                                    {{-- <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                    </li> --}}

                                    <form  id="fromCheckUser" method="post" >
                                        @csrf
                                        <a class="pull-right link-functional" href="#">
                                            <span class="icon icon-create"></span>Edit
                                        </a>
                                        <div class="form-group">
                                            <label for="">Tên<sup>*</sup></label>
                                            <input type="text" class="form-control" id="nameUser" value="{{Auth::user()->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email<sup>*</sup></label>
                                            <input type="email" class="form-control" id="emailUser"  value="{{Auth::user()->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Địa chỉ<sup>*</sup></label>
                                            <input type="text" class="form-control" id="addressUser" value="{{Auth::user()->address}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số điện thoại<sup>*</sup></label>
                                            <input type="number" class="form-control" id="phoneUser" value="{{Auth::user()->mobile}}">
                                        </div>

                                    </form>
                                @endguest
                            
                            </div>
                        </div>
                        <!-- /panel body -->
                    </div>
                    <div class="panel panel-checkout" role="tablist">
                        <!-- panel heading -->
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapseFive">Thông tin đơn hàng</a>
                            </h4>
                            <div class="panel-heading__number">2</div>
                        </div>
                        <!-- /panel heading -->
                        <!-- panel body -->
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel">
                            <div class="panel-body">
                                <p class="clearfix">
                                    <a class="pull-right link-functional link-functional-bottom" href="#">
                                        <span class="icon icon-create"></span>Edit
                                    </a>
                                </p>
                                <div class="clearfix"></div>
                                <div class="btn-top">
                                    <!-- order-review-table -->
                                    <table class="order-review-table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Unit Price</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::content() as $row)
                                            <tr class="tr-checkout">
                                                <td>
                                                    <h5 class="order-review-table__product-name text-left text-uppercase">
                                                        <a href="product.html">{{$row->name}}</a>
                                                    </h5>
                                                </td>
                                                <td>
                                                    <div class="order-review-table__product-price unit-price">
                                                        {{ number_format($row->price)}}.VNĐ
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="color">{{$row->qty}}</span>
                                                </td>
                                                <td>
                                                    <div class="order-review-table__product-price subtotal">
                                                        {{ number_format($row->price*$row->qty)}}.VNĐ
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- /order-review-table -->
                                    <!-- order-review-total -->
                                    <div class="row clearfix">
                                        <div class="pull-right col-xl-6 col-lg-9 col-md-9 col-xs-12 btn-top">
                                            <div class="order-review-total">
                                                <table class="table-total">
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-left">Tổng số:</th>
                                                            <td class="text-right" id="totalCart1">{{Cart::total()}}.VNĐ</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left">Thuế:</th>
                                                            <td class="text-right" id="taxCart">{{Cart::tax()}}</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Tổng cộng:</th>
                                                            <td id="totalCart2">{{Cart::total()}}.VNĐ</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <p class="clearfix text-right">
                                                    <a id="form-user" class="btn btn--ys btn--xl">
                                                        Đặt hàng <span class="icon icon--flippedX icon-reply"></span>
                                                    </a>
                                                </p>
                                                <div class="text-right link-top">
                                                    <span class="color-dark">Forgot an Item?</span> <a class="link-underline" href="#">Edit Your Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /order-review-total -->
                                </div>
                            </div>
                        </div>
                        <!-- /panel body -->
                    </div>
                </div>
                <!-- /checkout-step -->
            </section>
            <aside class="col-md-4 col-lg-4 shopping_cart-aside">
                <!--  -->
                <div class="box-border box-border--padding fill-bg">
                    <h4 class="mega title-bottom1">YOUR CHECKOUT PROGRESS</h4>
                    <!--  -->
                    <div class="block-underline-top">
                        <a class="pull-right link-functional" href="#">Change</a>
                        <h6 class="small">BILLING ADDRESS</h6>
                        <ul class="categories-list">
                            <li><a href="#">Lorem ipsum dolor sit amet </a></li>
                            <li><a href="#">Conse ctetur adipisicing </a></li>
                            <li><a href="#">Elit sed do eiusmod tempor</a></li>
                            <li><a href="#">Incididunt ut labore </a></li>
                            <li><a href="#">Et dolore magna aliqua</a></li>
                        </ul>
                    </div>
                    <!-- / -->
                    <!--  -->
                    <div class="block-underline-top">
                        <a class="pull-right link-functional" href="#">Change</a>
                        <h6 class="small">SHIPPING ADDRESS</h6>
                        <ul class="categories-list">
                            <li><a href="#">Lorem ipsum dolor sit amet </a></li>
                            <li><a href="#">Conse ctetur adipisicing </a></li>
                            <li><a href="#">Elit sed do eiusmod tempor</a></li>
                            <li><a href="#">Incididunt ut labore </a></li>
                            <li><a href="#">Et dolore magna aliqua</a></li>
                        </ul>
                    </div>
                    <!-- / -->
                    <!--  -->
                    <div class="block-underline-top">
                        <a class="pull-right link-functional" href="#">Change</a>
                        <h6 class="small">SHIPPING METHOD</h6>
                        <ul class="categories-list">
                            <li><a href="#">Lorem ipsum dolor sit amet </a></li>
                        </ul>
                    </div>
                    <!-- / -->
                    <!--  -->
                    <div class="block-underline-top">
                        <a class="pull-right link-functional" href="#">Change</a>
                        <h6 class="small">PAYMENT METHOD</h6>
                        <ul class="categories-list">
                            <li><a href="#">Lorem ipsum dolor sit amet </a></li>
                        </ul>
                    </div>
                    <!-- / -->
                </div>
            </aside>
        </div>
    </div>
</div>
<!-- End CONTENT section -->
@endsection
