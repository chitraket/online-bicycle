<?php
 
 if(!isset($_SESSION['admin_email']))
 {
     echo "<script>window.open('auth-login.php','_self')</script>";
 } 
 else{
     ?>
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Dashboard</li>

            <li>
                <a href="index.php" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-title">Bikes</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-bicycle"></i>
                    <span>Bikes</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-product.php">Add Bikes</a></li>
                    <li><a href="view-product.php">View Bikes</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-receipt"></i>
                    <span>Manufacturer</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-manufacturer.php">Add manufacturer</a></li>
                    <li><a href="view-manufacturer.php">View manufacturer</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-envelope"></i>
                    <span>Bikes Category</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-product-category.php">Add Bikes Category</a></li>
                    <li><a href="view-product-category.php">View Bikes Category</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-receipt"></i>
                    <span>Age</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-category.php">Add Age</a></li>
                    <li><a href="view-category.php">View Age</a></li>
                </ul>
            </li>

            <li class="menu-title">Accessories</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-store"></i>
                    <span>Accessories</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-accessories.php">Add Accessories</a></li>
                    <li><a href="view-accessories.php">View Accessories</a></li>
                </ul>
            </li>
            
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-receipt"></i>
                    <span>Manufacturer</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-accessories-manufacturer.php">Add manufacturer</a></li>
                    <li><a href="view-accessories-manufacturer.php">View manufacturer</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-envelope"></i>
                    <span>Accessories Category</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-accessories-category.php">Add Accessories Category</a></li>
                    <li><a href="view-accessories-category.php">View Accessories Category</a></li>
                </ul>
            </li>

            <li class="menu-title">Slider</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-play-box-outline"></i>
                    <span>Slider</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-slider.php">Add slider</a></li>
                    <li><a href="view-slider.php">View slider</a></li>
                </ul>
            </li>
            <li class="menu-title"> Box</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bxs-box"></i>
                    <span>Boxs</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-box.php">Add Boxs</a></li>
                    <li><a href="view-box.php">View Boxs </a></li>
                   
                </ul>
            </li>

            <li class="menu-title">Terms & Conditions</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-user-circle"></i>
                    <span>Terms & Conditions</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-terms.php">Add Terms & Conditions</a></li>
                    <li><a href="view-terms.php">View Terms & Conditions</a></li>
                   
                </ul>
            </li>

            <li class="menu-title">Privet Policy</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-lock-alt "></i>
                    <span>Privet Policy</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-policy.php">Add Privet Policy</a></li>
                    <li><a href="view-policy.php">View Privet Policy</a></li>
                   
                </ul>
            </li>

            <li class="menu-title">Order Policy</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-user-circle"></i>
                    <span>Order Policy</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-o-policy.php">Add Order Policy</a></li>
                    <li><a href="view-o-policy.php">View Order Policy</a></li>
                   
                </ul>
            </li>

            <li class="menu-title">Logo</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-aperture"></i>
                    <span>Logo</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-logo.php">Add Logo</a></li>
                    <li><a href="view-logo.php">View Logo</a></li>
                </ul>
            </li>
            <li class="menu-title">Customer</li>
            <li>
                <a href="view-customer.php" >
                    <i class="bx bx-user"></i>
                    <?php
                    $date=date("Y-m-d");
                    $select_customer="select * from customers where customer_status='no' AND customer_date LIKE '".$date."%' ";
                    $run_customer=mysqli_query($con,$select_customer);
                    $num_customer=mysqli_num_rows($run_customer);
                    ?>
                    <span class="badge badge-pill badge-info float-right"><?php echo $num_customer; ?></span>
                    <span>Customer</span>
                </a>
            </li>
            
            <li class="menu-title">Review</li>
            <li>
                <a href="view-review.php" >
                    <i class="bx bx-task"></i>
                    <span>Review</span>
                </a>
               
            </li>

            <li class="menu-title">Order & Payment</li>
            <li>
                <a href="view-order.php" >
                    <i class="bx bx-box"></i>
                    <?php
                                
                                    $select_order="select DISTINCT order_id from customer_orders where payment_status IN ('pending','successful') AND order_status='o' AND order_date LIKE '".$date."%' ";
                                    $run_order=mysqli_query($con,$select_order);
                                    $num_order=mysqli_num_rows($run_order);
                                ?>
                    <span class="badge badge-pill badge-info float-right"><?php echo $num_order; ?></span>
                    <span>Order</span>
                </a>
               
            </li>

            <li>
                <a href="view-payment.php" >
                    <i class="bx bx-money"></i>
                    <span>Payment</span>
                </a>
            </li>

            <li class="menu-title">Sub User</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-account-multiple-plus-outline"></i>
                    <span>Sub User</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-sub-user.php">Add Sub User</a></li>
                    <li><a href="view-sub-user.php">View Sub User</a></li>
                </ul>
            </li>


          <!--  <li class="menu-title">Components</li>-->

           

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<?php
 
 }?>