
<!doctype html>
<html lang="en">
  
<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:42:31 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Dashboard | SKOTE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

         <!-- Summernote css -->
         <link href="assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert-->
        <script src="../assets/js/sweetalert.min.js"></script>
        <!-- Pe-icon-7-stroke CSS -->
        <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css">
        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <!--ajex-->
        <script src="assert/jquery.min.js"></script>
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-light.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                       

                       
                    </div>

                    <div class="d-flex">


                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                      
                        <div class="dropdown d-inline-block">
                        <?php
                       $admin_email=$_SESSION['admin_email'];
                        $select_cat="select * from admins where admin_email='$admin_email'";
                        $run_cart=mysqli_query($con,$select_cat);
                        while ($row_cart=mysqli_fetch_array($run_cart)) {
                            $admin_name=$row_cart['admin_name'];
                            $admin_image=$row_cart['admin_image']; ?>
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <?php
                                if($admin_image=="")
                                {
                                    ?>
                                    <img class="rounded-circle header-profile-user" src="admin_images/user.png" alt="Header Avatar">
                                    <?php 
                                }
                                else{
                                ?>
                                <img class="rounded-circle header-profile-user" src="admin_images/<?php echo $admin_image; ?>"
                                    alt="Header Avatar">
                                    <?php 
                                }
                                ?>
                                <span class="d-none d-xl-inline-block ml-1"><?php echo $admin_name; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <?php
                        }?>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                               
                               
                                <?php
                                    $date=date("Y-m-d");
                                    $select_customer="select * from customers where customer_status='no' AND customer_date LIKE '".$date."%' ";
                                    $run_customer=mysqli_query($con,$select_customer);
                                    $num_customer=mysqli_num_rows($run_customer);
                                ?>
                                
                                <a class="dropdown-item d-block" href="view-customer.php"><span class="badge badge-info float-right"><?php echo $num_customer; ?></span><i class="bx bx-user font-size-16 align-middle mr-1"></i>Customer</a>
                                <?php
                                
                                    $select_order="select DISTINCT order_id from customer_orders where payment_status IN ('pending','successful') AND order_status='o' AND order_date LIKE '".$date."%' ";
                                    $run_order=mysqli_query($con,$select_order);
                                    $num_order=mysqli_num_rows($run_order);
                                ?>
                                <a class="dropdown-item d-block" href="view-order.php"><span class="badge badge-info float-right"><?php echo $num_order; ?></span><i class="bx bx-box font-size-16 align-middle mr-1"></i>Order</a>
                                <a class="dropdown-item" href="data.php"><i class="bx bx-data font-size-16 align-middle mr-1"></i>Data Backup</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                        
            
                    </div>
                </div>
            </header> 