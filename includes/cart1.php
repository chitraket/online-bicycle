
<div class="offcanvas-minicart-wrapper">
        <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
                    <div class="minicart-close">
                        <i class="pe-7s-close"></i>
                    </div>
                    
                    
                        <div class="minicart-content-box" id="cart_1_empty">
                            <div style="padding-top: 200px;">
                                        
                                <div class='section-title text-center'>
                                    <h2 class='title'>Your cart is empty</h2>
                                </div>
                                <center>
                                    <div class="action_link" style="margin-top: -10px;">
                                        <a href="home"><input type="submit" class="btn btn-cart2" name="add_cart" value="Start shopping" ></a>
                                    </div>   
                                </center>       
                            </div>
                        </div>
         
        
                <div class="minicart-content-box" id="table_carts">
                    <div class="minicart-item-wrapper">
                    <style>
                                    #table_carts{
                                        display: none;
                                    }
                    </style>
                        <ul>
                        <?php
                        $size=0;
                                $papage=0;
                                  $bill=0;
                                  $p_id=0;
                                  $p_img=0;
                                  $p_name=0;
                                  $p_qty=0;
                                  $p_price=0;
                                 $total=0;
                            foreach ($_SESSION as $product) {
                                 if(!is_array($product))
                                    {
                                        continue;
                                    }
                                    ?>
                                    <style>
                                    #cart_1_empty{
                                        display: none;
                                    }

                                    #table_carts{
                                        display: block;
                                    }
                                    </style>
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
                                         elseif ($key==4) {
                                              $p_id= $value;
                                          } elseif ($key ==3) {
                                              $p_qty= $value;
                                          } elseif ($key ==2) {
                                              $p_price= $value;
                                          } elseif ($key==1) {
                                              $p_name= $value;
                                          } elseif ($key==0) {
                                              $p_img= $value;
                                          } 
                                          
                                         }
                                         $bill=$p_price*$p_qty;
                                         $total+=$bill;
                                         if ($papage==0) {
                                             ?>
                                        <li class="minicart-item">
                                            <div class="minicart-thumb">
                                                <a href="bikes-details?pro_id=<?php echo base64_encode($p_id) ?>">
                                                    <img src="admin_area/product_images/<?php echo $p_img ?>" alt="product">
                                                </a>
                                            </div>
                                            <div class="minicart-content">
                                                <h3 class="product-name">
                                                    <a href="bikes-details?pro_id=<?php echo base64_encode($p_id); ?>"><?php echo $p_name ?></a>
                                                </h3>
                                                <p>
                                                    <span class="cart-quantity"><?php echo $p_qty ?> <strong> | </strong></span>
                                                    <span class="cart-price">Rs.<?php echo $bill ?>  </span>
                                                </p>
                                            </div>
                                            <!--<form action="edit-cart.php" method="POST">
                                            <button  name="event" value="Delete" class="minicart-remove"><i class="pe-7s-close"></i></button>
                                            </form>-->
                                        </li>
                            <?php
                                         }
                                         if ($papage==1) {
                                             ?>
                                             <li class="minicart-item">
                                            <div class="minicart-thumb">
                                                <a href="accessories-details?accessories_id=<?php echo base64_encode($p_id); ?>">
                                                    <img src="admin_area/accessories_images/<?php echo $p_img ?>" alt="product">
                                                </a>
                                            </div>
                                            <div class="minicart-content">
                                                <h3 class="product-name">
                                                    <a href="accessories-details?accessories_id=<?php echo base64_encode($p_id); ?>"><?php echo $p_name ?></a>
                                                </h3>
                                                <p>
                                                    <span class="cart-quantity"><?php echo $p_qty ?> <strong> | </strong></span>
                                                    <span class="cart-price">Rs.<?php echo $bill ?>  </span>
                                                </p>
                                            </div>
                                            <!--<form action="edit-cart.php" method="POST">
                                            <button  name="event" value="Delete" class="minicart-remove"><i class="pe-7s-close"></i></button>
                                            </form>-->
                                        </li>
                            <?php
                                         }        

                                  }
                            ?>
                            
                        </ul>
                    </div>
                   
                    <div class="minicart-pricing-box">
                        <ul>
                            <li>
                                <span>sub-total</span>
                                <span><strong>Rs.<?php echo $total; ?></strong></span>
                            </li>
                            <li>
                                <span>GST (12%) </span>
                                <span><strong>Rs.<?php echo $gst=$total*12/100; ?></strong></span>
                            </li>
                            <li class="total">
                                <span>total</span>
                                <span><strong>Rs.<?php echo $totals=$total+$gst; ?></strong></span>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-button">
                        <a href="cart"><i class="fa fa-shopping-cart"></i> View Cart</a>
                        <a href="checkout"><i class="fa fa-share"></i> Checkout</a>
                    </div>
                </div>
         
        </div>
    </div>
</div>
