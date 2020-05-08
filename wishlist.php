<?php

$active='';
include("includes/header.php");

if(!isset($_SESSION['customer_email']))
{
    echo "<script>window.open('customer/login','_self')</script>";
}
?>

<!--<div id="load_screen"><div id="loading"><img src="loder.gif" ></div></div>-->
    <main>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">wishlist</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- wishlist main wrapper start -->
        <div class="wishlist-main-wrapper section-padding">
            <div class="container">
                <!-- Wishlist Page Content Start -->
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Wishlist Table Area -->
                            <?php
                                $customer_email=$_SESSION['customer_email'];
                                $select_wishlist="select * from wishlist where customer_email='$customer_email'";
                                $run_wishlist=mysqli_query($con,$select_wishlist);
                                $num_wishlist=mysqli_num_rows($run_wishlist);
                                if($num_wishlist<=0)
                                {
                                      ?>
                                      <div class="col-12" id="cart_empty">
                                        <div class="section-title text-center">
                                            <h2 class="title">Your wishlist is empty</h2>
                                        </div>
                                    <center> <div class="action_link">
                                        <a href="home"><input type="submit" class="btn btn-cart2" name="add_cart" value="Start shopping"></a>
                                    </div></center>  
                                    </div>
                                      <?php

                                }
                                else{
                            ?>
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Images</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Stock Status</th>
                                            <th class="pro-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                            <?php
                                                while($row_wishlist=mysqli_fetch_array($run_wishlist))
                                                {
                                                        $wishilist_id=$row_wishlist['wishlist_id'];
                                                        $papage=$row_wishlist['papage'];
                                                        $product_id=$row_wishlist['product_id'];
                                                if($papage==0)
                                                {
                                                    $select_product="select * from products where product_id='$product_id'";
                                                    $run_product=mysqli_query($con,$select_product);
                                                    while($row_product=mysqli_fetch_array($run_product))
                                                    {
                                                        $product_name=$row_product['product_title'];
                                                        $product_img1=$row_product['product_img1'];
                                                        $available_qty=$row_product['available_qty'];
                                                        $product_price=$row_product['product_price'];
                                                
                                            ?>
                                             <tr>
                                             <td class="pro-thumbnail"><a href="bikes-<?php echo base64_encode($product_id); ?>"><img class="img-fluid" src="admin_area/product_images/<?php echo $product_img1 ?>" alt="Product" /></a></td>
                                            <td class="pro-title">
                                                <a href="bikes-<?php echo base64_encode($product_id) ?>"><?php  echo  $product_name ?></a>
                                            </td>
                                            <td class="pro-price"><span>Rs.<?php echo $product_price ?></span></td>  
                                            <?php
                                            if($available_qty<=0)
                                            {
                                                    ?>
                                                    <td class="pro-quantity"><span class="text-danger">Stock Out</span></td>
                                                    <?php 
                                            }
                                            else
                                            {
                                                ?>
                                                <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                                                <?php 
                                            }
                                            ?>
                                            
                                            <td class="pro-remove"><a href="delete_wishlist-<?php echo base64_encode($wishilist_id); ?>" class="btn-delete"><i class="fa fa-trash-o"></i></a></td>
                                             </tr>
                                            <?php
                                             }
                                                }
                                                if($papage==1)
                                                {
                                                    $select_accessories="select * from accessories where accessories_id='$product_id'";
                                                    $run_accessories=mysqli_query($con,$select_accessories);
                                                    while($row_accessories=mysqli_fetch_array($run_accessories))
                                                    {
                                                        $accessories_name=$row_accessories['accessories_name'];
                                                        $accessories_image_1=$row_accessories['accessories_image_1'];
                                                        $accessories_prices=$row_accessories['accessories_prices'];
                                                        $available_qtys=$row_accessories['available_qty'];
                                                        ?>
                                                        <tr>
                                                        <td class="pro-thumbnail"><a href="accessories-<?php echo base64_encode($product_id); ?>"><img class="img-fluid" src="admin_area/accessories_images/<?php echo $accessories_image_1 ?>" alt="accessories" /></a></td>
                                                            <td class="pro-title">
                                                                <a href="accessories-<?php echo base64_encode($product_id); ?>"><?php  echo $accessories_name; ?></a>
                                                            </td>
                                                            <td class="pro-price"><span>Rs.<?php echo $accessories_prices ?></span></td>  
                                                            <?php
                                                            if($available_qtys<=0)
                                                            {
                                                                    ?>
                                                                    <td class="pro-quantity"><span class="text-danger">Stock Out</span></td>
                                                                    <?php 
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                                                                <?php 
                                                            }
                                                            ?>
                                                            
                                                            <td class="pro-remove"><a href="delete-wishlist?wishlist_id=<?php echo base64_encode($wishilist_id); ?>" class="btn-delete"><i class="fa fa-trash-o"></i></a></td>
                                                        </tr>
                                                        <?php 

                                                    }
                                                }
                                                } 
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                                } 
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Wishlist Page Content End -->
            </div>
        </div>
        <!-- wishlist main wrapper end -->
    </main>
    <?php
                if(isset($_GET['m']))
                { 
                ?>
                <div class="flash-data" data-flashdata="<?php echo $_GET['m'] ?>"></div>
                <?php
                } 
                ?>
    <!-- footer area start -->
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

    <script>
           $('.btn-delete').on('click',function(e){
               e.preventDefault();
               const href =$(this).attr('href')
               swal({
                        title: "Are you sure?",
                        text: "You want to remove this item.",
                        icon: "warning",
                        buttons: true,
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                           document.location.href=href;
                        } else {
                        
                        }
                });
              
           })
           const flashdata=$('.flash-data').data('flashdata')
           if(flashdata){
            swal({
                        title: "successful remove item.",
                        text: "",
                        icon: "success",
                        buttons: [,"OK"],
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('wishlist','_self'); 
                        } else {
                        
                        }
                });
                
           }    
        </script> 
</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/wishlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:08 GMT -->
</html>
