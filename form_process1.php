<?php
session_start(); 
?>
<?php 
include("includes/db.php");
include("functions/functions.php");
?>
<?php 
           
           if(!isset($_SESSION['customer_email'])){
               ?>
            <script>window.open('customer/login','_self')</script>
            <?php
           }
           else{

?>
<?php

 if(isset($_SESSION['order_id']))
 {
     $txnid=$_SESSION['order_id'];
 }
 else{
     ?>
    <script>window.open('home','_self')</script>  
    <?php 
}
 if (isset($_SESSION['c_id'])) {
     $c_id=$_SESSION['c_id'];
 }
 else{
    ?>
    <script>window.open('home','_self')</script>
    <?php
}
                $status="successful";
                $o_status="o";
                $invoice_no=mt_rand();
                $pro_size="";          
                $pro_qty=0;
                $pro_id=0;
                $pro_name=0;
                $sub_total=0;
                $total=0;
                $pro_price=0;
                $totals=0;
                //$c_id=49;
                $customer_email='';
                $customer_address='';
                            
                $get_customer="select * from customers where customer_id='$c_id'";
                $run_customer=mysqli_query($con,$get_customer);
                while($row_customer=mysqli_fetch_array($run_customer))
                {

                    $customer_name=$row_customer['customer_name'];
                    $customer_lname=$row_customer['customer_lname'];
                    $customer_email=$row_customer['customer_email'];
                    $customer_country=$row_customer['customer_state'];
                    $customer_city=$row_customer['customer_city'];
                    $customer_contact=$row_customer['customer_contact'];
                    $customer_address=$row_customer['customer_address'];
                    $customer_pincode=$row_customer['customer_pincode'];
                    $insert_customer="insert into orders(customer_name,customer_email,customer_country,customer_city,customer_pincode,customer_contact,customer_address) values('$customer_name $customer_lname','$customer_email','$customer_country','$customer_city','$customer_pincode','$customer_contact','$customer_address')";
                    $run_insert_customer=mysqli_query($con,$insert_customer);
                    $get_orders="select * from orders where customer_email='$customer_email'";
                    $run_orders=mysqli_query($con,$get_orders);
                    while($row_orders=mysqli_fetch_array($run_orders))
                    {
                        
                            $order_id=$row_orders['id'];
                           
                    }
                   
                }
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    $pro_qty=$value['item_qty'];
                    $pro_id=$value['item_id'];
                    $pro_size=$value['item_size'];
                    $pro_price=$value['item_price'];
                    $papage=$value['papage'];
                    $pro_name=$value['item_name'];
                    $total=$total+$value['item_price']*$value['item_qty'];
                 $insert_customer_orders="insert into customer_orders(order_id,product_id,txnid,invoice_no,qty,size,customer_email,order_date,order_status,payment_status,papage_number) values('$order_id','$pro_id','$txnid','$invoice_no','$pro_qty','$pro_size','$customer_email',NOW(),'$o_status','$status','$papage')";
                $run_customer_orders=mysqli_query($con,$insert_customer_orders);

                 if ($papage==0) {
                     $querys="update products set available_qty=available_qty-$pro_qty where product_id='$pro_id' ";
                     $run_querys=mysqli_query($db, $querys);
                     unset($_SESSION['shopping_cart'][$key]);  
                 }
                 if($papage==1)
                 {
                    $querys="update accessories set available_qty=available_qty-$pro_qty where accessories_id='$pro_id' ";
                    $run_querys=mysqli_query($db, $querys);
                    unset($_SESSION['shopping_cart'][$key]);  
                 }
                
                    }
                    $gsst=$total*12/100;
                    $totolls=$total+$gsst;
                    $paytm="Paytm";
                    $insert_payment="insert into payments(invoice_no,txnid,amount,payment_mode,code_name,code,payment_date) values('$invoice_no','$txnid','$totolls','$paytm','','',NOW())";
                    $run_payments=mysqli_query($con,$insert_payment);
                    require 'PHPMailer/PHPMailerAutoload.php';
                    $mail=new PHPMailer;
                    try {
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'ssl://smtp.gmail.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'skotebicycle@gmail.com';                     // SMTP username
                        $mail->Password   = 'Ab7man91';                               // SMTP password
                        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                        $mail->Port       = 465;                                    // TCP port to connect to
                
                        //Recipients
                        $mail->setFrom('skotebicycle@gmail.com', 'SKOTE');
                        $mail->addAddress($customer_email, $customer_email);     // Add a recipient
                        // Attachments
                        // Optional name
                       
                        $html='<!DOCTYPE html>
                        <html lang="en">
                        <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
                                <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
                                <title>SKOTE - Bikes Shop</title>
                                <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
                                <style type="text/css">
                                    body{
                                        text-align: center;
                                        margin: 0 auto;
                                        width: 650px;
                                        font-family: "Open Sans", sans-serif;
                                        background-color: #e2e2e2;		      	
                                        display: block;
                                    }
                                    ul{
                                        margin:0;
                                        padding: 0;
                                    }
                                    li{
                                        display: inline-block;
                                        text-decoration: unset;
                                    }
                                    a{
                                        text-decoration: none;
                                    }
                                    p{
                                        margin: 15px 0;
                                    }
                        
                                    h5{
                                        color:#444;
                                        text-align:left;
                                        font-weight:400;
                                    }
                                    .text-center{
                                        text-align: center
                                    }
                                    .main-bg-light{
                                        background-color: #fafafa;
                                    }
                                    .title{
                                        color: #444444;
                                        font-size: 22px;
                                        font-weight: bold;
                                        margin-top: 10px;
                                        margin-bottom: 10px;
                                        padding-bottom: 0;
                                        text-transform: uppercase;
                                        display: inline-block;
                                        line-height: 1;
                                    }
                                    table{
                                        margin-top:30px
                                    }
                                    table.top-0{
                                        margin-top:0;
                                    }
                                    table.order-detail , .order-detail th , .order-detail td {
                                        border: 1px solid #ddd;
                                        border-collapse: collapse;
                                    }
                                    .order-detail th{
                                        font-size:16px;
                                        padding:15px;
                                        text-align:center;
                                    }
                                    .footer-social-icon tr td img{
                                        margin-left:5px;
                                        margin-right:5px;
                                    }
                                </style>
                            </head>
                            <body style="margin: 20px auto;">
                                
                                <table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr class="header">
                                                        <td align="left" valign="top" >
                                                            <img src="cid:1001" class="main-logo" style="width: 150px;" >
                                                        </td>
                                                        
                                                    </tr>
                                                </table>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" >
                                                    <tr>
                                                        <td>
                                                            <img src="cid:1002" alt="" style=";margin-bottom: 30px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="cid:1003" alt="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="title">Thank you</h2>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Payment Is Successfully Processsed And Your Order Is On The Way</p>
                                                                <p>Transaction ID:'.$txnid.'</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>
                                                            <div style="border-top:1px solid #777;height:1px;margin-top: 30px;">
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" >
                                                    <tr>
                                                        <td>
                                                            <h2 class="title">YOUR ORDER DETAILS</h2>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="order-detail" border="0" cellpadding="0" cellspacing="0"  align="left">
                                                    <tr align="left">
                                                        <th>PRODUCT</th>
                                                        <th style="padding-left: 15px;">NAME</th>
                                                        <th>QUANTITY</th>
                                                        <th>PRICE </th>
                                                    </tr>
                                                    ';
                                               
                                                    
                                                        $select_carts="select * from customer_orders where order_id='$order_id'";
                                                        $run_carts=mysqli_query($con,$select_carts);
                                                        while($row_carts=mysqli_fetch_array($run_carts))
                                                        {
                                                        $papage_number=$row_carts['papage_number'];
                                                        $pro_id=$row_carts['product_id'];
                                                        $pro_qty=$row_carts['qty'];
                                                        $product_size=$row_carts['size'];
                                                        if ($papage_number==0) {
                                                            $get_products="select * from products where product_id='$pro_id'";
                                                            $run_products=mysqli_query($con, $get_products);
                                                            while ($row_products=mysqli_fetch_array($run_products)) {
                                                                $product_title=$row_products['product_title'];
                                                                $product_img1=$row_products['product_img1'];
                                                                $product_price=$row_products['product_price'];
                                                                $sub_total=$row_products['product_price']*$pro_qty;
                                                            
                                                                
                                                                $totals+=$sub_total; 
                                                                $gst=$totals*12/100;
                                                                $totalss=$totals+$gst;
                                                                $html .='
                                                                 <tr>                                
                                                                   <td>
                                                                       <img src="cid:1011" alt="" width="70">
                                                                   </td>
                                                                   <td valign="top" style="padding-left: 15px;">
                                                                       <h5 style="margin-top: 15px;">'.$product_title.'</h5>
                                                                   </td>
                                                                   <td valign="top" style="padding-left: 15px;">
                                                                       <h5 style="font-size: 14px; color:#444;margin-top:15px;    margin-bottom: 0px;">Size : <span>'.$product_size.'</span> </h5>
                                                                       <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>'.$pro_qty.'</span></h5>                                    
                                                                   </td>
                                                                   <td valign="top" style="padding-left: 15px;">
                                                                       <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>Rs.'.$product_price.'</b></h5>                  
                                                                   </td>
                                                               </tr>'; 
                                                               $mail->AddEmbeddedImage("admin_area/product_images/$product_img1", 1011,''.$product_img1.'');
                                                            }
                                                           }
                                                    if($papage_number==1)
                                                    {
                                                        $get_accessories="select * from accessories where accessories_id='$pro_id'";
                                                        $run_accessories=mysqli_query($con, $get_accessories);
                                                        while ($row_acessories=mysqli_fetch_array($run_accessories)) {
                                                            $accessoires_name=$row_acessories['accessories_name'];
                                                            $accessories_img1=$row_acessories['accessories_image_1'];
                                                            $accessories_prices=$row_acessories['accessories_prices'];
                                                            $sub_total=$row_acessories['accessories_prices']*$pro_qty;
                                                          // echo  $accessoires_name;
                                                           
                                                            $totals+=$sub_total; 
                                                            $gst=$totals*12/100;
                                                            $totalss=$totals+$gst;
                                                            $html .='
                                                            <tr>                                
                                                              <td>
                                                                  <img src="cid:1012" alt="" width="70">
                                                              </td>
                                                              <td valign="top" style="padding-left: 15px;">
                                                                  <h5 style="margin-top: 15px;">'.$accessoires_name.'</h5>
                                                              </td>
                                                              <td valign="top" style="padding-left: 15px;">
                                                                  <h5 style="font-size: 14px; color:#444;margin-top:15px;    margin-bottom: 0px;">Size : <span>'.$product_size.'</span> </h5>
                                                                  <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>'.$pro_qty.'</span></h5>                                    
                                                              </td>
                                                              <td valign="top" style="padding-left: 15px;">
                                                                  <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>Rs.'.$accessories_prices.'</b></h5>                  
                                                              </td>
                                                          </tr>';
                                                          $mail->AddEmbeddedImage("admin_area/accessories_images/$accessories_img1",1012,''.$accessories_img1.''); 
                                                       }
                                                    }
                                                }
                                                $html .=' <tr>
                                                <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Sub-Total :</td>
                                                    <td colspan="3" class="price" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>Rs.'.$totals.'</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">GST (12%) :</td>
                                                    <td colspan="3" class="price" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>Rs.'.$gst.'</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Total Paid :</td>
                                                    <td colspan="3" class="price" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>Rs.'.$totalss.'</b></td>
                                            </tr>
                                        </table>
                                        <table cellpadding="0" cellspacing="0" border="0" align="left" style="width: 100%;margin-top: 30px;    margin-bottom: 30px;">
                                                    <tbody><tr>
                                                        <td style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                                                            <h5 style="font-size: 16px; font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">DILIVERY ADDRESS</h5>
                                                            <p style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">'.$customer_address.'</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                        </table>                               
                                    </td>
                                </tr>
                            </tbody>            
                        </table>
                        <table class="main-bg-light text-center top-0"  align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td style="padding: 30px;">
                                                    <div>
                                                        <h4 class="title" style="margin:0;text-align: center;">Follow us</h4>
                                                    </div>
                                                    <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon" align="center" class="text-center" style="margin-top:20px;">
                                                        <tr>
                                                            <td>
                                                                <a href="#"><img src="cid:1004" alt="">
                                                                
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="#"><img src="cid:1005" alt=""></a>
                                                            </td>
                                                            <td>
                                                                <a href="#"><img src="cid:1006" alt=""></a>
                                                            </td>
                                                            <td>
                                                                <a href="#"><img src="cid:1007" alt=""></a>
                                                            </td>
                                                        </tr>                                    
                                                    </table>
                                                    <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
                                                    <table  border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;" >
                                                        <tr>
                                                            <td>
                                                                <a href="#" style="font-size:13px">Want to change how you receive these emails?</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p style="font-size:13px; margin:0;">© 2020 Skote.</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#" style="font-size:13px; margin:0;text-decoration: underline;">Unsubscribe</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                    </body>
                </html>';
                                                       
                        // Content
                        $mail->isHTML(true);                                 
                        $mail->Subject = "Your SKOTE order confirmation ($order_id)";
                        $mail->Body    = "$html";  
                        $mail->AddEmbeddedImage("assets/img/email-temp/logo.png",1001,'logo.png');
                        $mail->AddEmbeddedImage("assets/img/email-temp/delivery.png",1002, 'delivery.png');
                        $mail->AddEmbeddedImage("assets/img/email-temp/success.png",1003,'success.png');
                        
                        $mail->AddEmbeddedImage("assets/img/email-temp/facebook.png",1004, 'facebook.png');
                        $mail->AddEmbeddedImage("assets/img/email-temp/youtube.png", 1005, 'youtube.png');
                        $mail->AddEmbeddedImage("assets/img/email-temp/twitter.png",1006,  'twitter.png');
                        $mail->AddEmbeddedImage("assets/img/email-temp/pinterest.png",1007,  'pinterest.png');          
                
                        $mail->send();
                      
                    }
                    catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                unset($_SESSION['order_id'],$_SESSION['ORDER_ID'],$_SESSION['CUST_ID'],$_SESSION['INDUSTRY_TYPE_ID'],$_SESSION['CHANNEL_ID'],$_SESSION['TXN_AMOUNT'],$_SESSION['c_id']);
                ?>
<script>
window.open('online_payment_successful-<?php echo base64_encode($order_id);?>-<?php echo base64_encode($txnid);?>',
    '_self')
</script>";

<?php
           } 
?>