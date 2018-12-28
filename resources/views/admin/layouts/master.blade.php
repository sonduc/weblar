<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Shop</title>
    <base href="{{ asset('') }}admin_assets/">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <script src="global/js/core/pace.js"></script>
    <!-- START CORE CSS-->
    <link href="global/css/laraspace.css" rel="stylesheet" type="text/css">
    <!-- END CORE CSS -->

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="ju0AJjtVlV2LnL9lhkK9fOpg7DhuaMFVgR1mifUv">

    <link rel="apple-touch-icon" sizes="57x57" href="global/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="global/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="global/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="global/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="global/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="global/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="global/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="global/img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="global/img/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="global/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="global/img/favicons/android-chrome-192x192.png"
          sizes="192x192">
    <link rel="icon" type="image/png" href="global/img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="global/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="global/img/favicons/manifest.json">
    <link rel="mask-icon" href="global/img/favicons/safari-pinned-tab.svg" color="#333333">
    <link rel="shortcut icon" href="global/img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="global/img/favicons/mstile-144x144.png">
    <meta name="msapplication-config" content="global/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#333333">
    <style type="text/css">
        .sizeImage{
          width: 100px;
          height: 55px;
        }
        .white{
          background-color: white;
        }
        .pink{
          background-color: #fcf8e3;
          color: #8a6d3b;
        }
        .green{
          background-color: #00a65a38;
          color: #3c763d;
        }
        .suaAnh{
          float: left;
          width:150px;
          height: 100px;
          border: 1px solid #80808052;
          margin-left: 10px;
          border-radius: 10px;
        }
        .inputImage{
          padding: 0;
          height: 24px;
          width: 74px;
        }
        .buttonImage{
          float: left;
          margin-left: 38px;
          border-radius: 5px;
          font-size: 13px;
          background: lightgray;
          border-color: lightgray;
        }
        .suaAnh2{
          float: left;
          width:100px;
          height: 50px;
        }
        #DsAnh{
          float: left;
          width: 100%;
        }
        #Detail_image{
          clear: both;
          float: left;
          width: 100%;
        }
        #add_image_new{
          float: left;
          width:85%;
          border-top: 1px solid rgba(0, 0, 0, 0.26);
          padding-top: 5px;
          margin-top: 25px;
          margin-left: 6%;
        }
        .icon-im-cross{
          float: left;
          margin-left: -25px;
          border: 1px solid;
          background: red;
          border-radius: 11px;
          color: black;
          display: none;
          cursor: pointer;
          width: 25px;
          padding-left: 4px;
        }
        #buttonDelete{
          margin-left: 5%;
          margin-top: -10px;
          margin-bottom: 10px;
          border-radius: 8px;
        }

    </style>
</head>
<body class="layout-default skin-default">

