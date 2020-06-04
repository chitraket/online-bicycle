<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Dashboard</h4>
                    </div>

                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Skote Dashboard</p>
                                    </div>
                                </div>

                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <?php
                                            $admin_email=$_SESSION['admin_email'];
                                            $admin_name="";
                                            $admin_contact="";
                                            $admin_roles="";
                                            $select_admin="select * from admins where admin_email='$admin_email'";
                                            $run_admin=mysqli_query($con,$select_admin);
                                            while($row_admin=mysqli_fetch_array($run_admin))
                                            {
                                                $admin_name=$row_admin['admin_name'];
                                                $admin_contact=$row_admin['admin_contact'];
                                                $admin_roles=$row_admin['admin_roles'];
                                                ?>
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <?php
                                                    if($row_admin['admin_image']=="")
                                                    {
                                                        ?>
                                        <img src="admin_images/user.png" alt="" class="img-thumbnail rounded-circle">
                                        <?php 
                                                    } 
                                                    else{
                                                    ?>
                                        <img src="admin_images/<?php echo $row_admin['admin_image']; ?>" alt=""
                                            class="img-thumbnail rounded-circle">
                                        <?php 
                                                    }
                                                    ?>
                                    </div>
                                    <h5 class="font-size-10 text-truncate"><?php echo $row_admin['admin_name']; ?></h5>

                                    <?php
                                            } 
                                            ?>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pt-4">

                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-muted mb-2">Email</p>
                                                <h6><?php echo $admin_email; ?></h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Personal Information</h4>

                            <!--<p class="text-muted mb-4">Hi I'm Cynthia Price,has been the industry's standard dummy text
                                To an English person, it will seem like simplified English, as a skeptical Cambridge.
                            </p>-->
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                    
                                        <tr>
                                            <th scope="row">Name :</th>
                                            <?php
                                            if($admin_name=="")
                                            {
                                                ?>
                                                <td>N/A</td>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <td><?php echo $admin_name; ?></td>
                                                <?php
                                            }
                                            ?>
                                            
                                        </tr>
                                        <tr>
                                            <th scope="row">Mobile :</th>
                                            <?php 
                                            if($admin_contact=="")
                                            {
                                                ?>
                                                <td>N/A</td>
                                                <?php 
                                            }
                                            else{
                                                ?>
                                                    <td>+91 <?php echo $admin_contact;?></td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">E-mail :</th>
                                            <?php
                                            if($admin_email=="")
                                            {
                                                ?>
                                                <td>N/A</td>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <td><?php echo $admin_email; ?></tb>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th scope="row">Roles :</th>
                                            <?php
                                            if($admin_roles=="admin")
                                            {
                                                ?>
                                                <td><span class="badge badge-pill badge-soft-success font-size-14" >Admin</span></td>
                                                <?php
                                            }
                                            else if($admin_roles=="sub")
                                            {
                                                ?>
                                                <td><span class="badge badge-pill badge-soft-success font-size-14" >Sub Admin</span></td>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <td>N/A</td>
                                                <?php
                                            }
                                            ?>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Orders</p>
                                            <?php
                                                        $row=0;
                                                        $select_order='select DISTINCT order_id from customer_orders order by order_id';
                                                        $query_num=mysqli_query($con,$select_order);
                                                        $row=mysqli_num_rows($query_num);

                                                        ?>
                                            <h4 class="mb-0"><?php echo $row; ?></h4>
                                        </div>

                                        <div
                                            class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-box font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Cancel Order</p>
                                            <?php
                                                        $rows=0;
                                                        $select_order_cancel='select DISTINCT order_id from customer_orders where payment_status="cancel" and order_status="c"  order by order_id';
                                                        $query_num_cancel=mysqli_query($con,$select_order_cancel);
                                                        $rows=mysqli_num_rows($query_num_cancel);

                                                        ?>
                                            <h4 class="mb-0"><?php echo $rows; ?></h4>
                                        </div>

                                        <div
                                            class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Returned Order</p>
                                            <?php
                                                        $rowss=0;
                                                        $select_order_returned='select DISTINCT order_id from customer_orders where payment_status="returned" and order_status="r" order by order_id';
                                                        $query_num_returned=mysqli_query($con,$select_order_returned);
                                                        $rowss=mysqli_num_rows($query_num_returned);
                                                        ?>
                                            <h4 class="mb-0"><?php echo $rowss; ?></h4>
                                        </div>

                                        <div
                                            class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Payment Failed</p>
                                            <?php
                                                        $rowss=0;
                                                        $select_order_returned='select DISTINCT order_id from customer_orders where payment_status="failed" and order_status="f"  order by order_id';
                                                        $query_num_returned=mysqli_query($con,$select_order_returned);
                                                        $rowss=mysqli_num_rows($query_num_returned);
                                                        ?>
                                            <h4 class="mb-0"><?php echo $rowss; ?></h4>
                                        </div>

                                        <div
                                            class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Bikes</p>
                                            <?php
                                                        $product=0;
                                                        $select_product='select product_id from products order by product_id';
                                                        $query_product=mysqli_query($con,$select_product);
                                                        $product=mysqli_num_rows($query_product);
                                                        ?>
                                            <h4 class="mb-0"><?php echo $product; ?></h4>
                                        </div>

                                        <div
                                            class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="mdi mdi-bicycle font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Accessories</p>
                                            <?php
                                                        $accessories=0;
                                                        $select_accessories='select accessories_id from accessories order by accessories_id';
                                                        $query_accessories=mysqli_query($con,$select_accessories);
                                                        $accessories=mysqli_num_rows($query_accessories);
                                                        ?>
                                            <h4 class="mb-0"><?php echo $accessories; ?></h4>
                                        </div>
                                        <div
                                            class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Customer</p>
                                            <?php
                                                        $row_customer=0;
                                                        $select_customer='select DISTINCT customer_id from customers order by customer_id';
                                                        $query_customer=mysqli_query($con,$select_customer);
                                                        $row_customer=mysqli_num_rows($query_customer);

                                                        ?>
                                            <h4 class="mb-0"><?php echo $row_customer; ?></h4>
                                        </div>

                                        <div
                                            class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-user font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Sub Admin</p>
                                            <?php
                                                        $row_admin=0;
                                                        $select_admin='select DISTINCT admin_id from admins where admin_roles="sub" order by admin_id DESC';
                                                        $query_admin=mysqli_query($con,$select_admin);
                                                        $row_admin=mysqli_num_rows($query_admin);

                                                        ?>
                                            <h4 class="mb-0"><?php echo $row_admin; ?></h4>
                                        </div>

                                        <div
                                            class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="mdi mdi-account-multiple font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Boxs</p>
                                            <?php
                                                        $row_box=0;
                                                        $select_box='select DISTINCT box_id from boxes_section order by box_id';
                                                        $query_box=mysqli_query($con,$select_box);
                                                        $row_box=mysqli_num_rows($query_box);

                                                        ?>
                                            <h4 class="mb-0"><?php echo $row_box; ?></h4>
                                        </div>

                                        <div
                                            class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bxs-box font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Logo</p>
                                            <?php
                                                        $row_logo=0;
                                                        $select_logo='select DISTINCT logo_id from logo order by logo_id';
                                                        $query_logo=mysqli_query($con,$select_logo);
                                                        $row_logo=mysqli_num_rows($query_logo);

                                                        ?>
                                            <h4 class="mb-0"><?php echo $row_logo; ?></h4>
                                        </div>

                                        <div
                                            class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-aperture font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Slider</p>
                                            <?php
                                                        $row_slider=0;
                                                        $select_slider='select DISTINCT slide_id from slider order by slide_id';
                                                        $query_slider=mysqli_query($con,$select_slider);
                                                        $row_slider=mysqli_num_rows($query_slider);

                                                        ?>
                                            <h4 class="mb-0"><?php echo $row_slider; ?></h4>
                                        </div>

                                        <div
                                            class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="mdi mdi-play-box-outline font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Review</p>
                                            <?php
                                                        $row_review=0;
                                                        $select_review='select DISTINCT review_id from review order by review_id';
                                                        $query_review=mysqli_query($con,$select_review);
                                                        $row_review=mysqli_num_rows($query_review);

                                                        ?>
                                            <h4 class="mb-0"><?php echo $row_review; ?></h4>
                                        </div>

                                        <div
                                            class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-task font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                </div>
                
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>