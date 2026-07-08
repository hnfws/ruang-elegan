<?php
function singkatNominal($angka) {
    if ($angka >= 1000000000000) {
        $hasil = $angka / 1000000000000;
        return (floor($hasil) == $hasil ? $hasil : number_format($hasil, 1, ',', '.')) . ' T';
    } else if ($angka >= 1000000000) {
        $hasil = $angka / 1000000000;
        return (floor($hasil) == $hasil ? $hasil : number_format($hasil, 1, ',', '.')) . ' M';
    } else if ($angka >= 1000000) {
        $hasil = $angka / 1000000;
        return (floor($hasil) == $hasil ? $hasil : number_format($hasil, 1, ',', '.')) . 'jt';
    } else if ($angka >= 1000) {
        return number_format($angka / 1000, 0, ',', '.') . 'rb';
    }
    return number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="stylesheet" href="<?php echo e(asset('assets/css/pace.css')); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/demo/favicon.png')); ?>">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>
    <!-- CSS -->
    <link href="<?php echo e(asset('assets/vendors/material-icons/material-icons.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/vendors/mono-social-icons/monosocialiconsfont.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/sweetalert2.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/magnific-popup.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/mediaelementplayer.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/perfect-scrollbar.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/vendors/weather-icons-master/weather-icons.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/vendors/weather-icons-master/weather-icons-wind.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/bootstrap-daterangepicker.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/morris.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/slick.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/slick-theme.min.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
     <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body class="sidebar-light sidebar-expand">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <nav class="navbar">
            <!-- Logo Area -->
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand text-center">
                    <img class="logo-expand" alt="" src="<?php echo e(asset('assets/demo/logo-expand.png')); ?>" width="150" >
                    <img class="logo-collapse" alt="" src="<?php echo e(asset('assets/demo/logo-collapse.png')); ?>" width="60" >
                    <!-- <p>OSCAR</p> -->
                </a>
            </div>
            <!-- /.navbar-header -->
            <!-- Left Menu & Sidebar Toggle -->
            <ul class="nav navbar-nav">
                <li class="sidebar-toggle"><a href="javascript:void(0)" class="ripple"><i class="material-icons list-icon">menu</i></a>
                </li>
            </ul>
            <!-- /.navbar-left -->
            <!-- Search Form -->
            <form class="navbar-search d-none d-md-block" role="search"><i class="material-icons list-icon">search</i> 
                <input type="text" class="search-query" placeholder="Search anything..."> <a href="javascript:void(0);" class="remove-focus"><i class="material-icons">clear</i></a>
            </form>
            <!-- /.navbar-search -->
            <div class="spacer"></div>
            <!-- Right Menu -->
            <ul class="nav navbar-nav d-none d-lg-flex">
                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown"><i class="material-icons list-icon">mail_outline</i> <span class="badge badge-pill bg-primary">3</span></a>
                    <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
                        <div class="card">
                            <header class="card-header">New messages <span class="mr-l-10 badge badge-border bg-primary">3</span>
                            </header>
                            <ul class="list-unstyled dropdown-list-group">
                                <li><a href="#" class="media"><span class="d-flex user--online thumb-xs"><img src="<?php echo e(asset('assets/demo/users/user3.jpg')); ?>" class="rounded-circle" alt=""> </span><span class="media-body"><span class="media-heading">Steve Smith</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">I slowly updated my Behance with some recent projects ...</span></span></a>
                                </li>
                                <li><a href="#" class="media"><span class="d-flex user--offline thumb-xs"><img src="<?php echo e(asset('assets/demo/users/user6.jpg')); ?>" class="rounded-circle" alt=""> </span><span class="media-body"><span class="media-heading">Emily Lee</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">Hi John!</span></span></a>
                                </li>
                                <li><a href="#" class="media"><span class="d-flex user--online thumb-xs"><img src="<?php echo e(asset('assets/demo/users/user2.jpg')); ?>" class="rounded-circle" alt=""> </span><span class="media-body"><span class="media-heading">Christopher Palmer</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">Like the illustration and the indicator style. Best of luck ...</span></span></a>
                                </li>
                                <li><a href="#" class="media"><span class="d-flex user--online thumb-xs"><img src="<?php echo e(asset('assets/demo/users/user3.jpg')); ?>" class="rounded-circle" alt=""> </span><span class="media-body"><span class="media-heading">Steve Smith</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">I slowly updated my Behance with some recent projects ...</span></span></a>
                                </li>
                                <li><a href="#" class="media"><span class="d-flex user--offline thumb-xs"><img src="<?php echo e(asset('assets/demo/users/user6.jpg')); ?>" class="rounded-circle" alt=""> </span><span class="media-body"><span class="media-heading">Emily Lee</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">Hi John!</span></span></a>
                                </li>
                                <li><a href="#" class="media"><span class="d-flex user--offline thumb-xs"><img src="<?php echo e(asset('assets/demo/users/user2.jpg')); ?>" class="rounded-circle" alt=""> </span><span class="media-body"><span class="media-heading">Christopher Palmer</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">Like the illustration and the indicator style. Best of luck ...</span></span></a>
                                </li>
                            </ul>
                            <!-- /.dropdown-list-group -->
                        </div>
                        <!-- /.card-->
                    </div>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
    <a href="#" class="dropdown-toggle ripple" data-toggle="dropdown">
        <i class="material-icons list-icon">event_available</i> 
        <span class="badge badge-pill bg-success"><?php echo $total_notif; ?></span>
    </a>
    <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
        <div class="card">
            <header class="card-header">Approved Orders <span class="mr-l-10 badge badge-border bg-success"><?php echo $total_notif; ?></span>
            </header>
            <ul class="list-unstyled dropdown-list-group">
                <?php $__currentLoopData = $q_navbar_notif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="./quotation/index-quot.php" class="media">
                            <span class="d-flex text-success"><i class="material-icons list-icon">check_circle</i></span>
                            <span class="media-body">
                                <span class="media-heading">Quotation Approved!</span> 
                                <small>ID: #<?php echo e($notif->id_quotation); ?></small> 
                                <span class="media-content">Pesanan milik <strong><?php echo e($notif->nama); ?></strong> senilai Rp <?php echo e(number_format($notif->total_harga, 0, ',', '.')); ?> telah di-ACC.</span>
                            </span>
                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
        </div>
    </div>
</li>
                <!-- /.dropdown -->
                <li><a href="javascript:void(0);" class="right-sidebar-toggle ripple"><i class="material-icons list-icon">comment</i></a>
                </li>
            </ul>
            <!-- /.navbar-right -->
            <!-- User Image with Dropdown -->
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown"><span class="avatar thumb-sm"><img src="<?php echo e(asset('assets/demo/users/user-image.png')); ?>" class="rounded-circle" alt=""> <i class="material-icons list-icon">expand_more</i></span></a>
                    <div
                    class="dropdown-menu dropdown-left dropdown-card dropdown-card-wide">
                        <div class="card">
                            <header class="card-heading-extra">
                                <div class="row">
                                    <div class="col-8">
                                        <h3 class="mr-b-10 sub-heading-font-family fw-300">Scott Adams</h3><span class="user--online">Available <i class="material-icons list-icon">expand_more</i></span>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end"><a href="<?php echo e(url('/logout')); ?>" class="mr-t-10"><i class="material-icons list-icon">power_settings_new</i> Logout</a>
                                    </div>
                                    <!-- /.col-4 -->
                                </div>
                                <!-- /.row -->
                            </header>
                            <section class="card-header">New notif ications <span class="badge badge-border bg-danger mr-l-10">4</span>
                            </section>
                            <ul class="list-unstyled dropdown-list-group">
                                <li><a href="#" class="media"><span class="d-flex"><i class="material-icons list-icon">check</i> </span><span class="media-body"><span class="media-heading">Invitation accepted</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">Your invitation for Mars has been accepted ...</span></span></a>
                                </li>
                                <li><a href="#" class="media"><span class="d-flex user--online thumb-xs"><img src="<?php echo e(asset('assets/demo/users/user3.jpg')); ?>" class="rounded-circle" alt=""> </span><span class="media-body"><span class="media-heading">Steve Smith</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">I slowly updated my Behance with some recent projects and finally added a case study for thus great project ...</span></span></a>
                                </li>
                                <li><a href="#" class="media"><span class="d-flex"><i class="material-icons list-icon">event_available</i> </span><span class="media-body"><span class="media-heading">To Do</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">Meeting with Nathan McCullum on Friday 8 AM to discuss about an ongoing project ...</span></span></a>
                                </li>
                                <li><a href="#" class="media"><span class="d-flex"><i class="material-icons list-icon">check</i> </span><span class="media-body"><span class="media-heading">Invitation accepted</span> <small>10.14.2016 @ 2:30pm</small> <span class="media-content">Your invitation for Mars has been accepted ...</span></span></a>
                                </li>
                            </ul>
                        </div>
    </div>
    </li>
    </ul>
    <!-- /.navbar-right -->
    </nav>
    <!-- /.navbar -->
    <div class="content-wrapper">
        <!-- SIDEBAR -->
        <aside class="site-sidebar scrollbar-enabled clearfix">
            <!-- User Details -->
            <div class="side-user">
                <a class="col-sm-12 media clearfix" href="javascript:void(0);">
                    <figure class="media-left media-middle user--online thumb-sm mr-r-10 mr-b-0">
                        <img src="<?php echo e(asset('assets/demo/users/user-image.png')); ?>" class="media-object rounded-circle" alt="">
                    </figure>
                    <div class="media-body hide-menu">
                        <h4 class="media-heading mr-b-5 text-uppercase">Scott Adams</h4><span class="user-type fs-12">Edit Profile (...)</span>
                    </div>
                </a>
                <div class="clearfix"></div>
                <ul class="nav in side-menu">
                    <li><a href="page-profile.html"><i class="list-icon material-icons">face</i> My Profile</a>
                    </li>
                    <li><a href="app-inbox.html"><i class="list-icon material-icons">mail_outline</i> Inbox</a>
                    </li>
                    <li><a href="page-lock-screen.html"><i class="list-icon material-icons">settings</i> Lock Screen</a>
                    </li>
                    <li><a href="page-login.html"><i class="list-icon material-icons">settings_power</i> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.side-user -->
            <!-- Sidebar Menu -->
            <nav class="sidebar-nav">
                    <ul class="nav in side-menu">
                        <li class="current-page">
                            <a href="index.php" class="ripple">
                                <i class="list-icon material-icons" style="color: #47622A;">network_check</i> 
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        

                        <li>
                            <a href="<?php echo e(route('estimator.bahanbaku.index')); ?>" class="ripple">
                                <i class="list-icon material-icons" style="color: #47622A;">layers</i> 
                                <span class="hide-menu">Bahan Baku</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('estimator.produk.index')); ?>" class="ripple">
                                <i class="list-icon material-icons" style="color: #47622A;">shopping_basket</i> 
                                <span class="hide-menu">Product</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            <!-- /.sidebar-nav -->
        </aside>
        <!-- /.site-sidebar -->
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            
            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <!-- Chart and Map Widget -->
                <div class="row">
                    <div class="col-lg-3 col-sm-6 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <span class="text-muted text-uppercase h6 fw-700">Total Produk</span>
                                <section class="mb-5">
                                    <h3 class="m-0 sub-heading-font-family fw-300 float-left"><?php echo e($total_produk); ?></h3>
                                </section>
                                <div class="clearfix">
                                    <div class="sparklineChart" id="sparklinedash"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.widget-holder -->
                    <div class="col-lg-3 col-sm-6 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix"><span class="text-muted text-uppercase h6 fw-700">Defective Products</span>
                                <section class="mb-5">
                                    <h3 class="m-0 sub-heading-font-family fw-300 float-left">36&#37;</h3><span class="badge badge-pill badge-danger my-2 float-right"><span class="mr-1 fs-12">8&#37;</span>  <i class="material-icons list-icons fs-12">arrow_drop_down</i>
                                    </span>
                                </section>
                                <div class="clearfix">
                                    <div class="sparklineChart" id="sparklinedash2"></div>
                                </div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <div class="col-lg-3 col-sm-6 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <span class="text-muted text-uppercase h6 fw-700">Quotation Di-ACC</span>
                                <section class="mb-5">
                                    <h3 class="m-0 sub-heading-font-family fw-300 float-left"><?php echo e($total_acc); ?></h3>
                                </section>
                                <div class="clearfix">
                                    <div class="sparklineChart" id="sparklinedash3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.widget-holder -->
                    <div class="col-lg-3 col-sm-6 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <span class="text-muted text-uppercase h6 fw-700">Total Penjualan (ACC)</span>
                                <section >
