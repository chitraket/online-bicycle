<div class="offcanvas-minicart-wrapper">
        <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
                    <div class="minicart-close">
                        <i class="pe-7s-close"></i>
                    </div>
        
    
        
                <div class="minicart-content-box">
                    <div class="minicart-item-wrapper">
                        <ul>
                        <?php
                                  $bill=0;
                                  $p_id=0;
                                  $p_img=0;
                                  $p_name=0;
                                  $p_qty=0;
                                  $p_price=0;
                                 $total=0;
                                  foreach ($_SESSION as $product) {
try {

    if(!is_array($product))
    {
        continue;
    }

    foreach ($product as $key => $value) {
        if ($key==4) {
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
}
catch(Exception $ex)
{
    continue;
}
                                      $bill=$p_qty*$p_price;
                                      $total+=$bill;
                                      ?>
                                    

                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="../product-details.php?pro_id=<?php echo $p_id ?>">
                                        <img src="../admin_area/product_images/<?php echo $p_img ?>" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="../product-details.php?pro_id=<?php echo $p_id ?>"><?php echo $p_name ?></a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity"><?php echo $p_qty ?> <strong> | </strong></span>
                                        <span class="cart-price">Rs.<?php echo $bill ?>  </span>
                                    </p>
                                </div>
                                <!--
                                <form method="POST">
                                <button  name="close" class="minicart-remove"><i class="pe-7s-close"></i></button>
                                </form>-->
                            </li>
                            <?php     
                                        }
                                    
                                    ?>
                        </ul>
                    </div>
                   
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
           
        </div>
    </div>
</div>