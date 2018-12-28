<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
                <li class="active">
                    <a href="#"><i class="icon-fa icon-fa-dashboard"></i> Dashboard <span
                            class="icon-fa arrow icon-fa-fw"></span> </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="active">
                            <a href="basic.html">Basic</a>
                        </li>
                        <li class="">
                            <a href="ecommerce.html">Ecommerce</a>
                        </li>
                        <li class="">
                            <a href="finance.html">Finance</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-th-large"></i> Layouts <span
                            class="icon-fa arrow icon-fa-fw"></span> </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="../layouts/sidebar.html">Sidebar</a>
                        </li>
                        <li class="">
                            <a href="../layouts/icon-sidebar.html">Icon Sidebar</a>
                        </li>
                        <li class="">
                            <a href="../layouts/horizontal-menu.html">Horizontal Menu</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-star"></i> Basic UI <span
                            class="icon-fa arrow icon-fa-fw"></span> </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="../basic-ui/buttons.html">Buttons</a>
                        </li>
                        <li class="">
                            <a href="../basic-ui/cards.html">Cards</a>
                        </li>
                        <li class="">
                            <a href="../basic-ui/tabs.html">Tabs &amp; Accordians</a>
                        </li>
                        <li class="">
                            <a href="../basic-ui/typography.html">Typography</a>
                        </li>
                        <li class="">
                            <a href="../basic-ui/tables.html">Tables</a>
                        </li>
                        <li class="">
                            <a href="../basic-ui/modals.html">Modals</a>
                        </li>
                        <li class="">
                            <a href="../basic-ui/progress-bars.html">Progress Bar</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-puzzle-piece"></i> Components <span
                            class="icon-fa arrow icon-fa-fw"></span> </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="../components/datatables.html">Datatables</a>
                        </li>
                        <li class="">
                            <a href="../components/notifications.html">Notifications</a>
                        </li>
                        <li class="">
                            <a href="../components/nestable-list.html"> Nestable List</a>
                        </li>
                        <li class="">
                            <a href="../components/nestable-tree.html">Nestable Tree</a>
                        </li>
                        <li class="">
                            <a href="../components/image-cropper.html">Image Cropper</a>
                        </li>
                        <li class="">
                            <a href="../components/zoom.html">Image Zoom</a>
                        </li>
                        <li class="">
                            <a href="../components/calendar.html">Calendar</a>
                        </li>
                        <li class="">
                            <a href="#">Rating<span class="icon-fa arrow icon-fa-fw"></span> </a>
                            <ul aria-expanded="true" class="collapse submenu">
                                <li class=""><a href="../components/ratings/star.html">Star Ratings</a></li>
                                <li class=""><a href="../components/ratings/bar.html">Bar Ratings</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-bar-chart"></i> Charts <span
                            class="icon-fa arrow icon-fa-fw"></span> </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="../charts/chartjs.html">Chart JS</a>
                        </li>
                        <li class="">
                            <a href="../charts/sparklines.html">Sparkline</a>
                        </li>
                        <li class="">
                            <a href="../charts/amcharts.html">AM Charts</a>
                        </li>
                        <li class="">
                            <a href="../charts/morris.html">Morris</a>
                        </li>
                        <li class="">
                            <a href="../charts/gauges.html">Gauges</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-eye"></i> Icons <span class="icon-fa arrow icon-fa-fw"></span>
                    </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="../icons/icomoon.html">IcoMoon</a>
                        </li>
                        <li class="">
                            <a href="../icons/evil.html">Evil Icons</a>
                        </li>
                        <li class="">
                            <a href="../icons/meteo.html">Meteo Icons</a>
                        </li>
                        <li class="">
                            <a href="../icons/line.html">Line Icons</a>
                        </li>
                        <li class="">
                            <a href="../icons/fps-line.html">FPS Line</a>
                        </li>
                        <li class="">
                            <a href="../icons/fontawesome.html">Font Awesome</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-rocket"></i> Forms <span
                            class="icon-fa arrow icon-fa-fw"></span> </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="../forms/general.html">General Elements</a>
                        </li>
                        <li class="">
                            <a href="../forms/advanced.html">Advanced Elements</a>
                        </li>
                        <li class="">
                            <a href="../forms/layouts.html">Form Layouts</a>
                        </li>
                        <li class="">
                            <a href="../forms/validation.html">Form Validation</a>
                        </li>
                        <li class="">
                            <a href="../forms/wizards.html">Form Wizard</a>
                        </li>
                        <li class="">
                            <a href="../forms/wizards-2.html">Form Wizard 2</a>
                        </li>
                        <li class="">
                            <a href="../forms/editors.html">Editors</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-image"></i> Gallery <span
                            class="icon-fa arrow icon-fa-fw"></span> </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="../gallery/grid.html">Gallery Grid</a>
                        </li>
                        <li class="">
                            <a href="../gallery/masonry-grid.html">Gallery Masonry Grid</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-file"></i> Pages <span
                            class="icon-fa arrow icon-fa-fw"></span> </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="../../login.html">Login</a>
                        </li>
                        <li class="">
                            <a href="../login-2.html">Login 2</a>
                        </li>
                        <li class="">
                            <a href="../login-3.html">Login 3</a>
                        </li>
                        <li class="">
                            <a href="../../register.html">Register</a>
                        </li>
                        <li class="">
                            <a href="../register-2.html">Register 2</a>
                        </li>
                        <li class="">
                            <a href="../register-3.html">Register 3</a>
                        </li>
                        <li class="">
                            <a href="../404.html">404 Page</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-user"></i> Users <span
                            class="icon-fa arrow icon-fa-fw"></span> </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="../users.html">All Users</a>
                        </li>
                        <li class="">
                            <a href="../users/1.html">User Profile</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="../todos.html"><i class="icon-fa icon-fa-check"></i> Todo App </a>
                </li>
                <li class="">
                    <a href="#"><i class="icon-fa icon-fa-cogs"></i> Settings <span
                            class="icon-fa arrow icon-fa-fw"></span> </a>
                    <ul aria-expanded="true" class="collapse">
                        <li class="">
                            <a href="../settings/social.html">Social</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-content" id="dashboardPage">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-3">
                <a class="dashbox" href="#">
                    <i class="icon-fa icon-fa-envelope text-primary"></i>
                    <span class="title">
                      35
                    </span>
                    <span class="desc">
                      Mails
                    </span>
                </a>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <a class="dashbox" href="#">
                    <i class="icon-fa icon-fa-ticket text-success"></i>
                    <span class="title">
                      200
                    </span>
                    <span class="desc">
                      Pending Tickets
                    </span>
                </a>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <a class="dashbox" href="#">
                    <i class="icon-fa icon-fa-shopping-cart text-danger"></i>
                    <span class="title">
                      100
                    </span>
                    <span class="desc">
                      New Orders
                    </span>
                </a>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <a class="dashbox" href="#">
                    <i class="icon-fa icon-fa-comments text-info"></i>
                    <span class="title">
                      59
                    </span>
                    <span class="desc">
                      Comments
                    </span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-6 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h6><i class="icon-fa icon-fa-line-chart text-warning"></i> Traffic Stats</h6>
                    </div>
                    <div class="card-block">
                        <line-chart :labels="['Jan','Feb','Mar','June']" :values="[20,30,40,60]"></line-chart>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h6><i class="icon-fa icon-fa-bar-chart text-success"></i> Sales Chart</h6>
                    </div>
                    <div class="card-block">
                        <bar-chart :labels="['Jan','Feb','Mar','June']" :values="[20,30,40,60]"></bar-chart>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-6 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h6><i class="icon-fa icon-fa-shopping-cart text-danger"></i> Recent Orders</h6>
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Walter White</td>
                                <td>05/12/2016</td>
                                <td>555$</td>
                                <td><a href="#" class="btn btn-default btn-xs">View</a></td>
                            </tr>
                            <tr>
                                <td>Hank Hill</td>
                                <td>05/12/2016</td>
                                <td>222$</td>
                                <td><a href="#" class="btn btn-default btn-xs">View</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h6><i class="icon-fa icon-fa-users text-info"></i> New Customers</h6>
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Walter White</td>
                                <td>05/12/2016</td>
                                <td>555$</td>
                                <td><a href="#" class="btn btn-default btn-xs">View</a></td>
                            </tr>
                            <tr>
                                <td>Hank Hill</td>
                                <td>05/12/2016</td>
                                <td>222$</td>
                                <td><a href="#" class="btn btn-default btn-xs">View</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="text-right">
            Powered by <a href="http://bytefury.com/" target="_blank">Bytefury</a>
        </div>
    </footer>
    <div class="skin-tools">
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
    </div>
</div>

<!-- START GLOBAL  SCRIPT -->
<script src="global/js/core/plugins.js"></script>
<script src="global/js/demo/skintools.js"></script>
<!-- END GLOBAL  SCRIPT -->

<!-- START PAGE  SCRIPT -->
<script src="plugins/Chartjs/Chart.js"></script>
<script src="global/js/core/app.js"></script>
<!-- END PAGE  SCRIPT -->
</body>
</html>
