<div class="offcanvas-minicart-wrapper">
        <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
                    <div class="minicart-close">
                        <i class="pe-7s-close"></i>
                    </div>
        <?php

            $ip_add=getRealIpUser();
            $select_cat="select * from cart where ip_add='$ip_add'";
            $run_cart=mysqli_query($con,$select_cat);
            $count=mysqli_num_rows($run_cart);
            if($count==0)
            {?>
                    
                    
                        <div class="minicart-content-box">
                            <div style="padding-top: 200px;">
                                        
                                <div class='section-title text-center'>
                                    <h2 class='title'>Your cart is empty</h2>
                                </div>
                                <center>
                                    <div class="action_link" style="margin-top: -10px;">
                                        <a href="../index.php"><input type="submit" class="btn btn-cart2" name="add_cart" value="Start shopping" ></a>
                                    </div>   
                                </center>       
                            </div>
                        </div>
            <?php 
            }
            else{
        ?>
        
                <div class="minicart-content-box">
                    <div class="minicart-item-wrapper">
                        <ul>
                        <?php
                                    
                                    $total=0;
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

                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="product-details.php?pro_id=<?php echo $pro_id ?>">
                                        <img src="../admin_area/product_images/<?php echo $product_img1 ?>" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="../product-details.php?pro_id=<?php echo $pro_id ?>"><?php echo $product_title ?></a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity"><?php echo $pro_qty ?> <strong> | </strong></span>
                                        <span class="cart-price">Rs.<?php echo $sub_total ?>  </span>
                                    </p>
                                </div>
                                <form method="POST">
                                <button  name="close" class="minicart-remove"><i class="pe-7s-close"></i></button>
                                </form>
                            </li>
                            <?php     
                                        }
                                    }
                                    
                                    ?>
                        </ul>
                    </div>
                    <?php
                    if(isset($_POST["close"]))
                    {
                        echo "<script>window.open('../cart.php?p_id=$pro_id ','_self')</script>";   
                    } 
                    ?>
                    <div class="minicart-pricing-box">
                        <ul>
                            <!--<li>
                                <span>sub-total</span>
                                <span><strong>$300.00</strong></span>
                            </li>
                            <li>
                                <span>Eco Tax (-2.00)</span>
                                <span><strong>$10.00</strong></span>
                            </li>
                            <li>
                                <span>VAT (20%)</span>
                                <span><strong>$60.00</strong></span>
                            </li>-->
                            <li class="total">
                                <span>total</span>
                                <span><strong>Rs.<?php echo $total ?></strong></span>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-button">
                        <a href="../cart.php"><i class="fa fa-shopping-cart"></i> View Cart</a>
                        <a href="../checkout.php"><i class="fa fa-share"></i> Checkout</a>
                    </div>
                </div>
            <?php
            } 
            ?>

            <?php           
                update_cart();            
            ?>
        </div>
    </div>
</div>