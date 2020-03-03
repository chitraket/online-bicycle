<?php if (isset($_POST["order_id"])) {
    include("includes/db.php");
    ?>
<p class="mb-2">Order id: <span class="text-primary"><?php echo $_POST["order_id"] ?></span></p>
<?php
 $order_id=$_POST["order_id"];
 $get_product="select * from orders where id=$order_id";
 $run_product=mysqli_query($con,$get_product);
 while ($row_product=mysqli_fetch_array($run_product)) {
     ?>
                                <p class="mb-2">Billing Name: <span class="text-primary"><?php echo $row_product["customer_name"]; ?></span></p>
                                <p class="mb-2">Order Address: <span class="text-primary"><?php echo $row_product["customer_address"]; ?></span></p>
                                <p class="mb-3">Contact Number: <span class="text-primary"><?php echo $row_product["customer_contact"]; ?></span></p>
<?php
 }
 ?>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $bill=0;
                                                $total=0;
                                                 $get_products="select * from customer_orders where order_id=$order_id";
                                                 $run_products=mysqli_query($con,$get_products);
                                                 while ($row_products=mysqli_fetch_array($run_products)) {
                                                     $product_id=$row_products["product_id"];
                                                     $product_qty=$row_products["qty"];
                                                     $get_productss="select * from products where product_id=$product_id";
                                                     $run_productss=mysqli_query($con,$get_productss);
                                                     while ($row_productss=mysqli_fetch_array($run_productss)) {
                                                         ?>
                                                <th scope="row">
                                                    <div>
                                                        <img src="product_images/<?php echo $row_productss["product_img1"]; ?>" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14"><?php echo $row_productss["product_title"]; ?></h5>
                                                        <p class="text-muted mb-0"><?php echo $row_productss["product_price"]; ?> x <?php echo $product_qty; ?></p>
                                                    </div>
                                                </td>
                                                <td>Rs.<?php  echo $bill= $product_qty*$row_productss["product_price"]; ?></td>
                                            </tr>
                                            <?php
                                                $total+=$bill;
                                                     }   
                                                 }?>
                                         
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                                </td>
                                                <td>Rs.<?php echo $total; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Shipping:</h6>
                                                </td>
                                                <td>
                                                    Free
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                Rs.<?php echo $total; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
<?php 
}
?>