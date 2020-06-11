<?php
   $active='';
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
                                <li class="breadcrumb-item active" aria-current="page">Site Map</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- my account wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <!-- single sidebar start -->
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">Bikes Categories</h5>
                        <div class="sidebar-body">
                            <ul class="shop-categories">
                                <?php
                                                            $select_category="select * from product_categories where p_cat_status='yes'";
                                                            $run_category=mysqli_query($con,$select_category);
                                                            while($row_category=mysqli_fetch_array($run_category))
                                                            {
                                                             ?>
                                <li><a
                                        href="bikes_category-<?php echo base64_encode($row_category['p_cat_id']); ?>"><?php echo $row_category['p_cat_title']; ?></a>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <!-- single sidebar end -->

                </div>
                <div class="col-lg-3 order-2 order-lg-1">
                    <!-- single sidebar start -->
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">Bikes Manufacturer</h5>
                        <div class="sidebar-body">
                            <ul class="shop-categories">
                                <?php
                                                            $select_manufacturer="select * from manufacturers where manufacturer_status='yes'";
                                                            $run_manufacturer=mysqli_query($con,$select_manufacturer);
                                                            while($row_manufacturer=mysqli_fetch_array($run_manufacturer))
                                                            {
                                                             ?>
                                <li><a
                                        href="bikes_manufacturer-<?php echo base64_encode($row_manufacturer['manufacturer_id']); ?>"><?php echo $row_manufacturer['manufacturer_title']; ?></a>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <!-- single sidebar end -->

                </div>
                <div class="col-lg-3 order-2 order-lg-1">
                    <!-- single sidebar start -->
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">Accessories Categories</h5>
                        <div class="sidebar-body">
                            <ul class="shop-categories">
                                <?php
                                                            $select_accessories="select * from accessories_category where accessories_category_status='yes'";
                                                            $run_accessories=mysqli_query($con,$select_accessories);
                                                            while($row_accessories=mysqli_fetch_array($run_accessories))
                                                            {
                                                             ?>
                                <li><a
                                        href="accessories_category-<?php echo base64_encode($row_accessories['accessories_category_id']); ?>"><?php echo $row_accessories['accessories_category']; ?></a>
                                </li>
                                <?php }?>

                            </ul>
                        </div>
                    </div>
                    <!-- single sidebar end -->

                </div>
                <div class="col-lg-3 order-2 order-lg-1">
                    <!-- single sidebar start -->
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">Accessories Manufacturer</h5>
                        <div class="sidebar-body">
                            <ul class="shop-categories">
                                <?php
                                                            $select_manufacturers="select * from accessories_brand where accessories_brand_status='yes'";
                                                            $run_manufacturers=mysqli_query($con,$select_manufacturers);
                                                            while($row_manufacturers=mysqli_fetch_array($run_manufacturers))
                                                            {
                                                             ?>
                                <li><a
                                        href="accessories_manufacturer-<?php echo base64_encode($row_manufacturers['accessories_brand_id']); ?>"><?php echo $row_manufacturers['accessories_brand']; ?></a>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <!-- single sidebar end -->

                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->
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
</html>