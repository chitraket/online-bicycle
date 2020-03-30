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
                                                     $product_size=$row_products["size"];
                                                     $product_papage=$row_products["papage_number"];
                                                        
                                                     if ($product_papage==0) {
                                                         $get_productss="select * from products where product_id=$product_id";
                                                         $run_productss=mysqli_query($con, $get_productss);
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
                                                        <p class="text-muted mb-0">Size : <?php echo $product_size; ?></p>
                                                        <p class="text-muted mb-0"><?php echo $row_productss["product_price"]; ?> x <?php echo $product_qty; ?></p>
                                                    </div>
                                                </td>
                                                <td>Rs.<?php  echo $bill= $product_qty*$row_productss["product_price"]; ?></td>
                                            </tr>
                                            <?php
                                                $total+=$bill;
                                                         }
                                                     }
                                                         if ($product_papage==1) {
                                                             $get_accessories="select * from accessories where accessories_id=$product_id";
                                                             $run_accessories=mysqli_query($con, $get_accessories);
                                                             while ($row_accessories=mysqli_fetch_array($run_accessories)) {
                                                                 ?>
                                                                  <th scope="row">
                                                    <div>
                                                        <img src="accessories_images/<?php echo $row_accessories["accessories_image_1"]; ?>" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14"><?php echo $row_accessories["accessories_name"]; ?>
                                                                
                                                    </h5>
                                                    <p class="text-muted mb-0">Size :  <?php echo $product_size; ?></p>
                                                        <p class="text-muted mb-0"><?php echo $row_accessories["accessories_prices"] ?> x <?php echo $product_qty; ?></p>
                                                    </div>
                                                </td>
                                                <td>Rs.<?php  echo $bill= $product_qty*$row_accessories["accessories_prices"] ?></td>
                                            </tr>
                                            <?php
                                                $total+=$bill;
                                                                
                                                             }
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
                                                    
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                
                                                
                                                Rs.<?php echo $total; ?>
                                                </td>
                                            </tr>
                                            
                                                
                                                    
                                            
                                            
                                        </tbody>
                                    </table>
                                    <?php
                                     $get_status="select DISTINCT order_status,invoice_no,txnid from customer_orders where order_id=$order_id";
                                     $run_status=mysqli_query($con,$get_status);
                                     while ($row_status=mysqli_fetch_array($run_status)) {
                                         $product_status=$row_status['order_status']; 
                                         $product_invoice=$row_status['invoice_no'];
                                         $txnid=$row_status['txnid'];?>
                                    <div class="text-left m-2">
                                    <?php
                                    if ($product_status=="o") {
                                        ?>
                                            <a href="delete.php?del_id=<?php echo $order_id; ?>&status=p"><input type="button" class="btn btn-primary"  value="Packed" ></a> 
                                            <span class="ml-2 badge badge-pill badge-soft-success font-size-10" >Ordered And Approved</span>  
                                    <?php
                                        }
                                    if($product_status=="p")
                                    {
                                    ?>
                                        <a href="delete.php?del_id=<?php echo $order_id; ?>&status=s"><input type="button" class="btn btn-primary" value="Shipped" > </a>
                                            <span class="ml-2 badge badge-pill badge-soft-success font-size-10" >Packed</span>  
                                    <?php 
                                    }
                                    if ($product_status=="s") {
                                        ?>
                                        <a href="delete.php?del_id=<?php echo $order_id; ?>&status=d"><input type="button" class="btn btn-primary"  value="Delivered" ></a>
                                            <span class="ml-2 badge badge-pill badge-soft-success font-size-10" >Shipped</span> 
                                    <?php
                                    } 
                                    if ($product_status=="d") {
                                        if ($txnid==" ") {
                                            $payment_mode="Cash on Delivery";
                                            $insert_payment="insert into payments(invoice_no,txnid,amount,payment_mode,code_name,code,payment_date) values('$product_invoice','','$total','$payment_mode','','',NOW())";
                                            $run_payment=mysqli_query($con, $insert_payment);
                                          
                                        }
                                                                         
                                        ?>

                                        <span class="ml-2 badge badge-pill badge-soft-success font-size-10" >Delivered</span> 
                                    <?php
                                    } 
                                    ?>
                                <script language="javascript">
                                            function deleteme(delid,status)
                                            {
                                            //     alert(delid);
                                            // if(confirm("Do you want Delete!")){
                                             window.location.href='delete.php?del_id='+delid+'&status='+status+'';
                                            // //return true;
                                            // }

                                           
                                            } 
                                            </script>
                            </div>
                            <?php
                                     } 

                            ?>
                                </div>
                               
<?php 
}
?>    
