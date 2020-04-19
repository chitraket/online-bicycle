
    <!-- Start Header Area -->
    <?php
       $active='';
       include("includes/header.php");
       if(isset($_POST['action']) && $_POST['action']=="change")
       {   
        $product_qty=$_POST["product-qty"];
        $product_img= $_POST["p_img"];
        $product_name= $_POST["p_name"];
        $product_price= $_POST["p_price"];
        $p_id= $_POST["code"];
        $p_size=$_POST["p_size"]; 
        $papage=$_POST["papage"];
        if($papage==0)
        {
        $get_product="select * from products where product_id=$p_id";
        $run_product=mysqli_query($con,$get_product);
        $row_product=mysqli_fetch_array($run_product);
        $pro_qty=$row_product['available_qty'];
        }
        if($papage==1)
        {
            $get_product="select * from accessories where accessories_id=$p_id";
            $run_product=mysqli_query($con,$get_product);
            $row_product=mysqli_fetch_array($run_product);
            $pro_qty=$row_product['available_qty'];
        }
        if ($product_qty>$pro_qty) 
        {
            echo "<script type='text/javascript'>swal('Please enter lower quantity', '', 'warning')</script>";
        }
        else{
            $product= array($product_img,$product_name,$product_price,$product_qty,$p_id,$p_size,$papage);
            $_SESSION[$product_name.$p_id]=$product;
        }
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
                                    <li class="breadcrumb-item"><a href="home"><i class="fa fa-home"></i></a></li>
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
            <a href="home"><input type="submit" class="btn btn-cart2" name="add_cart" value="Start shopping"></a>
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
                                            <th class="pro-thumbnail">Image</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Size</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove">Remove</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <style>
                                    #table_cart{
                                        display: none;
                                    }
                                    </style>
                               
                                  <?php
                                  $papage=0;
                                  $size=0;
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
                                          if($key==6)
                                          {
                                              $papage=$value;
                                          }
                                          elseif($key==5)
                                          {
                                              $size=$value;
                                          }
                                          elseif($key==4)
                                          {
                                             $p_id=$value;
                                          }
                                        elseif ($key==3) {
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
                                      if ($papage==0) {
                                          ?>

                                    <td class="pro-thumbnail"><a href="bikes-details?pro_id=<?php echo base64_encode($p_id); ?>"><img class="img-fluid" src="admin_area/product_images/<?php echo $p_img ?>" alt="Product" /></a></td>
                                   
                                    <td class="pro-title">
                                        
                                        <a href="bikes-details?pro_id=<?php echo base64_encode($p_id); ?>"><?php  echo $p_name ?></a>
                                    </td>
                                    <td class="pro-price"><span><?php echo $size ?></span></td>  

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
                                                    <input type="hidden" name="p_size" value="<?php echo $size?>">
                                                    <input type="hidden" name="papage" value="<?php echo $papage?>">
                                    </form>
                                    <td class="pro-subtotal"><span>Rs. <?php echo $bill ?></span></td>
                                    <td class="pro-remove"><a href="delete-cart?p_name=<?php echo base64_encode($p_name);?>&p_id=<?php echo base64_encode($p_id); ?>" class="btn-delete"><i class="fa fa-trash-o"></i></a></td>
                                     <?php
                                      }
                                      if ($papage==1) {
                                          ?>
                                    
                                  
                                    <td class="pro-thumbnail"><a href="accessories-details?accessories_id=<?php echo  base64_encode($p_id); ?>"><img class="img-fluid" src="admin_area/accessories_images/<?php echo $p_img ?>" alt="Product" /></a></td>
                                    
                                    <td class="pro-title">
                                        
                                        <a href="accessories-details?accessories_id=<?php echo base64_encode($p_id); ?>" ><?php  echo $p_name ?></a>
                                    </td>
                                    
                                    <td class="pro-price"><span><?php echo $size ?></span></td>

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
                                                    <input type="hidden" name="p_size" value="<?php echo $size?>">
                                                    <input type="hidden" name="papage" value="<?php echo $papage?>">
                                    </form>
                                    <td class="pro-subtotal"><span>Rs. <?php echo $bill ?></span></td>
                                        <form method="POST" action=""> 
                                        <td class="pro-remove"><a href="delete-cart?p_name=<?php echo base64_encode($p_name);?>&p_id=<?php echo base64_encode($p_id); ?>" class="btn-delete"><i class="fa fa-trash-o"></i></a></td>
                                        </form>
                                        <?php
                                      }
                                      ?>
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
                                    <a href="home"><input type="submit" name="update" class="btn btn-sqr" value="Continue Shopping"></a>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Cart Total</h6>
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
                                <a href="checkout" class="btn btn-sqr d-block">Proceed Checkout</a>
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
                        buttons: [,"Ok"],
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('cart','_self'); 
                        } else {
                        
                        }
                });
                
           }    
        </script> 
    
</body>

</html>