<?php
    $active='';
    include("includes/header.php");

if(isset($_SESSION['customer_email']))
{
    if(isset($_SESSION['papage']))
    {
        if($_SESSION['papage']==1)
        {
            echo "<script>window.open('../checkout','_self');</script>";
        }
        if($_SESSION['papage']==0)
        {
            echo "<script>window.open('my-account','_self');</script>";
        }
    }
}
?>
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../home"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">login</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <?php 

$error_pass="";
$error_email="";
$errorresult=true;

if (isset($_POST['login'])) {
    if (email($_POST['c_email'])) {
        $error_email = "Required..";
        $errorresult=false;
    } else {
        $error_email = "";
    }
    if (pass($_POST['c_pass'])) {
        $error_pass = "Required..";
        $errorresult=false;
    } else {
        $error_pass = "";
    }
    
    if ($errorresult==false) {
        goto end;
    }
    

    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass' AND customer_status='yes'";
    
    $run_customer = mysqli_query($con, $select_customer);
    $check_customer = mysqli_num_rows($run_customer);
    
  
    
    if ($check_customer==0) {
        ?>
         <script type="text/javascript">
         swal({
                   title: "Your Email Or Password Is Wrong.",
                   text: "",
                   icon: "error",
                   buttons:[,"Ok"],
                   successMode: true,
           })
           .then((willDelete) => {
                   if (willDelete) {
                       window.open('../customer/login','_self');
                   }   
           });
           </script>
        <?php
        exit();
    }
    
    
    if ($check_customer==1) {
        $_SESSION['customer_email']=$customer_email;
        foreach ($_SESSION as $product) {
            if (!(is_array($product))) {
                ?>
                    <script type="text/javascript">
                                window.open('my-account','_self');
                    </script>
                 <?php
            } else{
                ?>
                <script type="text/javascript">
                    window.open('../checkout','_self');
        </script> 
        <?php
            }
        } ?>
            
        
            <?php
    }
    else{
            
        $_SESSION['customer_email']=$customer_email;
        ?>
        <script type="text/javascript">
       
             window.open('../checkout','_self');
               
        </script>
        <?php
        
    }
}

end:
?>
        <!-- login register wrapper start -->
        <div class="login-register-wrapper section-padding">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap">
                                <h5>Sign In</h5>
                                <form action="#" method="post" onsubmit="return submit_check()">
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Email or Username" name="c_email" id="email" />
                                        <span id="emailMsg"></span>
                                        <span style="color: red;"><?php echo $error_email; ?></span>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Enter your Password" name="c_pass" id="pass" />
                                        <span id="passMsg"></span>
                                        <span style="color: red;"><?php echo $error_pass; ?></span>
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                           <!-- <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                    <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                                </div>
                                            </div>-->
                                            <a href="forget_password" class="forget-pwd">Forget Password?</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button type="submit" class="btn btn-sqr" name="login" id="btnsubmit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->
 
                        <!-- Register Content Start -->
                        <!-- Register Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>
   
    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php
    include("includes/footer.php");
    ?>
    <!-- footer area end -->

    <!-- offcanvas mini cart start -->
    <?php
     include("includes/cart1.php");
    ?>
    <!-- offcanvas mini cart end -->

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!-- slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="assets/js/plugins/image-zoom.min.js"></script>
    <!-- Imagesloaded JS -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- Instagram feed JS -->
    <script src="assets/js/plugins/instagramfeed.min.js"></script>
    <!-- mailchimp active js -->
    <script src="assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

   <script type="text/javascript">
	$(document).ready(function(){
        var email_err=true;
        var pass_err=true;

        $("#btnsubmit").attr("disabled",true);

        $('#email').keyup(function(){
            email_check();
        });
        $('#email').focusout(function(){
            email_check();
        });
        $('#pass').keyup(function(){
            pass_check();
        });
        $('#pass').focusout(function(){
            pass_check();
        });
        function email_check(){
            var email=$('#email').val();
            var reg=/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
            if(email.length=='')
            {
                $("#email").css("border","1px solid red");
                $("#emailMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#emailMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                email_err=false;
                return false;
            }
            else{
                $("#email").css("border","1px solid green");
                $("#emailMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }

            if(!(reg.test(email)))
            {
                $("#email").css("border","1px solid red");
                $("#emailMsg").html("<p class='text-danger'>Invalid email.</p>");
                $('#emailMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                email_err=false;
                return false;
            }
            else{
                $("#email").css("border","1px solid green");
                $("#emailMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }

        }

        function pass_check(){
            var pass=$('#pass').val();
            var reg=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/
            if(pass.length=='')
            {
                $("#pass").css("border","1px solid red");
                $("#passMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#passMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                pass_err=false;
                return false;
            }
            else{
                $("#pass").css("border","1px solid green");
                $("#passMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }
            if(!(reg.test(pass)))
            {
                $("#pass").css("border","1px solid red");
                $("#passMsg").html("<p class='text-danger'>Invalid password.</p>");
                $('#passMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                pass_err=false;
                return false;
            }
            else{
                $("#pass").css("border","1px solid green");
                $("#passMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }

        }

    });
     </script> 
</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:08 GMT -->
</html>