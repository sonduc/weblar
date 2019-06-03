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
            <h1 class="text-center text-uppercase title-under">Đăng kí</h1>
        </div>
        <!-- /title -->     
        <div class="row">
            <div class="divider divider--md visible-sm visible-xs"></div>
            <section class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="login-form-box">
                    <h3 class="color small">Thông Tin</h3>
                    <p>
                        If you have an account with us, please log in.
                    </p>
                      <form action="{{ route('shop.post.register') }}" id="form-returning" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên<sup>*</sup></label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Số điện thoại<sup>*</sup></label>
                            <input type="number" class="form-control" name="mobile">
                        </div>
                        <div class="form-group">
                            <label for="email">Email<sup>*</sup></label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ<sup>*</sup></label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu <sup>*</sup></label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <button type="submit" class="btn btn--ys btn-top btn--xl"><span class="icon icon-vpn_key"></span>Đăng kí</button>                                   
                            </div>
                            <div class="divider divider--md visible-xs"></div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="pull-right note btn-top">* Bắt buộc</div>
                            </div>
                        </div>                                                  
                        <p class="btn-top">
                            <a class="link-color" href="#">Tạo tài khoản!</a>
                        </p>
                      </form>
                </div>
            </section>
        </div>                      
    </div>
</div>
<!-- End CONTENT section -->
@endsection
