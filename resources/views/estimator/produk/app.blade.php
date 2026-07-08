<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/demo/favicon.png') }}">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pace.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <!-- CSS -->
    <link href="{{ asset('assets/vendors/material-icons/material-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/mono-social-icons/monosocialiconsfont.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/limonte-sweetalert2/6.6.4/sweetalert2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/magnific-popup.js/1.1.0/magnific-popup.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/mediaelement/4.1.3/mediaelementplayer.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/fonts.googleapis.com/css?family=Nunito+Sans:400,600,700') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/fonts.googleapis.com/css?family=Open+Sans:300,400,600') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/fontawesome.com/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/datatables/1.10.15/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    @stack('styles')
</head>

<body class="sidebar-light sidebar-expand">
    <div id="wrapper" class="wrapper">
        
        <nav class="navbar">
            <div class="navbar-header">
                <a href="{{ url('/estimator/index') }}" class="navbar-brand text-center">
                    <img class="logo-expand" alt="" src="{{ asset('assets/demo/logo-expand.png') }}" width="150" >
                    <img class="logo-collapse" alt="" src="{{ asset('assets/demo/logo-expand.png') }}" width="60" >
                </a>
            </div>
            
            <ul class="nav navbar-nav">
                <li class="sidebar-toggle">
                    <a href="javascript:void(0)" class="ripple"><i class="material-icons list-icon">menu</i></a>
                </li>
            </ul>
            
            <form class="navbar-search d-none d-md-block" role="search">
                <i class="material-icons list-icon">search</i> 
                <input type="text" class="search-query" placeholder="Search anything..."> 
                <a href="javascript:void(0);" class="remove-focus"><i class="material-icons">clear</i></a>
            </form>
            
            <div class="spacer"></div>
            
            <ul class="nav navbar-nav d-none d-lg-flex">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown">
                        <i class="material-icons list-icon">mail_outline</i> <span class="badge badge-pill bg-primary">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
                        <div class="card">
                            <header class="card-header">New messages <span class="mr-l-10 badge badge-border bg-primary">3</span></header>
                            <ul class="list-unstyled dropdown-list-group">
                                <li><a href="#" class="media"><span class="d-flex user--online thumb-xs"><img src="{{ asset('assets/demo/users/user3.jpg') }}" class="rounded-circle" alt=""> </span><span class="media-body"><span class="media-heading">Steve Smith</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">I slowly updated my Behance...</span></span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
            
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown">
                        <span class="avatar thumb-sm">
                            <img src="{{ asset('assets/demo/users/user-image.png') }}" class="rounded-circle" alt=""> 
                            <i class="material-icons list-icon">expand_more</i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-left dropdown-card dropdown-card-wide">
                        <div class="card">
                            <header class="card-heading-extra">
                                <div class="row">
                                    <div class="col-8">
                                        <h3 class="mr-b-10 sub-heading-font-family fw-300">Scott Adams</h3>
                                        <span class="user--online">Available <i class="material-icons list-icon">expand_more</i></span>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end">
                                        <a href="{{ url('/login') }}" class="mr-t-10"><i class="material-icons list-icon">power_settings_new</i> Logout</a>
                                    </div>
                                </div>
                            </header>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        
        <div class="content-wrapper">
            <aside class="site-sidebar scrollbar-enabled clearfix">
                <div class="side-user">
                    <a class="col-sm-12 media clearfix" href="javascript:void(0);">
                        <figure class="media-left media-middle user--online thumb-sm mr-r-10 mr-b-0">
                            <img src="{{ asset('assets/demo/users/user-image.png') }}" class="media-object rounded-circle" alt="">
                        </figure>
                        <div class="media-body hide-menu">
                            <h4 class="media-heading mr-b-5 text-uppercase">Scott Adams</h4>
                            <span class="user-type fs-12">Edit Profile (...)</span>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                </div>
                
                <nav class="sidebar-nav">
                    <ul class="nav in side-menu">
                        <li class="{{ Request::is('estimator/index') ? 'current-page' : '' }}">
                            <a href="{{ url('/estimator/index') }}" class="ripple">
                                <i class="list-icon material-icons" style="color: #47622A;">network_check</i> 
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        

                        <li>
                            <a href="{{ url('/estimator/bahan-baku') }}" class="ripple">
                                <i class="list-icon material-icons" style="color: #47622A;">layers</i> 
                                <span class="hide-menu">Bahan Baku</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('estimator.produk.index') }}" class="ripple">
                                <i class="list-icon material-icons" style="color: #47622A;">shopping_basket</i> 
                                <span class="hide-menu">Product</span>
                            </a>
                        </li>

                        
                    </ul>
                </nav>
            </aside>

            <main class="main-wrapper clearfix">
                @yield('content')
            </main>

        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/js/perfect-scrollbar.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
    $('#sampleTable').DataTable({
        "autoWidth": false,
        "responsive": true,   /* KITA AKTIFKAN LAGI BIAR IKUT CAMPUR LEBARNYA */
        "searching": true,        
        "bLengthChange": true 
    });
});
    </script>
</body>
</html>