<div id="app" class="site-wrapper">
    <header class="site-header">
        <a href="#" class="brand-main">
            <img src="global/img/logo-desk.png" id="logo-desk" alt="Laraspace Logo" class="hidden-sm-down">
            <img src="global/img/logo-mobile.png" id="logo-mobile" alt="Laraspace Logo"
                 class="hidden-md-up">
        </a>
        <a href="#" class="nav-toggle">
            <div class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </div>
        </a>

        <ul class="action-list">
            <li>
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                        class="icon-fa icon-fa-plus"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="icon-fa icon-fa-edit"></i> New Post</a>
                    <a class="dropdown-item" href="#"><i class="icon-fa icon-fa-tag"></i> New Category</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="icon-fa icon-fa-star"></i> Separated link</a>
                </div>
            </li>
            <li>
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                        class="icon-fa icon-fa-bell"></i></a>
                <div class="dropdown-menu dropdown-menu-right notification-dropdown">
                    <h6 class="dropdown-header">Notifications</h6>
                    <a class="dropdown-item" href="#"><i class="icon-fa icon-fa-user"></i> New User was Registered</a>
                    <a class="dropdown-item" href="#"><i class="icon-fa icon-fa-comment"></i> A Comment has been posted.</a>
                </div>
            </li>
            <li>
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="avatar"><img
                        src="global/img/avatars/avatar.png" alt="Avatar"></a>
                <div class="dropdown-menu dropdown-menu-right notification-dropdown">
                    <a class="dropdown-item" href="../settings.html"><i class="icon-fa icon-fa-cogs"></i> Settings</a>
                    <a class="dropdown-item" href="../../login.html"><i class="icon-fa icon-fa-sign-out"></i> Logout</a>
                </div>
            </li>
        </ul>
    </header>
    <div class="mobile-menu-overlay"></div>
    <div class="sidebar-left " id="mobile-nav">
        <div class="sidebar-body scroll-pane">
            <ul class="side-nav metismenu" id="menu">
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-th-large"></i> <span
                            class="icon-fa arrow icon-fa-fw"></span> Danh mục </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="{{ route('categories.index') }}">Danh sách</a>
                        </li>

                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-star"></i> <span
                            class="icon-fa arrow icon-fa-fw"></span> Nhãn hiệu </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="{{ route('brands.index') }}">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-user"></i> <span
                            class="icon-fa arrow icon-fa-fw"></span> Admin </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="{{ route('admins.index') }}">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-product-hunt"></i> <span
                            class="icon-fa arrow icon-fa-fw"></span> Sản phẩm </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="{{ route('products.index') }}">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-sticky-note"></i> <span
                            class="icon-fa arrow icon-fa-fw"></span> Hóa đơn </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="{{ route('orders.index') }}">Danh sách</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-content" id="dashboardPage">
        {{-- layout content --}}
        @yield('content')
    </div>

    <footer class="site-footer">
        <div class="text-right">
            Powered by <a href="http://bytefury.com/" target="_blank">Bytefury</a>
        </div>
    </footer>
    {{-- <div class="skin-tools">
        <a class="skin-tools-action">
            <i class="icon-fa icon-fa-cog"></i>
        </a>
        <div class="skin-tools-content">
            <h5 class="mt-2">Select Skin</h5>
            <div class="row mt-md-4">
                <div class="col-sm-6 skin-item">
                    <a href="#" class="skin-radio active" data-skin="default" title="Skin - Default">
                        <img src="global/img/skins/skin-default.png" class="img-fluid">
                    </a>
                </div>
                <div class="col-sm-6 skin-item">
                    <a href="#" class="skin-radio" data-skin="tyrell" data-logo="white" title="Skin - Tyrell">
                        <img src="global/img/skins/skin-tyrell.png" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="row mt-md-4">
                <div class="col-sm-6 skin-item">
                    <a href="#" class="skin-radio" data-skin="arryn" data-logo="white" title="Skin - Arryn">
                        <img src="global/img/skins/skin-arryn.png" class="img-fluid">
                    </a>
                </div>
                <div class="col-sm-6 skin-item">
                    <a href="#" class="skin-radio" data-skin="lannister" data-logo="white" title="Skin - Lannister">
                        <img src="global/img/skins/skin-lannister.png" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="row mt-md-4">
                <div class="col-sm-6 skin-item">
                    <a href="#" class="skin-radio" data-skin="stark" title="Skin - Stark">
                        <img src="global/img/skins/skin-stark.png" class="img-fluid">
                    </a>
                </div>
                <div class="col-sm-6 skin-item">
                    <a href="#" class="skin-radio" data-skin="targaryen" title="Skin - Targaryen">
                        <img src="global/img/skins/skin-targaryen.png" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<!-- START GLOBAL  SCRIPT -->
<script src="global/js/core/plugins.js"></script>
<script src="global/js/demo/skintools.js"></script>
<!-- END GLOBAL  SCRIPT -->

<!-- START PAGE  SCRIPT -->
<script src="plugins/Chartjs/Chart.js"></script>
<script src="global/js/core/app.js"></script>
<script src="sweetalert.min.js"></script>
<!-- END PAGE  SCRIPT -->
<script src="ckeditor/ckeditor.js"></script>
<script>
    var path = "{{asset('')}}";
</script>
@yield('script')
</body>
</html>
