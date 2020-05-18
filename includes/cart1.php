<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>




            <?php 
        if(isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart']))
        {
            $total=0;
            ?>
            <div class="minicart-content-box" id="table_carts">
                <div class="minicart-item-wrapper">
                    <ul>
                        <?php
                            foreach ($_SESSION['shopping_cart'] as $key => $values) {
                                         $total=$total+$values['item_price']*$values['item_qty'];
                                         if ($values['papage']==0) {
                                             ?>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="bikes-<?php echo base64_encode($values['item_id']) ?>">
                                    <img src="admin_area/product_images/<?php echo $values['item_img'] ?>"
                                        alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a
                                        href="bikes-<?php echo base64_encode($values['item_id']); ?>"><?php echo $values['item_name']; ?></a>
                                </h3>
                                <p>
                                    <span class="cart-quantity"><?php echo $values['item_qty']; ?> <strong> |
                                        </strong></span>
                                    <span class="cart-price">Rs.<?php echo $values['item_price']*$values['item_qty'];?>
                                    </span>
                                </p>
                            </div>
                        </li>
                        <?php
                                         }
                                         if ($values['papage']==1) {
                                             ?>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="accessories-<?php echo base64_encode($values['item_id']); ?>">
                                    <img src="admin_area/accessories_images/<?php echo $values['item_img']; ?>"
                                        alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a
                                        href="accessories-<?php echo base64_encode($values['item_id']); ?>"><?php echo $values['item_name']; ?></a>
                                </h3>
                                <p>
                                    <span class="cart-quantity"><?php echo $values['item_qty']; ?> <strong> |
                                        </strong></span>
                                    <span class="cart-price">Rs.<?php echo $values['item_price']*$values['item_qty']; ?>
                                    </span>
                                </p>
                            </div>
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
            <?php
        }
        else{
            ?>
            <div class="minicart-content-box" id="cart_1_empty">
                <div style="padding-top: 200px;">

                    <div class='section-title text-center'>
                        <h2 class='title'>Your cart is empty</h2>
                    </div>
                    <center>
                        <div class="action_link" style="margin-top: -10px;">
                            <a href="home"><input type="submit" class="btn btn-cart2" name="add_cart"
                                    value="Start shopping"></a>
                        </div>
                    </center>
                </div>
            </div>
            <?php 
        }
        ?>


        </div>
    </div>
</div>