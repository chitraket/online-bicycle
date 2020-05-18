<?php
   $active='';
   include("includes/header.php"); 
   ?>

<!--<div id="load_screen"><div id="loading"><img src="loder.gif" ></div></div>-->
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
                                <li class="breadcrumb-item active" aria-current="page">Order Policy</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- my account wrapper start -->
    <div class="my-account-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <?php 
                    
                                            $get_terms = "select * from order_policy where o_policy_status='yes' LIMIT 0,1";
                                            $run_terms = mysqli_query($con,$get_terms);

                                            while($row_terms=mysqli_fetch_array($run_terms)){

                                                $term_title = $row_terms['o_policy_title'];
                                                $term_desc = $row_terms['o_policy_desc'];
                                                $term_link = $row_terms['o_policy_link'];
                                        
                                        ?>
                                        <a href="#<?php echo $term_link; ?>" class="active" data-toggle="tab">
                                            <?php echo $term_title;?></a>
                                        <?php 
                                            }
                                            ?>
                                        <?php 

                                            $count_terms = "select * from order_policy  where o_policy_status='yes'";
                                            $run_count_terms = mysqli_query($con,$count_terms);
                                            $count = mysqli_num_rows($run_count_terms);
                                            $get_terms = "select * from order_policy where o_policy_status='yes' LIMIT 1,$count";
                                            $run_terms = mysqli_query($con,$get_terms);

                                            while ($row_terms=mysqli_fetch_array($run_terms)) {
                                                $term_title = $row_terms['o_policy_title'];
                                                $term_desc = $row_terms['o_policy_desc'];
                                                $term_link = $row_terms['o_policy_link']; ?>
                                        <a href="#<?php echo $term_link; ?>" data-toggle="tab">
                                            <?php echo $term_title;?></a>
                                        <?php
                                            }
                                            ?>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <?php 
                    
                                                $get_terms = "select * from order_policy where o_policy_status='yes' LIMIT 0,1";
                                                $run_terms = mysqli_query($con,$get_terms);

                                                while ($row_terms=mysqli_fetch_array($run_terms)) {
                                                    $term_title = $row_terms['o_policy_title'];
                                                    $term_desc = $row_terms['o_policy_desc'];
                                                    $term_link = $row_terms['o_policy_link']; 
                                                    ?>
                                        <div class="tab-pane fade show active" id="<?php echo $term_link; ?>"
                                            role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5><?php echo $term_title;?></h5>
                                                <p class="mb-0"><?php echo $term_desc; ?></p>
                                            </div>
                                        </div>
                                        <?php
                                                }
                                        ?>
                                        <!-- Single Tab Content End -->
                                        <?php 
                                                            $count_terms = "select * from order_policy where o_policy_status='yes'";
                                                            $run_count_terms = mysqli_query($con,$count_terms);
                                                            $count = mysqli_num_rows($run_count_terms);
                                                            $get_terms = "select * from order_policy where o_policy_status='yes'  LIMIT 1,$count";
                                                            $run_terms = mysqli_query($con,$get_terms);
                                                            while ($row_terms=mysqli_fetch_array($run_terms)) {
                                                                $term_title = $row_terms['o_policy_title'];
                                                                $term_desc = $row_terms['o_policy_desc'];
                                                                $term_link = $row_terms['o_policy_link']; ?>
                                        <div class="tab-pane fade " id="<?php echo $term_link; ?>" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5><?php echo $term_title;?></h5>

                                                <p class="mb-0"><?php echo $term_desc; ?></p>
                                            </div>
                                        </div>
                                        <?php
                                                            }
                                                            ?>
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
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


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:08 GMT -->

</html>