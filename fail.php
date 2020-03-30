<?php
    $active='';
    include("includes/header.php");
?>

<?php 
           
           if(!isset($_SESSION['customer_email'])){
               
            echo "<script>window.open('customer/customer_login.php','_self')</script>";
              // include("customer/customer_login.php");
           }
           
?> 
    <!-- Start Header Area -->

    <!-- end Header Area -->
<?php
$papage="";
$pro_size="";          
$pro_qty=0;
$pro_id=0;
$pro_price=0;
$pro_name="";
$pro_img="";
$sub_total=0;
$total=0; 
?>
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                        <div class="success-text">
                        <div class="section-title text-center" style="margin-top: 25px;">
                        <img src="assets/img/icon/close.png" style="height: 50px;"> 
                    <h2 class="title" style="margin-top: 10px;">Thank you</h2>

                    <p style="margin-top: 10px;">Payment is successfully processsed and your order is on the way</p>
               
                    
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
                <div class="section-bg-color">
              
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Size</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                     
                                     // $total=$_SESSION['total'];
                foreach ($_SESSION as $product) {
                    if (!is_array($product)) {
                        continue;
                    }
                foreach ($product as $key => $value) {
                    if($key==6)
                    {
                        $papage=$value;
                    }
                    elseif($key==5)
                    {
                        $pro_size=$value;
                    }
                    elseif ($key==4) {
                        $pro_id= $value;
                    } elseif ($key ==3) {
                        $pro_qty= $value;
                    }
                    elseif ($key ==2) {
                        $pro_price= $value;
                    }
                    elseif($key==1)
                    {
                        $pro_name=$value;
                    }
                    elseif($key==0)
                    {
                        $pro_img=$value;
                    }

                }
                $sub_total=$pro_price*$pro_qty;
                $total+=$sub_total;
                if($papage==0)
                {
                ?>
                                  
                            
                           
                                    <tbody>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="admin_area/product_images/<?php echo $pro_img ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="product-details.php?pro_id=<?php echo $pro_id ?>"><?php  echo $pro_name ?></a></td>
                                            <td class="pro-price"><span><?php echo  $pro_size ?></span></td>
                                            <td class="pro-price"><span>Rs.<?php echo  $pro_price?></span></td>
                                            <td class="pro-quantity">
                                            <span><?php echo $pro_qty ?></span>
                                            </td>
                                            <td class="pro-subtotal"><span>Rs. <?php echo $sub_total ?></span></td>
                                        </tr>
                                        </tbody>
                                        <?php
                } 
                if($papage==1)
                {
                                        ?>
                                       <tbody>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="admin_area/accessories_images/<?php echo $pro_img ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="accessories-details.php?accessories_id=<?php echo $pro_id ?>"><?php  echo $pro_name ?></a></td>
                                            <td class="pro-price"><span><?php echo  $pro_size ?></span></td>
                                            <td class="pro-price"><span>Rs.<?php echo  $pro_price?></span></td>
                                            <td class="pro-quantity">
                                            <span><?php echo $pro_qty ?></span>
                                            </td>
                                            <td class="pro-subtotal"><span>Rs. <?php echo $sub_total ?></span></td>
                                        </tr>
                                        </tbody> 
                                    <?php
                }
                                    } 
                                    ?>  
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">

                    <!--<div class="col-lg-6 mr-auto">
                        <div class="contact-info">
                            <h4 class="contact-title"></h4>
                            <?php 
                                    if(isset($_GET['c_id']))
                                    {
                                        $customer_address='';
                                        $customer_email='';
                                        $customer_phone='';
                                        $productinfo=$_GET['c_id'];
                                        $select_cart = "select * from orders where id='$productinfo'";
                                                    $run_cart = mysqli_query($con,$select_cart);
                                                    while($row_cart = mysqli_fetch_array($run_cart))
                                                    {   
                                                                    $customer_name=$row_cart['customer_name'];
                                                                    $customer_address=$row_cart['customer_address'];
                                                                    $customer_email=$row_cart['customer_email'];
                                                                    $customer_phone=$row_cart['customer_contact'];
                                                           
                                                    }
                                    }
                                       
                                ?>                            
                            <ul style="margin-top: 20px;">
                            <li><i class="fa fa-map"></i> Address : <?php echo $customer_address; ?></li>
                                <li><i class="fa fa-envelope-o"></i> E-mail: <?php echo $customer_email; ?></li>
                                <li><i class="fa fa-phone"></i>Phone: +91 <?php echo $customer_phone;?></li>
                            </ul>
                        </div>
                    </div>-->
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Cart Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>Rs.<?php echo $total ?></td>
                                            </tr>
                                           <!-- <tr>
                                                <td>Shipping</td>
                                                <td>$70</td>
                                            </tr>-->
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">Rs.<?php echo $total ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <form  method="POST" action="">
                                    <input type="submit" class="btn btn-sqr d-block" style="margin-bottom: 50px;width: auto;" name="submit" value="Continue Shopping">
                                </form>
                            </div>
                        </div>
               
                    </div>
                   
                </div>
            </div>
    </main>
    <?php
                      if(isset($_POST['submit']))
                      {
                               unset($_SESSION[$pro_name]); 
                               echo "<script>window.open('index.php','_self')</script>";

                      } 
    ?>
    
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
    <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html">HasTech</a>
                                    </div>
                                    <h3 class="product-name">Handmade Golden Necklace</h3>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <div class="pro-review">
                                            <span>1 Reviews</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">$70.00</span>
                                        <span class="price-old"><del>$90.00</del></span>
                                    </div>
                                    <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                    <div class="product-countdown" data-countdown="2022/02/20"></div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>200 in stock</span>
                                    </div>
                                    <p class="pro-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod tempor invidunt ut labore et dolore magna.</p>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="useful-links">
                                        <a href="#" data-toggle="tooltip" title="Compare"><i
                                            class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                            class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>
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


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:07 GMT -->
</html>