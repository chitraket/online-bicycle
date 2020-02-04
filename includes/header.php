<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include("includes/validation.php");
 ?>
<?php
if(isset($_GET['pro_id']))
{
    $product_id=$_GET['pro_id'];
    $get_product="select * from products where product_id=$product_id";
    $run_product=mysqli_query($con,$get_product);
    $row_product=mysqli_fetch_array($run_product);
    $p_cat_id=$row_product['p_cat_id'];
    $pro_title=$row_product['product_title'];
    $pro_qty=$row_product['available_qty'];
    $pro_price=$row_product['product_price'];
    $pro_desc=$row_product['product_desc'];
    $pro_img1=$row_product['product_img1'];
    $pro_img2=$row_product['product_img2'];
    $pro_img3=$row_product['product_img3'];
    
   $pro_size=$row_product['product_size'];
    if($pro_size==null )
    {
        $pro_size="N/A";
    }
    else
    {
        $pro_size=$row_product['product_size'];
    }
    $pro_frame=$row_product['product_frame'];
    if($pro_frame==null )
    {
        $pro_frame="N/A";
    }
    else
    {
        $pro_frame=$row_product['product_frame'];
    }

    $pro_weight=$row_product['product_weight'];
    if($pro_weight==null)
    {
        $pro_weight="N/A";
    }
    else
    {
        $pro_weight=$row_product['product_weight'];
    }
    $pro_front_suspension=$row_product['product_front_suspension'];
    if($pro_front_suspension==null)
    {
        $pro_front_suspension="N/A";
    }
    else
    {
        $pro_front_suspension=$row_product['product_front_suspension'];
    }
    $pro_rear_suspension=$row_product['product_rear_suspension'];
    if($pro_rear_suspension==null)
    {
        $pro_rear_suspension="N/A";
    }else{
        $pro_rear_suspension=$row_product['product_rear_suspension'];
    }
    $pro_front_derailleur=$row_product['product_front_derailleur'];
    if($pro_front_suspension==null)
    {
        $pro_front_suspension="N/A";
    }
    else{
        $pro_front_derailleur=$row_product['product_front_derailleur'];
    }
    $pro_rear_derailleur=$row_product['product_rear_derailleur'];
    if($pro_rear_derailleur==null)
    {
        $pro_rear_derailleur="N/A";
    }
    else{
        $pro_rear_derailleur=$row_product['product_rear_derailleur'];
    }
    $pro_wheels=$row_product['product_wheels'];
    if($pro_wheels==null)
    {
        $pro_wheels="N/A";
    }
    else{
        $pro_wheels=$row_product['product_wheels'];
    }
    $pro_tires=$row_product['product_tires'];
    if($pro_tires==null)
    {
        $pro_tires="N/A";
    }else{
        $pro_tires=$row_product['product_tires'];
    }
    $pro_shifter=$row_product['product_shifter'];
    if($pro_shifter==null)
    {
        $pro_shifter="N/A";
    }
    else
    {
        $pro_shifter=$row_product['product_shifter'];
    }
    $pro_crankset=$row_product['product_crankset'];
    if($pro_crankset==null)
    {
        $pro_crankset="N/A";
    }
    else{
        $pro_crankset=$row_product['product_crankset'];
    }
    $pro_freewheels=$row_product['product_freewheels'];
    if($pro_freewheels==null)
    {
        $pro_freewheels="N/A";
    }
    else{
        $pro_freewheels=$row_product['product_freewheels'];
    }
    $pro_bb_set=$row_product['product_bb_set'];
    if($pro_bb_set==null)
    {
        $pro_bb_set="N/A";
    }
    else{
        $pro_bb_set=$row_product['product_bb_set'];   
    }
    $pro_cassette=$row_product['product_cassette'];
    if($pro_cassette==null)
    {
        $pro_cassette="N/A";
    }
    else{
        $pro_cassette=$row_product['product_cassette'];   
    }
    $pro_colour=$row_product['product_colour'];
    if($pro_colour==null)
    {
        $pro_colour="N/A";
    }
    else{
        $pro_colour=$row_product['product_colour'];   
    }
    $pro_pedals=$row_product['product_pedals'];
    if($pro_pedals==null)
    {
        $pro_pedals="N/A";
    }
    else{
        $pro_pedals=$row_product['product_pedals'];
    }
    $pro_seat_post=$row_product['product_seat_post'];
    if($pro_seat_post==null)
    {
        $pro_seat_post="N/A";
    }
    else{
        $pro_seat_post=$row_product['product_seat_post'];
    }
    $pro_handleber=$row_product['product_handleber'];
    if($pro_handleber==null)
    {
        $pro_handleber="N/A";
    }
    else{
        $pro_handleber=$row_product['product_handleber'];
    }
    $pro_stem=$row_product['product_stem'];
    if($pro_stem==null)
    {
        $pro_stem="N/A";
    }else{
        $pro_stem=$row_product['product_stem'];
    }
    $pro_headset=$row_product['product_headset'];
    if($pro_headset==null)
    {
        $pro_headset="N/A";
    }
    else{
        $pro_headset=$row_product['product_headset'];
    }
    $pro_brakeset=$row_product['product_brakeset'];
    if($pro_brakeset==null)
    {
        $pro_brakeset="N/A";
    }
    else{
        $pro_brakeset=$row_product['product_brakeset'];
    }

    $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
    $run_p_cat=mysqli_query($con,$get_p_cat);
    $row_p_cat=mysqli_fetch_array($run_p_cat);
    $p_cat_title=$row_p_cat['p_cat_title'];
}
?>

<!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:19:45 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Corano - Bikes Shop</title>
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
                                            <li class="<?php if($active=='Shop') echo"active"?>"><a href="shop.php">Shop<i class="fa fa-angle"></i></a>
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
                                            <a href="wishlist.html">
                                                <i class="pe-7s-like"></i>
                                                <div class="notification">0</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="minicart-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <div class="notification"><?php items(); ?>
                                            </div>
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
                                        <div class="notification"><?php items();?></div>
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
                               
                                <li class="menu-item-has-children "><a href="shop.php">Shop</a>
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
                                    <a href="#"></a>
                                </li>
                                <li><i class="fa fa-envelope-o"></i>
                                    <a href="#"></a>
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