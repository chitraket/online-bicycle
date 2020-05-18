<?php
session_start();
    include("includes/db.php");
?>
<?php

$record_per_page = 5;  
$page = '';  
$outputs = '';  
if(isset($_POST["page"]))  
{  
     $page = $_POST["page"];  
}  
else  
{  
     $page = 1;  
}  
$start_from = ($page - 1)*$record_per_page; 
$customer_session = $_SESSION['customer_email']; 
$query = "SELECT * FROM orders where customer_email='$customer_session' LIMIT $start_from, $record_per_page";  
$result = mysqli_query($con, $query);
$num_count=mysqli_num_rows($result);
if($num_count==0)
{
    ?>
<div class="col-12" id="cart_empty">
    <div class="section-title text-center">
        <h2 class="title">Your Order is empty</h2>
    </div>
    <center>
        <div class="action_link">
            <a href="home"><input type="submit" class="btn btn-cart2" name="add_cart" value="Start shopping"></a>
        </div>
    </center>
</div>
<?php 
}
else{
?>
<table class='table table-bordered' id='example'>
    <thead class='thead-light'>
        <tr>
            <th>Order</th>
            <th>Name</th>
            <th>Total</th>
            <th>Payment Method</th>
            <th>Action</th>
        </tr>
    </thead>
    <?php 
$i=0; 
while($row = mysqli_fetch_array($result))  
{  
    $order_id=$row['id'];
     $i++;
     ?>
    <tbody>
        <tr>
            <td> <?php echo $i; ?></td>
            <td><?php echo $row["customer_name"] ?></td>
            <?php
                    $bill=0;
                    $total=0;
                    $select_total="SELECT * FROM customer_orders WHERE order_id='$order_id'";
                    $run_total=mysqli_query($con,$select_total);
                    while ($row_total=mysqli_fetch_array($run_total)) {
                                                    
                        $qty=$row_total['qty'];
                        $product_id=$row_total['product_id'];
                        if($row_total['papage_number']==0)
                        {
                        $select_totals="SELECT * FROM products WHERE product_id='$product_id'";
                        $run_totals=mysqli_query($con,$select_totals);
                        while ($row_totals=mysqli_fetch_array($run_totals)) {
                            $bill=$row_totals['product_price']*$qty;
                        }
                     }
                     if($row_total['papage_number']==1)
                     {
                        $select_totals="SELECT * FROM accessories WHERE accessories_id='$product_id'";
                        $run_totals=mysqli_query($con,$select_totals);
                        while ($row_totals=mysqli_fetch_array($run_totals)) {
                            $bill=$row_totals['accessories_prices']*$qty;
                        }
                     }

                        $total+=$bill;
                        $gst=$total*12/100;
                        $totals=$total+$gst;
                    }
                                                
            ?>

            <td>Rs.<?php echo $totals; ?></td>
            <?php 
                                                $select_pays="SELECT DISTINCT txnid,payment_status FROM customer_orders WHERE order_id='$order_id'";
                                                $run_pays=mysqli_query($con, $select_pays);
                                                while ($row_pays=mysqli_fetch_array($run_pays)) {
                                                    $pay=$row_pays["txnid"]; 
                                                   // $payment=$row_pays['payment_status'];
                                                    
                                                        if($pay=="")
                                                        {
                                                        ?>

            <td><img src="assets/img/icon/cash-on-delivery.png" style="height:25px;" /> Cash On Delivery</td>
            <?php
                                                        
                                                        }
                                                        else{
                                                            ?>
            <td><span><img src="assets/img/icon/icons8-paytm-32.png" style="height:25px;" /> Online Payment</span></td>
            <?php
                                                        }

                                            }
                                                ?>
            <td><a href="view_order-<?php echo base64_encode($row['id']); ?>" class="btn btn-sqr">View</a>
            </td>
        </tr>
    </tbody>
    <?php 
}  
$outputs .= '</table><br /><div align="center">';  
$page_query = "SELECT * FROM orders where customer_email='$customer_session'";  
$page_result = mysqli_query($con, $page_query);  
$total_records = mysqli_num_rows($page_result);  
$total_pages = ceil($total_records/$record_per_page); 


$outputs .= '<div class="paginatoin-area text-center">
<ul class="pagination-box">';



$outputs.="<li><a class='previous'><span class='pagination_link' id='1'><i class='pe-7s-angle-left'></i></span></a></li>"; 

for($i=1; $i<=$total_pages; $i++)  
{  
    $outputs .= "
    <li class='active'>
    <a><span class='pagination_link' id='".$i."'>".$i."</span></a>
    </li>";
}  
$outputs.="<li><a class='next'><span class='pagination_link' id='".$total_pages."'><i class='pe-7s-angle-right'></i></span></a></li>";
 $outputs.= '</ul>
 </div>';   
echo $outputs;
}
?>