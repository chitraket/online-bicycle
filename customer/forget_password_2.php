<?php
    $active='';
    include("includes/header.php");
?>
    <!-- Start Header Area -->
    
    <!-- end Header Area -->
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
                                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
        $error_c_pass="";
        $errorresult=true;
if(!isset($_SESSION['email']))
{
    echo "<script>window.open('forget_password.php','_self')</script>";
}
else{
    if (isset($_POST['login'])) {
        if(pass($_POST['pass']))
        {
            $error_pass = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_pass = "";
        }
        if(c_pass($_POST['c_pass']))
        {
            $error_c_pass = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_c_pass = "";
        }
        if($errorresult==false)
        {
            goto end;
        }
        $email=$_SESSION['email'];
        $password=$_POST['pass'];
        $update_customer = "update customers set customer_pass='$password' where customer_email='$email' ";
        $run_customer = mysqli_query($con, $update_customer);
        if ($run_customer) {
         ?>
         
         <script type="text/javascript">
              swal({
                        title: "Your password has been changed.",
                        text: "",
                        icon: "success",
                        buttons: [,"OK"],
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('login','_self');
                        } else {
                        
                        }
                });
                </script>
         <?php   
         unset($_SESSION['email']);
        }
        else{
        ?>
        
        <script type="text/javascript">
              swal({
                        title: "Your password is not changed.",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "error",
                        buttons: true,
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('forget-password','_self');
                        } else {
                        
                        }
                });
                </script>
        <?php
        }

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
                                <h5>change Password</h5>
                                <form action="#" method="post" >
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Enter new password" name="pass" id="pass" required/>
                                        <span id="passMsg"></span>
                                        <span style="color: red;"><?php echo $error_pass; ?></span>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Enter your Password" name="c_pass" id="c_pass" required/>
                                        <span id="c_passMsg"></span>
                                        <span style="color: red;"><?php echo $error_c_pass; ?></span>
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                           <!-- <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                    <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button type="submit" class="btn btn-sqr" name="login" id="btnsubmit">Change password</button>
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
        
        var pass_err=true;
        var c_pass_err=true;
        $("#btnsubmit").attr("disabled",true);

       
        $('#pass').keyup(function(){
            pass_check();
        });
         
        $('#pass').focusout(function(){
            pass_check();
        });
        $('#c_pass').keyup(function(){
            c_pass_check();
        });
         
        $('#pass').focusout(function(){
            pass_check();
        });
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
        function c_pass_check(){
            var pass=$('#pass').val();
            var c_pass=$('#c_pass').val();
            if(c_pass.length=='')
            {
                $("#c_pass").css("border","1px solid red");
                $("#c_passMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#c_passMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                c_pass_err=false;
                return false;
            }
            else{
                $("#c_pass").css("border","1px solid green");
                $("#c_passMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }
            if(c_pass!=pass)
            {
                $("#c_pass").css("border","1px solid red");
                $("#c_passMsg").html("<p class='text-danger'>Password are not matching</p>");
                $('#c_passMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                c_pass_err=false;
                return false;
            }
            else{
                $("#c_pass").css("border","1px solid green");
                $("#c_passMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }
        }
        

    });
     </script> 
</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:08 GMT -->
</html>