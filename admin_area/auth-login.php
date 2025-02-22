<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    echo "<script>window.open('index.php','_self')</script>";
}
include("includes/db.php"); 
?>
<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:43:30 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Login | SKOTE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Sweet Alert-->
        <script src="../assets/js/sweetalert.min.js"></script>
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal custom-validation" action="#" method="POST" >
        
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="email" class="form-control" id="username" placeholder="Enter username" name="admin_email" required />
                                        </div>
                
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="admin_pass" required data-parsley-pattern="(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}" >
                                        </div>
                
                                       
                                        
                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="admin_login">Log In</button>
                                        </div>
        
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <?php
                         if(isset($_POST['admin_login']))
                         {
                             $admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);
                             $admin_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
                             $get_admin="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass' AND admin_status='yes'";
                             $run_admin=mysqli_query($con,$get_admin);
                             $count=mysqli_num_rows($run_admin);
                             if($count==1)
                             {
                                    $_SESSION['admin_email']=$admin_email; 
                                    echo "<script>window.open('index.php','_self')</script>";
                             }
                             else{
                                 ?>
                                  <script>
                                        swal({
                                            title:"Your Email Or Password Is Wrong.",
                                            text: "",
                                            icon: "error",
                                            buttons: [,"OK"],
                                            successMode: true,
                                        
                                    })
                                    .then((willDelete) => {
                                            if (willDelete) {
                                                window.open('auth-login.php','_self');
                                            } 
                                            else {
                                            }
                                    });
                                </script>
                                 <?php 
                             }
                         } 
                        ?>
                        <div class="mt-5 text-center">
                            <p>© 2020 SKOTE.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="assets/js/pages/form-validation.init.js"></script>

        <script src="assets/js/app.js"></script>
        <script src="assets/js/pages/form-validation.init.js"></script>
    </body>
</html>

