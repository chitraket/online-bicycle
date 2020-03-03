<?php
session_start(); 
?>
<?php 
include("includes/db.php");
include("functions/functions.php");
?>
<?php
if(isset($_SESSION['c_id']))
{
    $c_id=$_SESSION['c_id'];
}
else{
    echo "<script>window.open('checkout.php','_self')</script>";   
}
    $status="pending";
    $ip_add=getRealIpUser();
    $invoice_no=mt_rand();
    $pro_size="m";

    $pro_qty=0;
    $pro_id=0;
    $pro_name=0;
    
       
    

                
        
                $get_customer="select * from customers where customer_id='$c_id'";
                $run_customer=mysqli_query($con,$get_customer);
                while($row_customer=mysqli_fetch_array($run_customer))
                {

                    $customer_name=$row_customer['customer_name'];
                    $customer_email=$row_customer['customer_email'];
                    $customer_country=$row_customer['customer_state'];
                    $customer_city=$row_customer['customer_city'];
                    $customer_contact=$row_customer['customer_contact'];
                    $customer_address=$row_customer['customer_address'];
                    $insert_customer="insert into orders(customer_name,customer_email,customer_country,customer_city,customer_contact,customer_address) values('$customer_name','$customer_email','$customer_country','$customer_city','$customer_contact','$customer_address')";
                    $run_insert_customer=mysqli_query($con,$insert_customer);
                    $get_orders="select * from orders where customer_email='$customer_email'";
                    $run_orders=mysqli_query($con,$get_orders);
                    while($row_orders=mysqli_fetch_array($run_orders))
                    {
                        
                            $order_id=$row_orders['id'];
                           
                    }
                   
                }
                foreach ($_SESSION as $product) {
                    if (!is_array($product)) {
                        continue;
                    }
                foreach ($product as $key => $value) {
                    if ($key==4) {
                        $pro_id= $value;
                    } elseif ($key ==3) {
                        $pro_qty= $value;
                    }
                    elseif($key==1)
                    {
                        $pro_name=$value;
                    }

                }
                $insert_customer_orders="insert into customer_orders(order_id,product_id,txnid,invoice_no,qty,size,order_date,order_status) values('$order_id','$pro_id','','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";
                $run_customer_orders=mysqli_query($con,$insert_customer_orders);
                $querys="update products set available_qty=available_qty-$pro_qty where product_id='$pro_id' ";
                $run_querys=mysqli_query($db,$querys);   
                unset($_SESSION[$pro_name]);         
                echo "<script>window.open('success1.php?c_id=$order_id','_self')</script>";
        }

?>