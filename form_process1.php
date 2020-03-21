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
 if (isset($_SESSION['c_id'])) {
     $c_id=$_SESSION['c_id'];
 }
 else
 {
    echo "<script>window.open('checkout.php','_self')</script>";   
 }
if(isset($_SESSION['total']))
{
    $total=$_SESSION['total'];
}
else{
    echo "<script>window.open('checkout.php','_self')</script>";  
}
                $status="successful";
                $o_status="o";
                $invoice_no=mt_rand();
                $pro_size="";          
                $pro_qty=0;
                $pro_id=0;
                $pro_name=0;
                //$c_id=49;
                            
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
                    if($key==6)
                    {
                        $papage=$value;
                    }
                    elseif($key==5)
                    {
                        $pro_size=$value;
                    }
                    elseif ($key==4) {
                        $pro_id= $value;
                    } elseif ($key ==3) {
                        $pro_qty= $value;
                    }
                    elseif($key==1)
                    {
                        $pro_name=$value;
                    }

                }
                 $insert_customer_orders="insert into customer_orders(order_id,product_id,txnid,invoice_no,qty,size,order_date,order_status,payment_status,papage_number) values('$order_id','$pro_id','$txnid','$invoice_no','$pro_qty','$pro_size',NOW(),'$o_status','$status','$papage')";
                mysqli_query($con,$insert_customer_orders);

                $paytm="Paytm";
                $insert_payment="insert into payments(invoice_no,txnid,amount,payment_mode,code_name,code,payment_date) values('$invoice_no','$txnid','$total','$paytm','','',NOW())";
                mysqli_query($con,$insert_payment);

                 if ($papage==0) {
                     $querys="update products set available_qty=available_qty-$pro_qty where product_id='$pro_id' ";
                     $run_querys=mysqli_query($db, $querys);
                 }
                 if($papage==1)
                 {
                    $querys="update accessories set available_qty=available_qty-$pro_qty where accessories_id='$pro_id' ";
                    $run_querys=mysqli_query($db, $querys);
                 }
                        unset($_SESSION[$pro_name]);  
                        echo "<script>window.open('success.php?c_id=$order_id&txnid=$txnid','_self')</script>";
                    }
              
?>