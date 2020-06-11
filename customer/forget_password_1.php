<?php
    $active='';
    include("includes/header.php");
?>

<?php

if(!isset($_SESSION['email']))
{
    ?>
    <script>window.open('forget-password','_self')</script>
    <?php
}
if(!isset($_SESSION['otp']))
{
    ?>
    <script>window.open('forget-password','_self')</script>
    <?php
}
else{
    $error_email="";
    $errorresult=true;
    if (isset($_POST['login'])) {

        if(otp($_POST['email']))
        {
            $error_email = "Required.. || Please enter valid OTP.";
            $errorresult=false;
        }
        else
        {
            $error_email = "";
        }
    
        if($errorresult==false)
        {
            goto end;
        }
        
        if($_POST['email']==$_SESSION['otp'])
        {
        ?>
<script type="text/javascript">
swal({
        title: "OTP is correct ",
        text: "",
        icon: "success",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('forget-password-change', '_self');
        } else {
            window.open('forget-password-otp', '_self');
        }
    });
</script>

<?php 
        unset($_SESSION['otp']);
        }
        else{
            ?>
<script type="text/javascript">
swal({
        title: "OTP is wrong",
        text: "",
        icon: "error",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('forget-password-otp', '_self');
        } else {
            window.open('forget-password-otp', '_self');
        }
    });
</script>
<?php 
        }
    }
} 
end:
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
                                <li class="breadcrumb-item active" aria-current="page">Forget password</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper section-padding">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div class="col-lg-6">
                        <div class="login-reg-form-wrap">
                            <h5>Forget Password</h5>
                            <form action="forget-password-otp" method="post">
                                <div class="single-input-item">
                                    <input type="text" placeholder="Enter OTP" name="email" id="email" required />
                                    <span id="passMsg"></span>
                                    <span style="color: red;"><?php echo $error_email; ?></span>
                                </div>

                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button type="submit" class="btn btn-sqr" name="login"
                                        id="btnsubmit">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Content End -->
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
$(document).ready(function() {
    var email_err = true;
    var pass_err = true;

    $("#btnsubmit").attr("disabled", true);

    $('#email').keyup(function() {
        email_check();
    });
    $('#email').focusout(function() {
        email_check();
    });

    function email_check() {
        var email = $('#email').val();
        var reg = /^[0-9]{4}$/
        if (email.length == '') {
            $("#email").css("border", "1px solid red");
            $("#emailMsg").html("<p class='text-danger'>Un-validated</p>");
            $('#emailMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            email_err = false;
            return false;
        } else {
            $("#email").css("border", "1px solid green");
            $("#emailMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }

        if (!(reg.test(email))) {
            $("#email").css("border", "1px solid red");
            $("#emailMsg").html("<p class='text-danger'>Username</p>");
            $('#emailMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            email_err = false;
            return false;
        } else {
            $("#email").css("border", "1px solid green");
            $("#emailMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }

    }
});
</script>
</body>


</html>