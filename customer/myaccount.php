<?php
$active="";
include("includes/header.php");
$_SESSION['papage']=0;
if(!isset($_SESSION['customer_email']))
{
    ?>
    <script>window.open('login','_self')</script>
    <?php
}

$custmoer_email=$_SESSION['customer_email'];
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
                                <li class="breadcrumb-item"><a href="../home"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">my-account</li>
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
                                <?php
                                   include("includes/sidebar.php"); 
                                   ?>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5>Dashboard</h5>
                                                <div class="col-xl-12">
                                                    <div class="row">
                                                        <div class="col-md-3 mb-2">
                                                            <div class="card mini-stats-wid">
                                                                <div class="card-body">
                                                                    <div class="media">
                                                                        <div class="media-body">
                                                                            <p class="text-muted font-weight-medium">
                                                                                Orders</p>
                                                                            <?php
                                                        $row=0;
                                                        $select_order="select DISTINCT order_id from customer_orders where customer_email='$custmoer_email' order by order_id";
                                                        $query_num=mysqli_query($con,$select_order);
                                                        $row=mysqli_num_rows($query_num);

                                                        ?>
                                                                            <h4 class="mb-0"><?php echo $row; ?></h4>
                                                                        </div>

                                                                        <div
                                                                            class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                                            <span class="avatar-title">
                                                                                <i
                                                                                    class="bx bx-copy-alt font-size-24"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mb-2">
                                                            <div class="card mini-stats-wid">
                                                                <div class="card-body">
                                                                    <div class="media">
                                                                        <div class="media-body">
                                                                            <p class="text-muted font-weight-medium">
                                                                                Cancel Order</p>
                                                                            <?php
                                                        $rows=0;
                                                        $select_order_cancel="select DISTINCT order_id from customer_orders where customer_email='$custmoer_email' and payment_status='cancel' and order_status='c' order by order_id";
                                                        $query_num_cancel=mysqli_query($con,$select_order_cancel);
                                                        $rows=mysqli_num_rows($query_num_cancel);

                                                        ?>
                                                                            <h4 class="mb-0"><?php echo $rows; ?></h4>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mb-2">
                                                            <div class="card mini-stats-wid">
                                                                <div class="card-body">
                                                                    <div class="media">
                                                                        <div class="media-body">
                                                                            <p class="text-muted font-weight-medium">
                                                                                Returned Order</p>
                                                                            <?php
                                                        $rowss=0;
                                                        $select_order_returned="select DISTINCT order_id from customer_orders where customer_email='$custmoer_email' and payment_status='returned' and order_status='r' order by order_id";
                                                        $query_num_returned=mysqli_query($con,$select_order_returned);
                                                        $rowss=mysqli_num_rows($query_num_returned);
                                                        ?>
                                                                            <h4 class="mb-0"><?php echo $rowss; ?></h4>
                                                                        </div>

                                                                        <div
                                                                            class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                                            <span
                                                                                class="avatar-title rounded-circle bg-primary">
                                                                                <i
                                                                                    class="bx bx-purchase-tag-alt font-size-24"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mb-2">
                                                            <div class="card mini-stats-wid">
                                                                <div class="card-body">
                                                                    <div class="media">
                                                                        <div class="media-body">
                                                                            <p class="text-muted font-weight-medium">
                                                                                Payment Failed</p>
                                                                            <?php
                                                        $rowws=0;
                                                        $select_order_failed="select DISTINCT order_id from customer_orders where customer_email='$custmoer_email' and payment_status='failed' and order_status='f' order by order_id";
                                                        $query_num_failed=mysqli_query($con,$select_order_failed);
                                                        $rowws=mysqli_num_rows($query_num_failed);

                                                        ?>
                                                                            <h4 class="mb-0"><?php echo $rowws; ?></h4>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- end row -->


                                                </div>


                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <?php
                                            include("my_orders.php"); 
                                            ?>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <?php
                                            include("change_pass.php"); 
                                            ?>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <?php 
                                            include("edit_account.php");
                                            ?>
                                        <!-- Single Tab Content End -->
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
<script>
$(document).ready(function() {
    load_data();

    function load_data(page) {
        $.ajax({
            url: "pagination.php",
            method: "POST",
            data: {
                page: page
            },
            success: function(data) {
                $('#pagination_data').html(data);
            }
        })
    }
    $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
    });
});
</script>