<?php
$active='Home';

?>


    <!-- Start Header Area -->
    <?php
       include("includes/header.php");
    ?>
    <!-- end Header Area -->


    <main>
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
               
                <!-- single slider item start -->
                <?php
                $get_slides="select * from slider where slide_status='yes'";
                $run_slider=mysqli_query($con,$get_slides);
                while($row_slides=mysqli_fetch_array($run_slider)){
                    $slide_name=$row_slides['slide_name'];
                    $slide_image=$row_slides['slide_image'];
                    $slide_row=$row_slides['slide_row'];
                    $slide_row_2=$row_slides['slide_row_2'];
                    $status=$row_slides['status'];
                    $slide_url=$row_slides['slide_url'];
                ?>
                    
                    <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="admin_area/slides_images/<?php echo $slide_image; ?>">
                   <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-1 <?php echo $status;?>">
                                        <h2 class="slide-title"><?php echo  $slide_row; ?></h2>
                                        <h4 class="slide-desc"><?php echo  $slide_row_2;?></h4>
                                        <a href="<?php echo $slide_url; ?>" class="btn btn-hero">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                }
               
                
                ?>
                <!-- single slider item end -->
            </div>
        </section>
        <!-- hero slider area end -->

        <!-- twitter feed area start -->
        <!-- twitter feed area end -->

        <!-- service policy area start -->
        <div class="service-policy section-padding">
            <div class="container">
                <div class="row mtn-30">
                <?php
                $get_boxs="select * from boxes_section where box_status='yes'";
                $run_box=mysqli_query($con,$get_boxs);
                while($row_boxs=mysqli_fetch_array($run_box))
                {

                    ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-<?php echo $row_boxs["box_icon"] ?>"></i>
                            </div>
                            <div class="policy-content">
                                <h6><?php echo $row_boxs["box_title"]; ?></h6>
                                <p><?php echo $row_boxs["box_desc"]; ?></p>
                            </div>
                        </div>
                    </div>
                   <?php 
                }
                ?>
                    
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- banner statistics area start -->
        <!--<div class="banner-statistics-area">
            <div class="container">
                <div class="row row-20 mtn-20">
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/2.jpg" alt="product banner" style="height:250px;">
                            </a>
                            <div class="banner-content text-right">
                                <h5 class="banner-text1">Bikes</h5>
                                <h2 class="banner-text2" >Mountain Bikes<span>New products</span></h2>
                                <a href="shop.php" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/4.jpg" alt="product banner" style="height:250px;">
                            </a>
                            <div class="banner-content text-center">
                                <h5 class="banner-text1">New Accessories</h5>
                                <h2 class="banner-text2">New Accessories<span>Accessories</span></h2>
                                <a href="shop.php" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                   <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                                <a href="#">
                                <img src="assets/img/banner/img3-top.jpg" alt="product banner">
                            </a>
                            <div class="banner-content text-center">
                                <h5 class="banner-text1">NEW ARRIVALLS</h5>
                                <h2 class="banner-text2">Pearl<span>Necklaces</span></h2>
                                <a href="shop.html" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/img4-top.jpg" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
                                <h5 class="banner-text1">NEW DESIGN</h5>
                                <h2 class="banner-text2">Diamond<span>Jewelry</span></h2>
                                <a href="shop.html" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- banner statistics area end -->

        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">New products</h2>
                          <!--  <p class="sub-title">Add our products to weekly lineup</p>-->
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <!-- product tab menu start -->
                            
                            <!-- product tab menu end -->

                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" >
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                       <?php 
                                        getPro();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">New Accessories</h2>
                          <!--  <p class="sub-title">Add our products to weekly lineup</p>-->
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <!-- product tab menu start -->
                            
                            <!-- product tab menu end -->

                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" >
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                       <?php 
                                        getAcc();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- product banner statistics area start -->
        <!-- product banner statistics area end -->

        <!-- featured product area start -->
        <!-- featured product area end -->

        <!-- testimonial area start -->
        <!-- testimonial area end -->

        <!-- group product start -->
        <!-- group product end -->

        <!-- latest blog area start -->
        <!-- latest blog area end -->

        <!-- brand logo area start -->
        <div class="brand-logo section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                            <!-- single brand start -->
                            <?php
                            logo(); 
                            ?>
                            <!-- single brand end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand logo area end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php
    include("includes/footer.php");
    ?>
    <!-- footer area end -->

    <!-- Quick view modal start -->
    <!-- Quick view modal end -->

    <!-- offcanvas mini cart start -->
    <?php
     include("includes/cart1.php");
    ?>
    <!-- offcanvas mini cart end -->

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!-- slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="assets/js/plugins/image-zoom.min.js"></script>
    <!-- Imagesloaded JS -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- Instagram feed JS -->
    <script src="assets/js/plugins/instagramfeed.min.js"></script>
    <!-- mailchimp active js -->
    <script src="assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:21:37 GMT -->
</html>