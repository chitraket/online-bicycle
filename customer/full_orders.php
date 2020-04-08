<?php
$active='';
include("includes/db.php");
include("includes/header.php");
if(!isset($_SESSION['customer_email']))
{
    echo "<script>window.open('customer_login.php','_self')</script>";
}
?>
    <!-- end Header Area -->
<?php 
 if(isset($_GET['o_id']))
 {
     $o_id=$_GET['o_id'];
 }
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
                                    <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="myaccount.php">my-account</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">view order</li>
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
        <div class="text-center mb-4">
        <?php 
          $select_cats="select DISTINCT txnid,invoice_no from customer_orders where order_id='$o_id'";
          $run_carts =mysqli_query($con,$select_cats);
              while($row_carts=mysqli_fetch_array($run_carts)){
                  ?>
                   <p>Invoice Number : <?php echo $row_carts['invoice_no']; ?></p>
                  <?php 
                  if($row_carts['txnid']=="")
                  {
                      ?>
                    <p>Payment Method : <img src="assets/img/icon/cash-on-delivery.png" style="height:25px;"/> Cash On Delivery</p>
                    <?php 
                  }else
                  {
                    ?>
                    <p>Transaction ID : <?php echo $row_carts['txnid']; ?></p>
                    <p>Payment Method :  <img src="assets/img/icon/icons8-paytm-32.png" style="height:25px;"/> Online Payment</p>
                    <?php 
                  }
                  ?>
                   
                  <?php 
              }
        ?>
                </div>
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table  class="table table-bordered">
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
                                   
                                    $total=0;
                                    $select_cat="select * from customer_orders where order_id='$o_id'";
                                    $run_cart =mysqli_query($con,$select_cat);
                                        while($row_cart=mysqli_fetch_array($run_cart)){
                                        $pro_id=$row_cart['product_id'];
                                        $pro_qty=$row_cart['qty'];
                                        $pro_size=$row_cart['size'];
                                        $papage=$row_cart['papage_number'];
                                        if ($papage==0) {
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
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="../admin_area/product_images/<?php echo $product_img1 ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="../product-details.php?pro_id=<?php echo $pro_id ?>"><?php  echo $product_title ?></a></td>
                                            <td class="pro-price"><span><?php echo $pro_size ?></span></td>
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
                                        if($papage==1)
                                        {
                                            $get_accessories="select * from accessories where accessories_id='$pro_id'";
                                            $run_accessories=mysqli_query($con, $get_accessories);
                                            while ($row_accessories=mysqli_fetch_array($run_accessories)) {
                                                $accessories_name=$row_accessories['accessories_name'];
                                                $accessories_price=$row_accessories['accessories_prices'];
                                                $accessories_img1=$row_accessories['accessories_image_1'];
                                                $sub_total=$row_accessories['accessories_prices']*$pro_qty;
                                                $total+=$sub_total; ?>
                                        <tbody>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="../admin_area/accessories_images/<?php echo $accessories_img1; ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="../accessories-details.php?accessories_id=<?php echo $pro_id ?>"><?php  echo $accessories_name; ?></a></td>
                                            <td class="pro-price"><span><?php echo $pro_size ?></span></td>
                                            <td class="pro-price"><span>Rs.<?php echo $accessories_price; ?></span></td>
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
                                       ?> 
     
                                </table>
                            </div>
                            
                            <!-- Cart Update Option -->
                            
                        </div>
                    </div>
                    <div class="row">

                    <div class="col-lg-6 mr-auto">
                        <div class="contact-info">
                            <h4 class="contact-title"></h4>
                            <?php 
                                    if(isset($_GET['o_id']))
                                    {
                                        $customer_address='';
                                        $customer_email='';
                                        $customer_phone='';
                                        $productinfo=$_GET['o_id'];
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
                    </div>
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
                                            <tr>
                                                <td>Shipping</td>
                                                <td>$70</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">Rs.<?php echo $total ?></td>
                                               
                                            </tr>
                                        </table>
                                        <?php 
                                        $select_status="select DISTINCT order_status,payment_status,invoice_no from customer_orders where order_id='$o_id' ";
                                            $run_status = mysqli_query($con,$select_status);
                                            while ($row_status = mysqli_fetch_array($run_status)) {
                                            $order_status=$row_status['order_status']; 
                                            $payment_status=$row_status['payment_status'];
                                            $_SESSION['invoice_no']=$row_status['invoice_no'];
                                            if($order_status=="c" || $payment_status=="cancel")
                                            {
                                               ?> 
                                               <div class="section-title text-center mt-2">
                                                 <h2 class="title">Order cancel</h2>
                                                </div> 
                                                <?php    
                                            }
                                            else if($order_status=="r" || $payment_status=="returned")
                                            {
                                                ?>
                                                <div class="section-title text-center mt-2">
                                                <h2 class="title">Order returned</h2>
                                               </div>  
                                                <?php 
                                            }
                                            else
                                            {
                                            ?>
                                        <div class="mb-4">
                                        <div class="card-body" > 
                                        <div class="track">
                                            <?php
                                            
                                                if($order_status=="o")
                                                {
                                                    ?>
                                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                                    <div class="step"> <span class="icon"> <i class="fa fa-map"></i> </span> <span class="text">Ready for pickup</span> </div>
                                                  
                                                    <?php     
                                                }
                                                if($order_status=="p")
                                                {
                                                    ?>
                                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                                    <div class="step"> <span class="icon"> <i class="fa fa-map"></i> </span> <span class="text">Ready for pickup</span> </div>
                                                    <?php 
                                                }
                                                if($order_status=="s")
                                                {
                                                    ?>
                                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                                    <div class="step"> <span class="icon"> <i class="fa fa-map"></i> </span> <span class="text">Ready for pickup</span> </div>
                                                    <?php 
                                                }
                                                if($order_status=="d")
                                                {
                                                    ?>
                                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                                    <div class="step active"> <span class="icon"> <i class="fa fa-map"></i> </span> <span class="text">Ready for pickup</span> </div>
                                                    <?php 
                                                }
                                                
                                                ?>
                                        </div>
                                    </div>
                                        </div>
                                        <div class="m-2 mb-2">
                                        <?php
                                        if($order_status=="o")
                                        {
                                            ?>
                                                <td class="pro-subtotal"><a href="orders_delete.php?o_id=<?php echo $o_id; ?>" class="btn btn-sqr" id="btn-delete">Cancel Order</a></td>
                                            <?php 
                                        }
                                        if($order_status=="p")
                                        {
                                            ?>
                                                <td class="pro-subtotal"><a href="orders_delete.php?o_id=<?php echo $o_id; ?>" class="btn btn-sqr" id="btn-delete">Cancel Order</a></td>
                                           
                                            <?php 
                                        }
                                        if($order_status=="s")
                                        {
                                            ?>
                                             
                                                <td class="pro-subtotal"><a href="orders_delete.php?o_id=<?php echo $o_id; ?>" class="btn btn-sqr" id="btn-delete">Cancel Order</a></td>
                                           
                                            <?php 
                                        }
                                        if($order_status=="d")
                                        {
                                               ?>
                                               <td class="pro-subtotal"><a href="orders_returned.php?o_id=<?php echo $o_id; ?>" class="btn btn-sqr" id="btn-returned">Returned Order</a></td>
                                               <?php     
                                        }
                                        
                                        if($order_status=="o" && $payment_status=="pending")
                                        {
                                            ?>
                                                <td class="pro-subtotal"><a href="payment.php?o_id=<?php echo $productinfo; ?>&amount=<?php echo $total; ?>" class="btn  btn-sqr">Payment</a></td>
                                            <?php 
                                        }
                                        if($order_status=="p" && $payment_status=="pending")
                                        {
                                            ?>
                                                <td class="pro-subtotal"><a href="payment.php?o_id=<?php echo $productinfo; ?>&amount=<?php echo $total; ?>" class="btn btn-sqr">Payment</a></td>
                                            <?php 
                                        }
                                        if($order_status=="s" && $payment_status=="pending")
                                        {
                                            ?>
                                                <td class="pro-subtotal"><a href="payment.php?o_id=<?php echo $productinfo; ?>&amount=<?php echo $total; ?>" class="btn btn-sqr">Payment</a></td>
                                            <?php 
                                        }
                                        ?>
                                        
                                                <td class="pro-subtotal"><a href="Generate_bill.php?o_id=<?php echo $o_id; ?>" class="btn btn-sqr">Generate bill</a></td>
                                            </div>
                                 
                                <?php 
                                            }
                                        }
                                        
                                            ?>

                                </div>
                                </div>
                              <!--  <a href="checkout.php" class="btn btn-sqr d-block">Proceed Checkout</a>-->
                            </div>
                        </div>
                      
                    </div>
                   
                </div>
            </div>
            
        </div>
        <!-- cart main wrapper end -->
    </main>
<?php
if(isset($_GET['m']))
{ 
?>
<div class="flash-data" data-flashdata="<?php echo $_GET['m'] ?>"></div>
<?php
} 
?>
 <?php
if(isset($_GET['n']))
{ 
?>
<div class="flash-datas" data-flashdata="<?php echo $_GET['n'] ?>"></div>
<?php
} 
?>      
     
   

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
    <script>
           $('#btn-delete').on('click',function(e){
               e.preventDefault();
               const href =$(this).attr('href')
               swal({
                        title: "Are you sure?",
                        text: "Order cancel.",
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
           
           $('#btn-returned').on('click',function(e){
               e.preventDefault();
               const href =$(this).attr('href')
               swal({
                        title: "Are you sure?",
                        text: "Order returned.",
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
                        title: "successful order cancel.",
                        text: "",
                        icon: "success",
                        buttons: true,
                        successMode: true,
                })
           }
           const flashdatas=$('.flash-datas').data('flashdata')
           if(flashdatas){
            swal({
                        title: "successful order returned.",
                        text: "",
                        icon: "success",
                        buttons: true,
                        successMode: true,
                })
           }
   </script> 

</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:06 GMT -->
</html>


