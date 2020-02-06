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
                                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
<?php
$session_email=$_SESSION['customer_email'];
$select_customer="select * from customers where customer_email='$session_email'";
$run_customers=mysqli_query($con,$select_customer);
$row_customer=mysqli_fetch_array($run_customers);
$customer_id=$row_customer['customer_id'];
$_SESSION['c_id']=$customer_id;
?>

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">

            <form name="postForm" action="#" method="POST">
 
            <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"name="ORDER_ID" autocomplete="off"value="<?php echo  "ORDS" . rand(10000,99999999)?>">
                        <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $customer_id; ?>">
                        <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                        <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">

           <!-- <input type="hidden" name="txnid" value="<?php echo $txnid=time().rand(1000,99999); ?>" />
            <input type="hidden" name="productinfo" value="<?php echo $customer_id; ?>" />
            <input type="hidden" name="service_provider" value="1"  />
            <input type="hidden" name="surl" value="http://localhost:9126/m-dev-store/form_process1.php?c_id=<?php echo $customer_id; ?>&txnid=<?php echo $txnid; ?>" size="64" />
            <input type="hidden" name="furl" value="http://localhost:9126/m-dev-store/checkout.php" size="64" />-->
                <div class="row">
                <?php
                
                if(isset($_SESSION['customer_email'])){
                    $customer_email=$_SESSION['customer_email'];
                    $select_customer = "select * from customers where customer_email='$customer_email'";
                    $run_customer=mysqli_query($con,$select_customer);
                    while($row_products=mysqli_fetch_array($run_customer)){

                        $customer_name=$row_products['customer_name'];
                        $customer_lname=$row_products['customer_lname'];
                        $customer_email=$row_products['customer_email'];
                        $customer_country=$row_products['customer_state'];
                        $customer_address=$row_products['customer_address'];
                        $customer_city=$row_products['customer_city'];
                        $customer_contact=$row_products['customer_contact'];
                        $customer_pincode=$row_products['customer_pincode'];
                ?>
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Billing Details</h5>
                            <div class="billing-form-wrap">
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">First Name</label>
                                                <input type="text"  name="firstname" placeholder="First Name" value="<?php echo $customer_name; ?>" required />
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">Last Name</label>
                                                <input type="text"  name="lastname" placeholder="Last Name" value="<?php echo $customer_lname; ?>" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <label for="email" class="required">Email Address</label>
                                        <input type="email" name="email" placeholder="Email Address" value="<?php echo $customer_email; ?>" required />
                                    </div>
                                    
                                       <!-- <select name="country nice-select" id="country">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="India">India</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="London">London</option>
                                            <option value="Chaina">China</option>
                                        </select>-->
                                    

                                    <div class="single-input-item">
                                        <label for="street-address" class="required mt-20">Street address</label>
                                        <input type="text" name="address" placeholder="Street address Line 1" value="<?php echo $customer_address; ?>" required />
                                    </div>

                                  <!--  <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="create_pwd">
                                                <label class="custom-control-label" for="create_pwd">New </label>
                                            </div>
                                        </div>
                                        <div class="account-create single-form-row">
                                            <div class="single-input-item">
                                                <label for="pwd" class="required">New Address</label>
                                                <input type="text" id="pwd" placeholder="New Address" required />
                                            </div>
                                        </div>
                                    </div>-->
                                    
                                    <!--<div class="single-input-item">
                                    <label for="street-address" class="required mt-20">Street address</label>
                                        <input type="text"  placeholder="Street address Line 2 (Optional)" />
                                    </div>-->
                                    <div class="single-input-item">
                                        <label for="town" class="required">Town / City</label>
                                        <input type="text" name="city" placeholder="Town / City" value="<?php echo $customer_city; ?>" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="state">State / Divition</label>
                                        <input type="text" name="country" placeholder="State / Divition" value="<?php echo $customer_country; ?>" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="postcode" class="required">Postcode / ZIP</label>
                                        <input type="text" name="postcode" placeholder="Postcode / ZIP" value="<?php echo $customer_pincode; ?>" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" placeholder="Phone" value="<?php echo $customer_contact; ?>" required/>
                                    </div>

                                   <!-- <div class="single-input-item">
                                        <label for="ordernote">Order Note</label>
                                        <textarea name="ordernote" name="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>-->
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                } 
                        ?>
                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Your Order Summary</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total=0;
                                            $ip_add=getRealIpUser();
                                            $select_cat="select * from cart where ip_add='$ip_add'";
                                            $run_cart=mysqli_query($con,$select_cat);
                                            while($row_cart=mysqli_fetch_array($run_cart)){
                                                $pro_id=$row_cart['p_id'];
                                                $pro_qty=$row_cart['qty'];
                                                $get_products="select * from products where product_id='$pro_id'";
                                                $run_products=mysqli_query($con,$get_products);
                                                while($row_products=mysqli_fetch_array($run_products)){
                                                    $product_title=$row_products['product_title'];
                                                    $product_img1=$row_products['product_img1'];
                                                    $product_price=$row_products['product_price'];
                                                    $sub_total=$row_products['product_price']*$pro_qty;
                                                    $total+=$sub_total;
                                            ?>
                                            <tr>
                                                <td><a href="product-details.php?pro_id=<?php echo $pro_id ?>"><?php echo $product_title; ?> <strong> × <?php echo $pro_qty; ?></strong></a>
                                                </td>
                                                <td><?php echo $sub_total; ?></td>
                                            </tr>
                                           
                                        </tbody>
                                        <?php 
                                                }
                                            }
                                        ?>
                                        <tfoot>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><strong><?php echo $total; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td><strong><?php echo $total; ?></strong>
                                                <input type="hidden" title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT"value="<?php echo $total; ?>">
                                                <!--<input type="hidden" name="amount" value="<?php echo $total; ?>" />-->
                                            </td>
                                            </tr>
                                        </tfoot>
                                      
                                    </table>
                                </div>
                               
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>
                                
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input" />
                                                <label class="custom-control-label" for="paypalpayment">Paytm <img src="assets/img/paypal-card.jpg" class="img-fluid paypal-card" alt="Paypal" /></label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="paypal">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.</p>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">I have read and agree to
                                                the website <a href="index.html">terms and conditions.</a></label>
                                        </div>
                                       <button type="submit" name="place_order" class="btn btn-sqr">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
                                       
        </div>
        <?php 
        if(isset($_POST['place_order']))
        {

            if($_POST['paymentmethod']=="cash")
            {
                $_SESSION['CUST_ID']=$_POST['CUST_ID'];
              ?>
                <script type="text/javascript">
              swal({
                        title: "Order Successfully Placed",
                        text: "Thank you for ordering. We received your order and will begin processing it soon. Your order information appears below.",
                        icon: "success",
                        buttons: true,
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('form_process2.php','_self');
                        } else {
                        
                        }
                });
                </script>
                <?php
                
            }
            else{  
                $_SESSION['ORDER_ID']=$_POST['ORDER_ID'];
                $_SESSION['CUST_ID']=$_POST['CUST_ID'];
                $_SESSION['INDUSTRY_TYPE_ID']=$_POST['INDUSTRY_TYPE_ID'];
                $_SESSION['CHANNEL_ID']=$_POST['CHANNEL_ID'];
                $_SESSION['TXN_AMOUNT']=$_POST['TXN_AMOUNT'];
            echo "<script>window.open('pgRedirect.php','_self')</script>";
            }
            $customer_emails=$_SESSION['customer_email'];
            $f_names=$_POST['firstname'];
            $email=$_POST['email'];
            $country=$_POST['country'];
            $city=$_POST['city'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $update_order="update customers set customer_name='$f_names',customer_email='$email',customer_state='$country',customer_city='$city',customer_contact='$phone',customer_address='$address' where customer_email='$customer_emails'";
            $run_querys=mysqli_query($db,$update_order);

          
        }
        ?>
        <!-- checkout main wrapper end -->
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
</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:07 GMT -->
</html>