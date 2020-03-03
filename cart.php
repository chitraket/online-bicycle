
    <!-- Start Header Area -->
    <?php
       $active='Shop';
       include("includes/header.php");
       if(isset($_POST['action']) && $_POST['action']=="remove")
       {
            unset($_SESSION[$_POST["p_name"]]);
            
       }
       if(isset($_POST['action']) && $_POST['action']=="change")
       {   
        $product_qty=$_POST["product-qty"];
        $product_img= $_POST["p_img"];
        $product_name= $_POST["p_name"];
        $product_price= $_POST["p_price"];
        $p_id= $_POST["code"]; 
        $product= array($product_img,$product_name,$product_price,$product_qty,$p_id);
        $_SESSION[$product_name]=$product;
        }
    ?>
    <!-- end Header Area -->


    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.php">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
      
         <div class="col-12" id="cart_empty">
            <div class="section-title text-center">
                <h2 class="title">Your cart is empty</h2>
            </div>
           <center> <div class="action_link">
            <a href="index.php"><input type="submit" class="btn btn-cart2" name="add_cart" value="Start shopping"></a>
        </div></center>  
        </div>
           
            <div class="container">
                <div class="section-bg-color"  id="table_cart">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove">Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <style>
                                    #table_cart{
                                        display: none;
                                    }
                                    </style>
                               
                                  <?php
                                    $bill=0;
                                    $p_id=0;
                                    $total=0;
                                    $p_img=0;
                                    $p_name=0;
                                  foreach($_SESSION as $product)
                                  {
                                    if(!is_array($product))
                                    {
                                        continue;
                                    }
                                    ?>

                                    <style>
                                    #cart_empty{
                                        display: none;
                                    }

                                    #table_cart{
                                        display: block;
                                    }
                                    </style>
                                    <?php 
                                    $p=0;
                                    $q=0;
                                      ?>
                                       <tr>
                                      <?php 
                                      foreach ($product as $key => $value) {
                                          if($key==4)
                                          {
                                             $p_id=$value;
                                          }
                                        else  if ($key==3) {
                                                $q=$value;
                                          } elseif ($key==2) {
                                            
                                            $p=$value;
                                          } elseif ($key==1) {
                                              $p_name=$value;

                                          } elseif ($key==0) {
                                             
                                                $p_img=$value;

                                          } ?>
                                           <!-- -->
                                   <?php
                                      }
                                      $bill=($q*$p);
                                      $total+=$bill; 
                                      ?>
                                    <td class="pro-thumbnail"><a href="product-details.php?pro_id=<?php echo $p_id ?>"><img class="img-fluid" src="admin_area/product_images/<?php echo $p_img ?>" alt="Product" /></a></td>
                                   
                                    <td class="pro-title">
                                        
                                        <a href="product-details.php?pro_id=<?php echo $p_id ?>"><?php  echo $p_name ?></a>
                                    </td>
                                   
                                    <td class="pro-price"><span>Rs.<?php echo $p ?></span></td>  
                                    
                                    <form method="POST" action="">
                                    <td class="pro-quantity" >
                                            <input type="number" style="width: 90px;height: 40px;border: 1px solid #ddd;padding: 0 15px;float: left;" name="product-qty" min="1" value="<?php echo $q ?>"  onchange="this.form.submit()"> 
                                    </td>
                                                    <input type="hidden" name="action" value="change"/>
                                                    <input type="hidden" name="code" value="<?php echo $p_id ?>">
                                                    <input type="hidden" name="p_name" value="<?php echo $p_name ?>">
                                                    <input type="hidden" name="p_img" value="<?php echo $p_img ?>">
                                                    <input type="hidden" name="p_price" value="<?php echo $p?>">
                                    </form>
                                    <td class="pro-subtotal"><span>Rs. <?php echo $bill ?></span></td>
                                     <form method="POST" action="">
                                      <td class="pro-remove">
                                          <input type="hidden" name="code" value="<?php echo $p_id?>">
                                          <input type="hidden" name="p_name" value="<?php echo $p_name ?>">
                                          <input type="submit" value="remove" name="action" class="btn btn-cart2">
                                        </td>
                                     </form>
                                    </tr>
                                      <?php
                                      
                                    }
                                  ?>
                                </tbody>           
                                </table>
                            </div>
                            
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="cart-update">
                                    <a href="shop.php"><input type="submit" name="update" class="btn btn-sqr" value="Continue Shopping"></a>
                                </div>
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Enter Your Coupon Code" required />
                                        <button class="btn btn-sqr">Apply Coupon</button>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                                            <!--<tr>
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
                                <a href="checkout.php" class="btn btn-sqr d-block">Proceed Checkout</a>
                            </div>
                        </div>
                      
                    </div>
                   
                </div>
            </div>
          
        </div>
        <!-- cart main wrapper end -->
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

    <script>
    
       $(document).ready(function(data){

           $(document).on('keyup','.quantity',function(){

                var id = $ (this).data("product_id");
                var quantity = $(this).val();

                if(quantity !=''){

                    $.ajax({

                        url: "change.php",
                        method: "POST",
                        data:{id:id, quantity:quantity},

                        success:function(){
                            $("body").load("cart_body.php");
                        }

                    });

                }

           });

       });
    
    </script>
    
</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:06 GMT -->
</html>