<p class="w-value"><span class="pd-r-5">Rp</span><?php echo e(singkatNominal($total_sales)); ?></p>                                <div class="clearfix">
                                    <div class="sparklineChart" id="sparklinedash4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
                <!-- Contact, Pricing and Table Widgets -->
                <div class="row">
                    <div class="col-md-8 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title">Product Sales</h5>
                                <div id="movingLineFlot" style="height:400px"></div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <div class="col-md-4 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title">Order Status</h5>
                                <div style="height: 270px">
                                    <canvas id="chartJsDoughnutDemo"></canvas>
                                </div>
                                <ul class="list-inline mt-4 text-center">
                                    <li class="list-inline-item">
                                        <h5 class="text-muted h6 mr-3"><i class="fa fa-circle" style="color: #38d57a"></i>&nbsp;&nbsp;Draft</h5>
                                        <h4 class="mb-0"><?php echo e($status_data['draft']); ?></h4>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="text-muted h6 mr-3"><i class="fa fa-circle" style="color: #fb9678"></i>&nbsp;&nbsp;Sent</h5>
                                        <h4 class="mb-0"><?php echo e($status_data['sent']); ?></h4>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="text-muted h6"><i class="fa fa-circle" style="color: #8DA432"></i>&nbsp;&nbsp;ACC</h5>
                                        <h4 class="mb-0"><?php echo e($status_data['acc']); ?></h4>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
                <!-- Chart Group -->
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title">Product Gallery</h5>
                                <div class="row">
                                    <?php if($q_galeri_produk->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $q_galeri_produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4">
                                        <div class="text-center user-card">
                                            <figure class="user-card-hover-social">
                                    <?php if(!empty($prod->desain)): ?>
                        <?php 
                            // Mengambil nama file dengan menghilangkan string "uploads/desain/"
                            $nama_file = str_replace("uploads/desain/", "", $prod->desain); 
                        ?>
                                        <img src="<?php echo e(asset('quotation/uploads/desain/' . htmlspecialchars($nama_file))); ?>" 
                                            onerror="this.src='<?php echo e(asset('assets/demo/e-commerce/1.jpg')); ?>';" alt="" style="width: 100%; height: 250px; object-fit: cover;">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/demo/e-commerce/1.jpg')); ?>" alt="" style="width: 100%; height: 250px; object-fit: cover;">
                                    <?php endif; ?>
                                    
                                    <ul class="social-icons-list list-inline">
                                        <li class="list-inline-item"><a href="#" class="btn btn-outline-inverse"><i class="list-icon material-icons fs-22">shopping_cart</i></a></li>
                                    </ul>
                                </figure>
                                            <div class="user-card-details">
                                                <h4><?php echo e($prod->nama_bentuk); ?></h4>
                                                <a href="#"><span class="user-role badge badge-pill bg-color-scheme">Details</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <div class="col-12 text-center"><p class="text-muted">Belum ada data produk di database.</p></div>
                                    <?php endif; ?>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.user -->
                <!-- Weather and Knob Widget -->
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title">More Products</h5>
                                <div class="row">
                                    <?php if($q_more_produk && $q_more_produk->isNotEmpty()): ?>
            <?php $__currentLoopData = $q_more_produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $masonry_class = ($loop->iteration % 2 == 0) ? "user-card user-card-masonry user-card-masonry-up" : "user-card user-card-masonry";
                ?>
                                    <div class="col-md-3">
                                        <div class="<?php echo $masonry_class; ?>">
                                            
<?php if($loop->iteration % 2 != 0): ?>
                                                <figure>
                                                    <img src="<?php echo e(asset('assets/demo/e-commerce/produk_' . $m_prod->id_produk . '.jpg')); ?>" 
                                                        onerror="this.src='<?php echo e(asset('assets/demo/e-commerce/6.jpg')); ?>';" alt="">
                                                </figure>
                                            <?php endif; ?>

                                            <div class="user-card-details">
                                                <h4><?php echo e($m_prod->nama_bentuk); ?></h4>
                                                <span class="user-role">Rp <?php echo e(number_format($m_prod->harga_jual, 0, ',', '.')); ?></span>
                                                <ul class="social-icons-list list-inline mt-1">
                                                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-outline-inverse"><i class="list-icon material-icons fs-22">shopping_cart</i></a></li>
                                                </ul>
                                            </div>

                                            <?php if($loop->iteration % 2 == 0): ?> // Item Genap ?>
                                                <figure>
                                                    <img src="<?php echo e(asset('assets/demo/e-commerce/produk_' . $m_prod->id_produk . '.jpg')); ?>" 
                                                        onerror="this.src='<?php echo e(asset('assets/demo/e-commerce/3.jpg')); ?>';" alt="">
                                                </figure>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?> 
                                    
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.widget-list -->
        </main>
        <!-- /.main-wrappper -->
        <!-- RIGHT SIDEBAR -->
        <aside class="right-sidebar scrollbar-enabled">
            <div class="sidebar-chat" data-plugin="chat-sidebar">
                <div class="sidebar-chat-info">
                    <h3>Chat</h3>
                    <p class="text-muted">You can chat with your family and friends in this space.</p>
                </div>
                <div class="chat-list">
                    <h6 class="sidebar-chat-subtitle">Online</h6>
                    <div class="list-group row">
                        <a href="javascript:void(0)" class="list-group-item user--online thumb-xs" data-chat-user="Julein Renvoye">
                            <img src="<?php echo e(asset('assets/demo/users/user1.jpg')); ?>" class="rounded-circle" alt=""> <span class="name">Julien Renvoye</span>  <span class="username">@jrenvoye</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--online thumb-xs" data-chat-user="Eddie Lebanovkiy">
                            <img src="<?php echo e(asset('assets/demo/users/user2.jpg')); ?>" class="rounded-circle" alt=""> <span class="name">Eddie Lebanovskiy</span>  <span class="username">@elebano</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--away thumb-xs" data-chat-user="Cameron Moll">
                            <img src="<?php echo e(asset('assets/demo/users/user3.jpg')); ?>" class="rounded-circle" alt=""> <span class="name">Cameron Moll</span>  <span class="username">@cammoll</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--busy thumb-xs" data-chat-user="Bill S Kenny">
                            <img src="<?php echo e(asset('assets/demo/users/user7.jpg')); ?>" class="rounded-circle" alt=""> <span class="name">Bill S Kenny</span>  <span class="username">@billsk</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--busy thumb-xs" data-chat-user="Trent Walton">
                            <img src="<?php echo e(asset('assets/demo/users/user6.jpg')); ?>" class="rounded-circle" alt=""> <span class="name">Trent Walton</span>  <span class="username">@trentwalton</span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.chat-list -->
                <div class="chat-list">
                    <h6 class="sidebar-chat-subtitle">Offline</h6>
                    <div class="list-group row">
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Julien Renvoye">
                            <img src="<?php echo e(asset('assets/demo/users/user1.jpg')); ?>" class="rounded-circle" alt=""> <span class="name">Julien Renvoye</span>  <span class="username">@jrenvoye</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Eddie Lebaovskiy">
                            <img src="<?php echo e(asset('assets/demo/users/user2.jpg')); ?>" class="rounded-circle" alt=""> <span class="name">Eddie Lebanovskiy</span>  <span class="username">@elebano</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Cameron Moll">
                            <img src="<?php echo e(asset('assets/demo/users/user3.jpg')); ?>" class="rounded-circle" alt=""> <span class="name">Cameron Moll</span>  <span class="username">@cammoll</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Bill S Kenny">
                            <img src="<?php echo e(asset('assets/demo/users/user7.jpg')); ?>" class="rounded-circle" alt=""> <span class="name">Bill S Kenny</span>  <span class="username">@billsk</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Trent Walton">
                            <img src="<?php echo e(asset('assets/demo/users/user6.jpg')); ?>" class="rounded-circle" alt=""> <span class="name">Trent Walton</span>  <span class="username">@trentwalton</span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.chat-list -->
            </div>
            <!-- /.sidebar-chat -->
        </aside>
        <!-- CHAT PANEL -->
        <div class="chat-panel" hidden>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="minimize" aria-label="Minimize"><span aria-hidden="true"><i class="material-icons">expand_more</i></span>
                    </button> <span class="user-name">John Doe</span>
                </div>
                <!-- /.card-header -->
                <div class="card-block custom-scroll">
                    <div class="messages custom-scroll-content scrollbar-enabled">
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="<?php echo e(asset('assets/demo/users/user1.jpg')); ?>" alt="">
                            <div class="message">
                                <p>Lorem ipsum dolor sit amet?</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="other-user-message">
                            <img class="user-image" width="30" height="30" src="<?php echo e(asset('assets/demo/users/user2.jpg')); ?>" alt="">
                            <div class="message">
                                <p>Etiam rhoncus. Maecenas tempus, tellus eget condi mentum rhoncus</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.other-user-message -->
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="<?php echo e(asset('assets/demo/users/user1.jpg')); ?>" alt="">
                            <div class="message">
                                <img src="<?php echo e(asset('assets/demo/chat-message.jpg')); ?>" alt=""> <small>10:00 am</small>
                            </div>
                            <!-- .,message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="<?php echo e(asset('assets/demo/users/user1.jpg')); ?>" alt="">
                            <div class="message">
                                <p>Maecenas nec odio et ante tincidunt tempus.</p><small>10:00 am</small>
                            </div>
                            <!-- .,message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="other-user-message">
                            <img class="user-image" width="30" height="30" src="<?php echo e(asset('assets/demo/users/user2.jpg')); ?>" alt="">
                            <div class="message">
                                <p>Donec sodales :)</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.other-user-message -->
                    </div>
                    <!-- /.messages -->
                    <li class="dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown">
        <i class="material-icons list-icon">mail_outline</i> 
        <span class="badge badge-pill bg-primary"><?php echo $total_messages; ?></span>
    </a>
    <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
        <div class="card">
            <header class="card-header">New Quotations <span class="mr-l-10 badge badge-border bg-primary"><?php echo $total_messages; ?></span>
            </header>
            <ul class="list-unstyled dropdown-list-group">
 <?php $__currentLoopData = $recent_quotations ?? $data ?? $quotation ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $row = (array) $row; ?>
    <tr>
        <td>#QT-<?php echo e(str_pad($row['id_quotation'], 4, '0', STR_PAD_LEFT)); ?></td>
        <td><?php echo e($row['nama']); ?></td>
        <td><?php echo e(date('d M Y', strtotime($row['tgl_dibuat']))); ?></td>
        <td>Rp <?php echo e(number_format($row['total_harga'], 0, ',', '.')); ?></td>
        <td>
            <span class="badge <?php echo e($row['status'] == 'acc' ? 'bg-success' : ($row['status'] == 'draft' ? 'bg-warning' : 'bg-secondary')); ?>">
                <?php echo e(strtoupper($row['status'])); ?>

            </span>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</li>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.chat-panel -->
    </div>
    <!-- /.content-wrapper -->
    <!-- FOOTER -->
    </div>
    <!--/ #wrapper -->
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.77/jquery.form-validator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.1.3/mediaelementplayer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/js/perfect-scrollbar.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script src="<?php echo e(asset('assets/vendors/charts/utils.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <script src="<?php echo e(asset('assets/vendors/charts/excanvas.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mithril/1.1.1/mithril.js"></script>
    <script src="<?php echo e(asset('assets/vendors/theme-widgets/widgets.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clndr/1.4.7/clndr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.time.min.js"></script>
    <script src="<?php echo e(asset('assets/js/theme.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    <script>
$(document).ready(function() {
    // 1. Memasukkan data PHP ke dalam Grafik Lingkaran (Chart.js)
    var ctx = document.getElementById("chartJsDoughnutDemo");
    if (ctx) {
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Draft", "Sent", "ACC", "Rejected"],
                datasets: [{
                    data: [
                        <?php echo e($status_data['draft']); ?>, 
                        <?php echo e($status_data['sent']); ?>, 
                        <?php echo e($status_data['acc']); ?>, 
                        <?php echo e($status_data['rejected']); ?>

                    ],
                    backgroundColor: ["#38d57a", "#fb9678", "#8DA432", "#ff4f5e"]
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    }

    // 2. Memasukkan data PHP ke dalam Grafik Garis Penjualan (Flot Chart)
    var flotDiv = document.getElementById("movingLineFlot");
    if (flotDiv) {
    var salesData = [ <?php echo $js_sales_data; ?> ];
        $.plot("#movingLineFlot", [ { data: salesData, color: "#8DA432" } ], {
            series: { 
                lines: { show: true, fill: true, fillColor: "rgba(141, 164, 50, 0.08)" }, 
                points: { show: true } 
            },
            grid: { hoverable: true, clickable: true, borderWidth: 0, color: "rgba(120,120,120,0.5)" },
            xaxis: { mode: "time", timeformat: "%Y-%m-%d", timezone: "browser" }
        });
    }
});
</script>
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/estimator/index.blade.php ENDPATH**/ ?>