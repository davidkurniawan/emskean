<!-- <!DOCTYPE html> -->
<html>
    <head>
        <meta charset="utf-8" />
        <title>WMS - <?php echo strtoupper($this->uri->segment(1)) ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="robots" content="noindex,nofollow">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo ASSETS ?>images/favicon.ico">

        <script src="<?php echo ASSETS ?>js/jquery.min.js"></script>
        <!-- Plugins css-->
        <link href="<?php echo PLUGINS ?>bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="<?php echo PLUGINS ?>bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="<?php echo PLUGINS ?>select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo PLUGINS ?>switchery/switchery.min.css"/>

        <link href="<?php echo ASSETS ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS ?>css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS ?>css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo ASSETS ?>js/modernizr.min.js"></script>

    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <a href="<?php echo BASEURL ?>" class="logo">
                            <img src="<?php echo ASSETS ?>images/logo_sm.png" alt="" height="26" class="logo-small">
                            <img src="<?php echo ASSETS ?>images/logo.png" alt="" height="22" class="logo-large">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">


                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo ASSETS ?>images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name"><?php echo $this->session->userdata('email') ?> <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>
                                    <!-- item-->
                                    <a href="<?php echo BASEURL.'login/out' ?>" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="<?php echo BASEURL.'dashboard' ?>"><i class="icon-speedometer"></i>Dashboard</a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?php echo BASEURL.'banner' ?>"><i class="mdi mdi-image-filter"></i>Banner</a>
                            </li>  
                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-tshirt-v"></i>Product</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="<?php echo BASEURL.'product' ?>">Product</a></li>
                                            <li><a href="<?php echo BASEURL.'productkategori' ?>">Product Kategori</a></li>
                                            <li><a href="<?php echo BASEURL.'productsubkategori' ?>">Product Sub Kategori</a></li>
                                            <li><a href="<?php echo BASEURL.'productkatalog' ?>">Product Katalog</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li class="has-submenu">
                                <a href="#"><i class="fa fa-money"></i>Transaksi Orders</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo BASEURL.'transaksi/hariini' ?>">Transaksi Hari Ini</a></li>
                                    <li class="has-submenu">
                                        <a href="#">Histori Transaksi</a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo BASEURL.'transaksi/orders' ?>">Settle</a></li>
                                            <li><a href="<?php echo BASEURL.'transaksi/orders/pending' ?>">Pending</a></li>
                                            <li><a href="<?php echo BASEURL.'transaksi/orders/expired' ?>">Expired</a></li>
                                            <li><a href="<?php echo BASEURL.'transaksi/orders/manualtf' ?>">Manual TF(Cek Bukti TF)</a></li>
                                        <?php if ($this->session->userdata('flagAdmin') == 1): ?>    
                                            <li><a href="<?php echo BASEURL.'Transexport' ?>">Transaksi Export</a></li>
                                        <?php endif ?>
                                        </ul>
                                    </li>
                                    <?php if ($this->session->userdata('flagAdmin') == 1): ?>
                                        <li><a href="<?php echo BASEURL.'turnpayment' ?>">Turn OFF/ON Payment</a></li>
                                    <?php endif ?>
                                        <li><a href="<?php echo BASEURL.'transaksi/allcabang' ?>">Credit BiteShip</a></li>
                                </ul>
                            </li> -->
                            <!-- <li class="has-submenu">
                                <a href="#"><i class="fa fa-money"></i>Pengiriman</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo BASEURL.'pengiriman' ?>">Proses</a></li>
                                    <li><a href="<?php echo BASEURL.'pengiriman/sudahsampai' ?>">Sudah Sampai</a></li>
                                    <?php if ($this->session->userdata('flagAdmin') == 1): ?>
                                        <li><a href="<?php echo BASEURL.'eventdiary' ?>">Event Ambil Sendiri</a></li>
                                    <?php endif ?>
                                </ul>
                            </li> -->
                            <li class="has-submenu">
                                <a href="#"><i class="icon-briefcase"></i>Promotion</a>
                                <ul class="submenu ">
                                    <li class="has-submenu">
                                        <a href="#">Voucher</a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo BASEURL.'pemasaran/voucher' ?>">Voucher</a></li>
                                            <li><a href="<?php echo BASEURL.'pemasaran/historyvoucher' ?>">History Klaim Voucher</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">Produk Poin</a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo BASEURL.'pemasaran/produkpoin' ?>">Produk Poin</a></li>
                                            <li><a href="<?php echo BASEURL.'redeempoin' ?>">History/Redeem Poin</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo BASEURL.'claimreferral' ?>">Claim Referral</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="icon-briefcase"></i>News</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            
                                            <li><a href="<?php echo BASEURL.'news' ?>">News</a></li>
                                            <li><a href="<?php echo BASEURL.'newskategori' ?>">News Kategori</a></li>
                                            <li><a href="<?php echo BASEURL.'newssubkategori' ?>">News Sub Kategori</a></li>
                                            <li><a href="<?php echo BASEURL.'tag' ?>">Tag</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-image-filter"></i>Account</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            
                                            <li><a href="<?php echo BASEURL.'brand' ?>">Brand</a></li>
                                            <li><a href="<?php echo BASEURL.'administrator' ?>">Administrator</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>  
                        </ul>

                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
