<?php
$active='Shop';
include("includes/header.php");
?>
<script>
window.addEventListener("load", function() {
    const loader = document.querySelector(".loader");
    loader.className += " hidden";
});
</script>
<div class="loader">
    <img src="loder.gif" alt="Loading..." />
</div>
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
                                <li class="breadcrumb-item active" aria-current="page">Bikes</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->

                <?php
                   include("includes/sidebar.php"); 
                   ?>

                <!-- sidebar area end -->

                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-product-wrapper">

                        <div class="filter_data">

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


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
<?php
     include("includes/cart1.php"); 
    ?>

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

<script>
$(document).ready(function() {

    filter_data(1);

    function filter_data(firsttime, page) {
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('manufacturer_id');
        var ram = get_filter('cat_id');
        var sale = get_filter('sale');
        var storage = get_filter('p_cat_id');
        var colour = get_filter('colour');
        var size = get_filter('size');
        $.ajax({
            url: "fetch_data.php",
            method: "POST",
            data: {
                action: action,
                minimum_price: minimum_price,
                maximum_price: maximum_price,
                brand: brand,
                ram: ram,
                storage: storage,
                colour: colour,
                size: size,
                sale: sale,
                page: page,
                firsttime: firsttime
            },
            success: function(data) {
                $('.filter_data').html(data);
            }
        });
    }


    $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        filter_data($('#firsttime' + page).val(), page);
    });

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
            filter.push($(this).val());
        });

        return filter;
    }
    filter_data(0);
    $('.common_selector').click(function() {
        filter_data(0);
    });

    $('#price_range').slider({
        range: true,
        min: 1000,
        max: 250000,
        values: [1000, 250000],
        step: 500,
        stop: function(event, ui) {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data(0);
        }
    });



});
</script>

</body>

</html>