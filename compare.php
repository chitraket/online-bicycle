<?php
$active='';
include('includes/header.php'); 
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
                                <li class="breadcrumb-item active" aria-current="page">compare</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- compare main wrapper start -->
    <div class="compare-page-wrapper section-padding">
        <?php
        if(isset($_SESSION['compare']) && !empty($_SESSION['compare']))
        {
        ?>
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="compare-page-content-wrap">
                            <div class="compare-table table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="first-column">Product</td>
                                            <?php 
                                                foreach($_SESSION['compare'] as $key => $values)
                                                {
                                                    $product_id=$values['item_id'];
                                                    $papage=$values['papage'];
                                                    if($papage==0)
                                                    {
                                                        $select_product="select * from products where product_id='$product_id' and product_status='yes'";
                                                        $run_product=mysqli_query($con,$select_product);
                                                        while($row_product=mysqli_fetch_array($run_product))
                                                        {
                                                        $p_cat_id=$row_product['p_cat_id'];
                                                            ?>
                                            <td class="product-image-title">
                                                <a href="bikes-<?php echo base64_encode($row_product['product_id']);?>"
                                                    class="image">
                                                    <img class="img-fluid"
                                                        src="admin_area/product_images/<?php echo $row_product['product_img1']; ?>"
                                                        alt="Compare Product">
                                                </a>
                                                <?php
                                                        $get_product_cat="select * from product_categories where p_cat_id=$p_cat_id";
                                                        $run_product_cat=mysqli_query($con,$get_product_cat);
                                                        while($row_product_cat=mysqli_fetch_array($run_product_cat))
                                                        {
                                                        ?>
                                                <a href="bikes_category-<?php echo base64_encode($p_cat_id) ?>"
                                                    class="category"><?php echo $row_product_cat['p_cat_title'] ?></a>
                                                <?php 
                                                        }
                                                        ?>
                                                <a href="bikes-<?php echo base64_encode($row_product['product_id']);?>"
                                                    class="title"><?php echo $row_product['product_title']; ?></a>
                                            </td>
                                            <?php
                                                        }
                                                    }
                                                    if($papage==1)
                                                    {
                                                        $select_accessories="select * from accessories where accessories_id='$product_id' and accessories_status='yes'";
                                                        $run_accessories=mysqli_query($con,$select_accessories);
                                                        while($row_accessories=mysqli_fetch_array($run_accessories))
                                                        {
                                                        $accessories_category=$row_accessories['accessories_category'];
                                                            ?>
                                            <td class="product-image-title">
                                                <a href="accessories-<?php echo base64_encode($row_accessories['accessories_id']);?>"
                                                    class="image">
                                                    <img class="img-fluid"
                                                        src="admin_area/accessories_images/<?php echo $row_accessories['accessories_image_1'];?>"
                                                        alt="Compare Product">
                                                </a>
                                                <?php
                                                        $get_accessories_cat="select * from accessories_category where accessories_category_id=$accessories_category";
                                                        $run_accessories_cat=mysqli_query($con,$get_accessories_cat);
                                                        while($row_accessories_cat=mysqli_fetch_array($run_accessories_cat))
                                                        {
                                                        ?>
                                                <a href="accessories_category-<?php echo base64_encode($accessories_category) ?>"
                                                    class="category"><?php echo $row_accessories_cat['accessories_category'] ?></a>
                                                <?php 
                                                        }
                                                        ?>
                                                <a href="accessories-<?php echo base64_encode($row_accessories['accessories_id']);?>"
                                                    class="title"><?php echo $row_accessories['accessories_name']; ?></a>
                                            </td>
                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>


                                        </tr>
                                        <tr>
                                            <td class="first-column">Price</td>
                                            <?php
                                                foreach($_SESSION['compare'] as $key => $values)
                                                {
                                                    $product_id=$values['item_id'];
                                                    $papage=$values['papage'];
                                                    if($papage==0)
                                                    {
                                                        $select_product="select * from products where product_id='$product_id' and product_status='yes'";
                                                        $run_product=mysqli_query($con,$select_product);
                                                        while($row_product=mysqli_fetch_array($run_product))
                                                        {
                                                            ?>
                                            <td class="pro-price">Rs.<?php echo $row_product['product_price']; ?></td>
                                            <?php
                                                        }
                                                    }
                                                    if($papage==1)
                                                    {
                                                        $select_accessories="select * from accessories where accessories_id='$product_id' and accessories_status='yes'";
                                                        $run_accessories=mysqli_query($con,$select_accessories);
                                                        while($row_accessories=mysqli_fetch_array($run_accessories))
                                                        {
                                                            ?>
                                            <td class="pro-price">
                                                Rs.<?php echo $row_accessories['accessories_prices']; ?></td>
                                            <?php
                                                        }
                                                    }
                                                }
                                                            ?>
                                        </tr>
                                        <tr>
                                            <td class="first-column">Color</td>
                                            <?php
                                                foreach($_SESSION['compare'] as $key => $values)
                                                {
                                                    $product_id=$values['item_id'];
                                                    $papage=$values['papage'];
                                                    if($papage==0)
                                                    {
                                                        $select_product="select * from products where product_id='$product_id' and product_status='yes'";
                                                        $run_product=mysqli_query($con,$select_product);
                                                        while($row_product=mysqli_fetch_array($run_product))
                                                        {
                                                            ?>
                                            <td class="pro-color"><?php echo $row_product['product_colour']; ?></td>
                                            <?php
                                                        }
                                                    }
                                                    if($papage==1)
                                                    {
                                                        $select_accessories="select * from accessories where accessories_id='$product_id' and accessories_status='yes'";
                                                        $run_accessories=mysqli_query($con,$select_accessories);
                                                        while($row_accessories=mysqli_fetch_array($run_accessories))
                                                        {
                                                            ?>
                                            <td class="pro-color"><?php echo $row_accessories['accessories_color']; ?>
                                            </td>
                                            <?php
                                                        }
                                                    }
                                                }
                                                            ?>
                                        </tr>
                                        <tr>
                                            <td class="first-column">Rating</td>
                                            <?php
                                                foreach($_SESSION['compare'] as $key => $values)
                                                {
                                                    $product_id=$values['item_id'];
                                                    $papage=$values['papage'];
                                                    if($papage==0)
                                                    {
                                                        $select_product="select * from products where product_id='$product_id' and product_status='yes'";
                                                        $run_product=mysqli_query($con,$select_product);
                                                        while($row_product=mysqli_fetch_array($run_product))
                                                        {
                                                            $product_ids=$row_product['product_id'];
                                                        

                                        $query="select AVG(rating) as rating from review where product_id='$product_ids' and status='yes' and papage='0'";
                                        $statement=mysqli_query($con,$query);
                                        while($ruo=mysqli_fetch_array($statement))
                                        {
                                        $output=round($ruo['rating']);
                                        
                                        if($output==0)
                                        {
                                        ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>
                                            <?php
                                        }
                                       else if($output==1)
                                        {
                                            ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>

                                            <?php
                                        }
                                       else if($output==2)
                                        {
                                            ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>

                                            <?php
                                        }
                                        else if($output==3)
                                        {
                                            ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>

                                            <?php
                                        }
                                        else if($output==4)
                                        {
                                            ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>

                                            <?php
                                        }
                                        else if($output==5)
                                        {
                                            ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </td>

                                            <?php
                                        }
                                    }
                                }

                                                    }
                                                    if($papage==1)
                                                    {
                                                        $select_accessories="select * from accessories where accessories_id='$product_id' and accessories_status='yes'";
                                                        $run_accessories=mysqli_query($con,$select_accessories);
                                                        while($row_accessories=mysqli_fetch_array($run_accessories))
                                                        {
                                                            $accessories_ids=$row_accessories['accessories_id'];
                                                        
                                                        $query="select AVG(rating) as rating from review where product_id='$accessories_ids' and status='yes' and papage='1'";
                                                        $statement=mysqli_query($con,$query);
                                                        while($ruo=mysqli_fetch_array($statement))
                                                        {
                                                        $output=round($ruo['rating']);
                                                        
                                        
                                        if($output==0)
                                        {
                                        ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>
                                            <?php
                                        }
                                       else if($output==1)
                                        {
                                            ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>

                                            <?php
                                        }
                                       else if($output==2)
                                        {
                                            ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>

                                            <?php
                                        }
                                        else if($output==3)
                                        {
                                            ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>

                                            <?php
                                        }
                                        else if($output==4)
                                        {
                                            ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>

                                            <?php
                                        }
                                        else if($output==5)
                                        {
                                            ?>
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </td>

                                            <?php
                                        }
                                    }
                                }
                                       
                                                    }
                                                }
                                                ?>

                                        </tr>
                                        <tr>
                                            <td class="first-column">Remove</td>
                                            <?php
                                                foreach($_SESSION['compare'] as $key => $values)
                                                {
                                                    $product_id=$values['item_id'];
                                                    $papage=$values['papage'];
                                                    if($papage==0)
                                                    {
                                                        $select_product="select * from products where product_id='$product_id' and product_status='yes'";
                                                        $run_product=mysqli_query($con,$select_product);
                                                        while($row_product=mysqli_fetch_array($run_product))
                                                        {
                                                            ?>
                                            <td class="pro-remove">
                                                <a href="delete_compare-<?php echo base64_encode($row_product['product_title']);?>-<?php echo base64_encode($row_product['product_id']); ?>"
                                                    class="btn-delete"><button><i
                                                            class="fa fa-trash-o"></i></button></a>
                                            </td>
                                            <?php
                                                        }
                                                    }
                                                    if($papage==1)
                                                    {
                                                        $select_accessories="select * from accessories where accessories_id='$product_id' and accessories_status='yes'";
                                                        $run_accessories=mysqli_query($con,$select_accessories);
                                                        while($row_accessories=mysqli_fetch_array($run_accessories))
                                                        {
                                                            ?>
                                            <td class="pro-remove">
                                                <a href="delete_compare-<?php echo base64_encode($row_accessories['accessories_name']);?>-<?php echo base64_encode($row_accessories['accessories_id']); ?>"
                                                    class="btn-delete"><button><i
                                                            class="fa fa-trash-o"></i></button></a>
                                            </td>
                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Compare Page Content End -->
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        else{
            ?>
        <div class="col-12" id="cart_empty">
            <div class="section-title text-center">
                <h2 class="title">Your compare is empty</h2>
            </div>
            <center>
                <div class="action_link">
                    <a href="home"><input type="submit" class="btn btn-cart2" name="add_cart"
                            value="Start shopping"></a>
                </div>
            </center>
        </div>
        <?php 
        }
            ?>
    </div>
    <!-- compare main wrapper end -->
</main>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->


<?php
                if(isset($_GET['m']))
                { 
                ?>
<div class="flash-data" data-flashdata="<?php echo $_GET['m'] ?>"></div>
<?php
                } 
                ?>
<!-- footer area start -->
<?php
    include("includes/footer.php")
    ?>
<!-- footer area end -->

<!-- Quick view modal start -->

<!-- Quick view modal end -->

<!-- offcanvas mini cart start -->
<?php
    include("includes/cart1.php")
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
<script>
$('.btn-delete').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href')
    swal({
            title: "Are you sure?",
            text: "You want to remove this item.",
            icon: "warning",
            buttons: true,
            successMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.location.href = href;
            } else {

            }
        });

})
const flashdata = $('.flash-data').data('flashdata')
if (flashdata) {
    swal({
            title: "successful remove item.",
            text: "",
            icon: "success",
            buttons: [, "Ok"],
            successMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.open('compare', '_self');
            } else {
                window.open('compare', '_self');
            }
        });

}
</script>
</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/compare.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:08 GMT -->

</html>