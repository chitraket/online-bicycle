<?php 
 include("includes/db.php");
 ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SKOTE - Bikes Shop</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <script src="assets/js/sweetalert.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="assets/css/plugins/jqueryui.min.css">
    <!-- main style css -->
    <link rel="stylesheet" href="assets/css/style.css">
 
</head>
<body>
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-right font-size-16">Order # <?php echo $order_id=$_GET['o_id'] ?></h4>
                            <div class="mb-4">
                                <img src="assets/img/logo/logo.png" alt="logo" height="20"/>
                            </div>
                        </div>
                        <hr>
                        <?php
                        $select_customer="select * from orders where id='$order_id'";
                        $run_customer=mysqli_query($con,$select_customer);
                        while($row_customer=mysqli_fetch_array($run_customer))
                        {
                            $customer_name=$row_customer['customer_name'];
                            $customer_email=$row_customer['customer_email'];
                            $customer_address=$row_customer['customer_address'];
                            $customer_city=$row_customer['customer_city'];
                            $customer_country=$row_customer['customer_country'];
                         ?>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Billed To:</strong><br>
                                   
                                    <?php echo $customer_name; ?><br>
                                    <?php echo $customer_email;?><br>
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Shipped To:</strong><br>
                                    <?php echo $customer_name; ?><br>
                                    <?php echo $customer_address;?><br>
                                    <?php echo $customer_city;?>,<?php echo $customer_country; ?>
                                </address>
                            </div>
                        </div>
                        <?php
                        } 
                        ?>
                        <?php
                        $select_order="select DISTINCT txnid,order_date from customer_orders where order_id='$order_id'";
                        $run_order=mysqli_query($con,$select_order);
                        while($row_order=mysqli_fetch_array($run_order))
                        {
                            $txt_id=$row_order['txnid'];
                            $order_date=$row_order['order_date'];
                            $orgDate = $order_date;  
                            $newDate = date("d-M-Y", strtotime($orgDate));  
                        }
                         ?>
                        <div class="row">
                            <div class="col-6 mt-3">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                   <?php
                                   if($txt_id=="")
                                   {
                                       ?>
                                       Cash On Delivery<br>
                                       <?php 
                                   } 
                                   else{
                                       ?>
                                       Paytm-Online Payment<br>
                                       <?php
                                   }
                                   ?>
                                    
                                </address>
                            </div>
                            <div class="col-6 mt-3 text-right">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    <?php echo $newDate; ?><br><br>
                                </address>
                            </div>
                        </div>
                        <div class="py-2 mt-3">
                            <h3 class="font-size-15 font-weight-bold">Order summary</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Item</th>
                                        <th class="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                    $total=0;
                                    $select_orders="select * from customer_orders where order_id='$order_id'";
                                    $row_orders=mysqli_query($con,$select_orders);
                                    while($run_orders=mysqli_fetch_array($row_orders))
                                    {
                                        $product_id=$run_orders['product_id'];
                                        $papage=$run_orders['papage_number'];
                                        $qty=$run_orders['qty'];
                                        if($papage==0)
                                        {
                                            $select_product="select * from products where product_id='$product_id'";
                                            $row_porduct=mysqli_query($con,$select_product);
                                            while($run_porduct=mysqli_fetch_array($row_porduct))
                                            {
                                    ?>
                                    <tr>
                                        <td><?php echo $count=$count+1; ?></td>
                                        <td><?php echo $run_porduct['product_title'] ?></td>
                                        <td class="text-right">Rs.<?php echo  $sub_totol= $run_porduct['product_price']*$qty; ?></td>
                                    </tr>
                                    <?php
                                    $total+=$sub_totol;
                                            }
                                        }
                                        if($papage==1)
                                        {
                                            $select_accessories="select * from accessories where accessories_id='$product_id'";
                                            $row_accessories=mysqli_query($con,$select_accessories);
                                            while($run_accessories=mysqli_fetch_array($row_accessories))
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $count=$count+1; ?></td>
                                                    <td><?php echo $run_accessories['accessories_name'] ?></td>
                                                    <td class="text-right">Rs.<?php echo  $sub_totol= $run_accessories['accessories_prices']*$qty; ?></td>
                                                </tr>
                                                <?php 
                                                $total+=$sub_totol;
                                            }
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="2" class="text-right">Sub Total</td>
                                        <td class="text-right">Rs.<?php echo $total; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="border-0 text-right">
                                            <strong>GST(12%)</strong></td>
                                        <td class="border-0 text-right">Rs.<?php echo $gst=$total*12/100; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="border-0 text-right">
                                            <strong>Total</strong></td>
                                        <td class="border-0 text-right"><h4 class="m-0">Rs<?php echo $totals=$total+$gst;  ?>0</h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


</div>
</body>
</html>