<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include("includes/validation.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SKOTE - Bikes Shop</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <!-- main status css -->
    <link rel="stylesheet" href="../assets/css/status.css">
    <!--sweet alert-->
    <script src="assets/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js">
    </script>


    <style>
    div#load_screen {
        background: #00bbfe;
        opacity: 1;
        position: fixed;
        z-index: 10;
        top: 0px;
        width: 100%;
        height: 1600px;
    }

    div#load_screen>div#loading {
        color: #00bbfe;
        width: 400px;
        height: 400px;
        margin: 200px auto;
    }
    </style>

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
                                <a href="../home">
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
                                            <li class="<?php if($active=='Home') echo"active"?>"><a href="../home">Home
                                                    <i class="fa fa-angle"></i></a>
                                            </li>
                                            <li class="position-static <?php if($active=='Shop') echo"active"?>"><a
                                                    href="../bikes">Bikes<i class="fa fa-angle-down"></i></a>
                                                <ul class="megamenu dropdown">
                                                    <li class="mega-title"><span>Bikes Category</span>
                                                        <ul>
                                                            <?php
                                                            $select_category="select * from product_categories where p_cat_status='yes'";
                                                            $run_category=mysqli_query($con,$select_category);
                                                            while($row_category=mysqli_fetch_array($run_category))
                                                            {
                                                             ?>
                                                            <li><a
                                                                    href="../bikes_category-<?php echo base64_encode($row_category['p_cat_id']); ?>"><?php echo $row_category['p_cat_title']; ?></a>
                                                            </li>
                                                            <?php }?>

                                                        </ul>
                                                    </li>
                                                    <li class="mega-title"><span>Manufacturers</span>
                                                        <ul>
                                                            <?php
                                                            $select_manufacturer="select * from manufacturers where manufacturer_status='yes'";
                                                            $run_manufacturer=mysqli_query($con,$select_manufacturer);
                                                            while($row_manufacturer=mysqli_fetch_array($run_manufacturer))
                                                            {
                                                             ?>
                                                            <li><a
                                                                    href="../bikes_manufacturer-<?php echo base64_encode($row_manufacturer['manufacturer_id']); ?>"><?php echo $row_manufacturer['manufacturer_title']; ?></a>
                                                            </li>
                                                            <?php }?>
                                                        </ul>
                                                    </li>
                                                    <li class="megamenu-banners d-none d-lg-block">
                                                        <a href="../bikes">
                                                            <img src="assets/img/banner/img1.jpg" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="position-static <?php if($active=='Accessories') echo"active"?>">
                                                <a href="../accessories">Accessories<i class="fa fa-angle-down"></i></a>
                                                <ul class="megamenu dropdown">
                                                    <li class="mega-title"><span>Accessories Category</span>
                                                        <ul>
                                                            <?php
                                                            $select_accessories="select * from accessories_category where accessories_category_status='yes'";
                                                            $run_accessories=mysqli_query($con,$select_accessories);
                                                            while($row_accessories=mysqli_fetch_array($run_accessories))
                                                            {
                                                             ?>
                                                            <li><a
                                                                    href="../accessories_category-<?php echo base64_encode($row_accessories['accessories_category_id']); ?>"><?php echo $row_accessories['accessories_category']; ?></a>
                                                            </li>
                                                            <?php }?>

                                                        </ul>
                                                    </li>
                                                    <li class="mega-title"><span>Manufacturers</span>
                                                        <ul>
                                                            <?php
                                                            $select_manufacturers="select * from accessories_brand where accessories_brand_status='yes'";
                                                            $run_manufacturers=mysqli_query($con,$select_manufacturers);
                                                            while($row_manufacturers=mysqli_fetch_array($run_manufacturers))
                                                            {
                                                             ?>
                                                            <li><a
                                                                    href="../accessories_manufacturer-<?php echo base64_encode($row_manufacturers['accessories_brand_id']); ?>"><?php echo $row_manufacturers['accessories_brand']; ?></a>
                                                            </li>
                                                            <?php }?>
                                                        </ul>
                                                    </li>
                                                    <li class="megamenu-banners d-none d-lg-block">
                                                        <a href="../accessories">
                                                            <img src="assets/img/banner/Accessories-Banner.jpg" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="<?php if($active=='contact') echo"active"?>"><a
                                                    href="../contact">contact us<i class="fa fa-angle"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-4">
                            <div
                                class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
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
                                                <li><a href='../customer/login'>Login</a></li>
                                                <li><a href='../register'>Register</a></li>
                                                ";
                                                }
                                                else{
                                                
                                                    echo"
                                                    <li><a href='../customer/my-account'>My Account</a></li>";
                                                    echo"
                                                    <li><a href='../logout.php'>Log Out</a></li>";
                                                    
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <?php
                                        if(isset($_SESSION['customer_email']))
                                        { 
                                            $customer_emailss=$_SESSION['customer_email'];
                                            $select_wishlist="select * from  wishlist where customer_email='$customer_emailss' and status='yes'";
                                            $run_wishlist=mysqli_query($con,$select_wishlist);
                                            $num_wishlist=mysqli_num_rows($run_wishlist);
                                        ?>
                                        <li>
                                            <a href="../wishlist">
                                                <i class="pe-7s-like"></i>

                                                <div class="notification"><?php echo $num_wishlist; ?></div>
                                            </a>
                                        </li>
                                        <?php
                                        }
                                        else
                                        {

                                        }
                                        ?>
                                        <li>
                                            <a href="../compare">
                                                <i class="pe-7s-refresh-2"></i>
                                                <?php 

                                              if(isset($_SESSION['compare']))
                                              {
                                                  $count=count($_SESSION['compare'])
                                                    ?>
                                                <div class="notification"><?php echo $count ?></div>
                                                <?php 
                                                }
                                                else{
                                                    ?>
                                                <div class="notification">0</div>
                                                <?php
                                                }   
                                                ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="minicart-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <?php 

                                              if(isset($_SESSION['shopping_cart']))
                                              {
                                                  $count=count($_SESSION['shopping_cart'])
                                                    ?>
                                                <div class="notification"><?php echo $count ?></div>
                                                <?php 
                                                }
                                                else{
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
                                <a href="../home">
                                    <img src="assets/img/logo/logo.png" alt="Brand Logo">
                                </a>
                            </div>

                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <?php
                                        if(isset($_SESSION['customer_email']))
                                        { 
                                            $customer_emailsss=$_SESSION['customer_email'];
                                            $select_wishlists="select * from  wishlist where customer_email='$customer_emailsss' and status='yes'";
                                            $run_wishlists=mysqli_query($con,$select_wishlists);
                                            $num_wishlists=mysqli_num_rows($run_wishlists);
                                        
                                        ?>
                                    <a href="../wishlist">

                                        <i class="pe-7s-like"></i>
                                        <div class="notification"><?php echo $num_wishlists; ?></div>
                                    </a>
                                    <?php
                                        }
                                        else
                                        {

                                        } 
                                    ?>

                                    <a href="../compare" class="pl-2">
                                        <i class="pe-7s-refresh-2"></i>
                                        <?php 

                                              if(isset($_SESSION['compare']))
                                              {
                                                  $count=count($_SESSION['compare'])
                                                    ?>
                                        <div class="notification"><?php echo $count ?></div>
                                        <?php 
                                                }
                                                else{
                                                    ?>
                                        <div class="notification">0</div>
                                        <?php
                                                }   
                                                ?>
                                    </a>
                                    <a href="../cart" class="pl-2">
                                        <i class="pe-7s-shopbag"></i>
                                        <?php 

                                              if(isset($_SESSION['shopping_cart']))
                                              {
                                                  $count=count($_SESSION['shopping_cart'])
                                                    ?>
                                        <div class="notification"><?php echo $count ?></div>
                                        <?php 
                                                }
                                                else{
                                                    ?>
                                        <div class="notification">0</div>
                                        <?php
                                                }   
                                                ?>
                                    </a>


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
                                    <li class="menu-item-has-children"><a href="../home">Home</a>
                                    </li>

                                    <li class="menu-item-has-children "><a href="../bikes">Bikes</a>
                                    </li>

                                    <li class="menu-item-has-children "><a href="../accessories">Accessories</a>
                                    </li>
                                    <li class="menu-item-has-children "><a href="../contact">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->

                        <div class="mobile-settings">
                            <ul class="nav">
                                <li>
                                    <div class="dropdown mobile-top-dropdown">
                                        <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            My Account
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="myaccount">
                                            <?php 
                                                if(!isset($_SESSION['customer_email']))
                                                {
                                                    echo"
                                                <a class='dropdown-item' href='../customer/login'>Login</a>
                                                <a class='dropdown-item' href='../register'>Register</a>
                                                ";
                                                }
                                                else{
                                                
                                                    echo"
                                                    <a class='dropdown-item' href='../customer/my-account'>My Account</a>
                                                    <a class='dropdown-item' href='../logout.php'>Log Out</a>";
                                                    
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
                            <div class="off-canvas-social-widget">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                        <!-- offcanvas widget area end -->
                    </div>
                </div>
            </aside>
            <!-- off-canvas menu end -->
            <!-- offcanvas mobile menu end -->
    </header>