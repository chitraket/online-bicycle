<div class="col-lg-3 col-md-4">
                                       
                                       <div class="myaccount-tab-menu nav" role="tablist">
                                           <?php
                                           $customer_session=$_SESSION['customer_email'];
                                           $get_customer="select * from customers where customer_email='$customer_session'";
                                           $run_customer=mysqli_query($con,$get_customer);
                                           $row_customer=mysqli_fetch_array($run_customer);
                                           $customer_image=$row_customer['customer_image'];
                                           $customer_name=$row_customer['customer_name'];
                                           if(!isset($_SESSION['customer_email']))
                                           {
                                                
                                           }else{
                                              
                                                    echo "
                                                    <a href='#dashboad'  data-toggle='tab'>
                                                    <center> <img src='customer_images/$customer_image' alt='Mdev Profile' class='rounded-circle mt-4' style='height:100px;width:100px;'></center>
                                                    <center class='mt-2'>$customer_name  </center>    
                                                </a>
                                                    ";
                                           }
                                           ?>

                                                   <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard" > </i>
                                                       Dashboard</a>
                                                   <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                                       Orders</a>
                                                  <!-- <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i>
                                                       Download</a>
                                                   <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>
                                                       Payment
                                                       Method</a>
                                                   <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
                                                       address</a>-->
                                                   <a href="#account-info" data-toggle="tab"><i class="fa fa-edit"></i> Account
                                                       Details</a>
                                                       <a href="#change-pass" data-toggle="tab"><i class="fa fa-user"></i>
                                                       Change Password</a> 
                                                       <a href="#delete-account" data-toggle="tab"><i class="fa fa-close"></i>
                                                       Delete Account</a>
                                                   <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                           </div>
                               </div>