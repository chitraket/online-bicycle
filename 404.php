<?php
$active="";
include("includes/header.php"); 
?>
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">404</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="cart-main-wrapper section-padding">

        <center>
            <img src="4O4 Page Animation.gif" style="height: 350px;width: 500px;">
        </center>
        <div class="col-12" id="cart_empty">
            <div class="section-title text-center">
                <h2 class="title">Page not found</h2>
            </div>
            <center>
                <div class="action_link">
                    <a href="home"><input type="submit" class="btn btn-cart2" name="add_cart" value="Go Back Home"></a>
                </div>
            </center>
        </div>
    </div>
    <?php
include("includes/cart1.php");
include("includes/footer.php");
?>