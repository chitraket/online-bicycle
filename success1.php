<?php
    $active='';
    include("includes/header.php");
?>

<?php 
           
           if(!isset($_SESSION['customer_email'])){
            echo "<script>window.open('customer/customer_login.php','_self')</script>";
           }
           if(isset($_GET['c_id']))
           {
               if(!$_GET['c_id']=="")
               {
                   $productinfo=base64_decode($_GET['c_id']);
               }
               else{
                   ?>
                   <script>window.open('home','_self')</script>
                   <?php 
               }
           }
           else{
               ?>
               <script>window.open('home','_self')</script>
               <?php 
           }
           $customer_address='';
           $customer_email='';
           $customer_phone='';           
?> 

    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <div class="success-text">
                                    <div class="section-title text-center" >
                                        <img src="assets/img/icon/check.png" style="height: 50px;margin-top: 10px;"> 
                                        <h2 class="title" style="margin-top: 10px;">Thank you</h2>
                                        <p style="margin-top: 10px;">Order is successfully processsed and your order is on the way</p>
                                        <p style="margin-top: 10px;">Payment Method : <img src="assets/img/icon/cash-on-delivery.png" style="height:25px;"/> Cash On Delivery</p>
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
                                            <th class="pro-thumbnail">Images</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Size</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                        </tr>
                                    </thead>
 
                                  
                            <?php
                                    
                                    $total=0;
                                    
                                        $select_carts="select * from customer_orders where order_id='$productinfo' and txnid=''";
                                        $run_carts=mysqli_query($con,$select_carts);
                                        $num_count=mysqli_num_rows($run_carts);
                                        if($num_count==0)
                                        {
                                            ?>
                                            <script>window.open('home','_self')</script>
                                            <?php 
                                        }
                                        else{
                                        while($row_carts=mysqli_fetch_array($run_carts))
                                        {
                                        $papage_number=$row_carts['papage_number'];
                                        $pro_id=$row_carts['product_id'];
                                        $pro_qty=$row_carts['qty'];
                                        $product_size=$row_carts['size'];
                                        if ($papage_number==0) {
                                            $get_products="select * from products where product_id='$pro_id'";
                                            $run_products=mysqli_query($con, $get_products);
                                            while ($row_products=mysqli_fetch_array($run_products)) {
                                                $product_title=$row_products['product_title'];
                                                $product_img1=$row_products['product_img1'];
                                                $product_price=$row_products['product_price'];
                                                $sub_total=$row_products['product_price']*$pro_qty;
                                                $total+=$sub_total; ?>
                           
                                    <tbody>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="bikes-<?php echo base64_encode($pro_id); ?>"><img class="img-fluid" src="admin_area/product_images/<?php echo $product_img1 ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="bikes-<?php echo base64_encode($pro_id); ?>"><?php  echo $product_title ?></a></td>
                                            <td class="pro-price"><span><?php echo  $product_size ?></span></td>
                                            <td class="pro-price"><span>Rs.<?php echo $product_price ?></span></td>
                                            <td class="pro-quantity">
                                               <span><?php echo $pro_qty ?></span>
                                            </td>
                                            <td class="pro-subtotal"><span>Rs. <?php echo $sub_total ?></span></td>
                                        </tr>
                                        </tbody>
                                        <?php
                                            }
                                        }
                                    if($papage_number==1)
                                    {
                                        $get_accessories="select * from accessories where accessories_id='$pro_id'";
                                        $run_accessories=mysqli_query($con, $get_accessories);
                                        while ($row_acessories=mysqli_fetch_array($run_accessories)) {
                                            $accessoires_name=$row_acessories['accessories_name'];
                                            $accessories_img1=$row_acessories['accessories_image_1'];
                                            $accessories_prices=$row_acessories['accessories_prices'];
                                            $sub_total=$row_acessories['accessories_prices']*$pro_qty;
                                            $total+=$sub_total; ?>
                                             <tbody>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="accessories-<?php echo base64_encode($pro_id); ?>"><img class="img-fluid" src="admin_area/accessories_images/<?php echo $accessories_img1?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="accessories-<?php echo base64_encode($pro_id); ?>"><?php  echo $accessoires_name ?></a></td>
                                            <td class="pro-price"><span><?php echo  $product_size ?></span></td>
                                            <td class="pro-price"><span>Rs.<?php echo $accessories_prices ?></span></td>
                                            <td class="pro-quantity">
                                               <span><?php echo $pro_qty ?></span>
                                            </td>
                                            <td class="pro-subtotal"><span>Rs. <?php echo $sub_total ?></span></td>
                                        </tr>
                                        </tbody>


                                        <?php
                                                }
                                            }
                                        }
                                    }   
                                       ?>
                                      
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6 mr-auto">
                        <div class="contact-info">
                            <h4 class="contact-title"></h4>
                            <?php 

                                        $select_cart = "select * from orders where id='$productinfo'";
                                                    $run_cart = mysqli_query($con,$select_cart);
                                                    $num_cart=mysqli_num_rows($run_cart);
                                                    if($num_cart==0)
                                                    {
                                                        ?>
                                                        <script>window.open('home','_self')</script>
                                                        <?php 
                                                    }
                                                    else{
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
                    </div>
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Total</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>Rs.<?php echo $total ?></td>
                                            </tr>
                                            <tr>
                                                <td>GST (12%)</td>
                                                <td>Rs.<?php echo $gst=$total*12/100; ?></td>
                                            </tr>
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">Rs.<?php echo $totals=$total+$gst; ?></td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                </div>
                                <a href="home" class="btn btn-sqr d-block " style="margin-bottom: 50px;">Continue Shopping</a>
                            </div>
                        </div>
                      
                    </div>
                   
                </div>
            </div>
        
  
    </main>
    

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