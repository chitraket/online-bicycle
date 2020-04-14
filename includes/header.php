<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include("includes/validation.php");
 ?>
<!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:19:45 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SKOTE - Bikes Shop</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <script src="assets/js/sweetalert.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    
    <!-- jquery UI css -->
    <link rel="stylesheet" href="assets/css/plugins/jqueryui.min.css">
    <link rel="stylesheet" href="assets/js/plugins/jquery.min.js">
    <link rel="stylesheet" href="assets/js/main.js">
    <link rel="stylesheet" href="assets/js/plugins/jqueryui.min.js">
    <link rel="stylesheet" href="assets/js/jquerys.min.js">
    <link rel="stylesheet" href="assets/js/bootstrap.min.js">
    <!-- main style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--sweet alert-->
    <script src="assets/js/sweetalert.min.js"></script>
</head>
<body>
<header class="header-area header-wide">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
            <div class="header-top bdr-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="welcome-message">
                                <p>
                                    <?php
                                    if(!isset($_SESSION['customer_email'])){ 
                                        echo "Welcome:Guest";
                                    }
                                    else{
                                        echo"Welcome: " .$_SESSION['customer_email']. "";
                                    }
                                    
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle area start -->
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="assets/img/logo/logo.png" alt="Brand Logo">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-6 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                     <nav class="desktop-menu">
                                        <ul>
                                            <li class="<?php if($active=='Home') echo"active"?>"><a href="index.php">Home <i class="fa fa-angle"></i></a>   
                                            </li>
                                            <li class="<?php if($active=='Shop') echo"active"?>"><a href="shop.php">Bikes<i class="fa fa-angle"></i></a>
                                            </li>
                                            <li class="<?php if($active=='Accessories') echo"active"?>"><a href="accessories.php">Accessories<i class="fa fa-angle"></i></a>
                                            </li>
                                            <li class="<?php if($active=='contact') echo"active"?>"><a href="contact.php">Contact us</a></li>
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-4">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                              <div class="header-search-container">
                                    
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li class="user-hover active">
                                            <a href="#">
                                                <i class="pe-7s-user "></i>
                                            </a>
                                            <ul class="dropdown-list">
                                                <?php 
                                                if(!isset($_SESSION['customer_email']))
                                                {
                                                    echo"
                                                <li><a href='customer/customer_login.php'>Login</a></li>
                                                <li><a href='register.php'>Register</a></li>
                                                ";
                                                }
                                                else{
                                                
                                                    echo"
                                                    <li><a href='customer/myaccount.php'>My Account</a></li>";
                                                    echo"
                                                    <li><a href='logout.php'>Log Out</a></li>";
                                                    
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="minicart-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <?php 

                                                $sno=1;
                                                $flag=0;
                                                foreach($_SESSION as $products)
                                                {
                                                    if(!is_array($products))
                                                    {
                                                        continue;
                                                    }
                                                    $flag=1;
                                                    ?>
                                                         <div class="notification"><?php echo $sno++ ?></div>
                                                        <?php 
                                                }

                                                if($flag==0)
                                                {
                                                    ?>
                                                         <div class="notification">0</div>
                                                        <?php
                                                }
                                                ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->

                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="index.php">
                                    <img src="assets/img/logo/logo.png" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="cart.php">
                                        <i class="pe-7s-shopbag"></i>
                                        <?php 

                                                $sno=1;
                                                $flag=0;
                                                foreach($_SESSION as $products)
                                                {
                                                    if(!is_array($products))
                                                    {
                                                        continue;
                                                    }
                                                    $flag=1;
                                                    ?>
                                                         <div class="notification"><?php echo $sno++ ?></div>
                                                        <?php 
                                                }

                                                if($flag==0)
                                                {
                                                    ?>
                                                         <div class="notification">0</div>
                                                        <?php
                                                }
                                                ?>
                                    </a>
                                </div>
                                <button class="mobile-menu-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
        <!-- mobile header end -->

        <!-- offcanvas mobile menu start -->
        <!-- off-canvas menu start -->
        <aside class="off-canvas-wrapper">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="pe-7s-close"></i>
                </div>

                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <!-- search box end -->

                    <!-- mobile menu start -->
                    <div class="mobile-navigation">

                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="index.php">Home</a>
                                </li>
                               
                                <li class="menu-item-has-children "><a href="shop.php">Bikes</a>
                                </li>

                                <li class="menu-item-has-children "><a href="accessories.php">Accessories</a>
                                </li>

                                <li><a href="contact.php">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->

                    <div class="mobile-settings">
                        <ul class="nav">
                            <li>
                                <div class="dropdown mobile-top-dropdown">
                                    <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="myaccount">
                                    <?php 
                                                if(!isset($_SESSION['customer_email']))
                                                {
                                                    echo"
                                                <a class='dropdown-item' href='customer/customer_login.php'>Login</a>
                                                <a class='dropdown-item' href='register.php'>Register</a>
                                                ";
                                                }
                                                else{
                                                
                                                    echo"
                                                    <a class='dropdown-item' href='customer/myaccount.php'>My Account</a>
                                                    <a class='dropdown-item' href='logout.php'>Log Out</a>";
                                                    
                                                }
                                                ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- offcanvas widget area start -->
                    <div class="offcanvas-widget-area">
                        <div class="off-canvas-contact-widget">
                            <ul>
                                <li><i class="fa fa-mobile"></i>
                                    <a href="#">+91 7984498992</a>
                                </li>
                                <li><i class="fa fa-envelope-o"></i>
                                    <a href="#">chitraketsavani@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                      <!--<div class="off-canvas-social-widget">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>-->
                    </div>
                    <!-- offcanvas widget area end -->
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
        <!-- offcanvas mobile menu end -->
    </header>