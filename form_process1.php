<?php
session_start(); 
?>
<?php 
include("includes/db.php");
include("functions/functions.php");
?>
<?php
if(isset($_SESSION['order_id']))
{
    $txnid=$_SESSION['order_id'];
}
else{
    echo "<script>window.open('checkout.php','_self')</script>";   
}
if(isset($_SESSION['c_id']))
{
    $productinfo=$_SESSION['c_id'];
}
else{
    echo "<script>window.open('checkout.php','_self')</script>";   
}

                $status="successful";
                $ip_add=getRealIpUser();
                $invoice_no=mt_rand();
                $pro_size="m";
                $select_cart = "select * from cart where ip_add='$ip_add'";
                $run_cart = mysqli_query($con,$select_cart);
                while($row_cart = mysqli_fetch_array($run_cart))
                {
                    $pro_id = $row_cart['p_id'];
                    $pro_qty = $row_cart['qty'];                
                    
                            $get_customer="select * from customers where customer_id='$productinfo'";
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
                              
                            }
                            $get_orders="select * from orders where customer_email='$customer_email'";
                            $run_orders=mysqli_query($con,$get_orders);
                            while($row_orders=mysqli_fetch_array($run_orders))
                            {
                                    $order_id=$row_orders['id'];
                                   
                            }
                           
                        $insert_customer_orders="insert into customer_orders(order_id,product_id,txnid,invoice_no,qty,size,order_date,order_status) values('$order_id','$pro_id','$txnid','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";
                        $run_customer_orders=mysqli_query($con,$insert_customer_orders);    
                        $delete_cart = "delete from cart where ip_add='$ip_add'";
                        $run_delete = mysqli_query($con,$delete_cart);            
                        echo "<script>window.open('success.php?c_id=$order_id&txnid=$txnid','_self')</script>";
                    }
              
?>