<?php 
$error_o_pass="";
$error_pass1="";
$error_c_pass1="";
$errorresult=true;

if(isset($_POST['submit'])){
    
    if(opass($_POST['old_pass']))
    {
        $error_o_pass = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_o_pass = "";
    }
    if(pass($_POST['new_pass']))
    {
        $error_pass1 = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_pass1 = "";
    }
    if(c_pass($_POST['new_pass_again']))
    {
        $error_c_pass1 = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_c_pass1 = "";
    }
    if($errorresult==false)
    {
        goto end;
    }

    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        ?>
<script type="text/javascript">
swal({
        title: "Sorry, your current password did not valid. Please try again",
        text: "",
        icon: "warning",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('myaccount', '_self');
        } else {

        }
    });
</script>
<?php
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        ?>

<script>
swal({
        title: "Sorry, your new password did not match",
        text: "",
        icon: "error",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('myaccount', '_self');
        } else {

        }
    });
</script>";
<?php
        exit();
        
    }
    
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        ?>
<script type="text/javascript">
swal({
        title: "Your password has been updated",
        text: "",
        icon: "success",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('myaccount', '_self');
        } else {

        }
    });
</script>
<?php
        
    }
    
}

end:
?>



<div class="tab-pane fade" id="change-pass" role="tabpanel">

    <div class="myaccount-content">
        <h5>Change Password</h5>
        <div class="account-details-form">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-input-item">
                            <label for="first-name" class="required">Old Password</label>
                            <input type="password" id="opass" name="old_pass" placeholder="Old Password" required />
                            <span id="opassMsg"></span>
                            <span style="color: red;"><?php echo $error_o_pass; ?></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-input-item">
                            <label for="first-name" class="required">New Password</label>
                            <input type="password" id="pass1" name="new_pass" placeholder="New Password" required />
                            <span id="passMsg1"></span>
                            <span style="color: red;"><?php echo $error_pass1; ?></span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="single-input-item">
                            <label for="first-name" class="required">Confirm Password</label>
                            <input type="password" id="c_pass1" name="new_pass_again"
                                placeholder="Enter Confirm Password" />
                            <span id="c_passMsg1"></span>
                            <span style="color: red;"><?php echo $error_c_pass1; ?></span>
                        </div>
                    </div>
                </div>
                <div class="single-input-item">
                    <button name="submit" class="btn btn-sqr" id="btnsubmit1">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
    // set initially button state hidden
    var opass_err = true;
    var pass_err1 = true;
    var c_pass_err1 = true;

    $("#btnsubmit1").attr("disabled", true);

    $('#opass').keyup(function() {
        opass_check();
    });
    $('#opass').focusout(function() {
        opass_check();
    });

    $('#pass1').keyup(function() {
        pass_check1();
    });
    $('#pass1').focusout(function() {
        pass_check1();
    });

    $('#c_pass1').keyup(function() {
        c_pass_check1();
    });
    $('#c_pass1').focusout(function() {
        c_pass_check1();
    });

    // use keyup event on email field
    function opass_check() {
        var opass = $('#opass').val();
        var reg = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/
        if (opass.length == '') {
            $("#opass").css("border", "1px solid red");
            $("#opassMsg").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#opassMsg').focus();
            $("#btnsubmit1").attr("disabled", true);
            opass_err = false;
            return false;
        } else {
            $("#opass").css("border", "1px solid green");
            $("#opassMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit1").attr("disabled", false);
        }
        if (!(reg.test(opass))) {
            $("#opass").css("border", "1px solid red");
            $("#opassMsg").html("<p class='text-danger'>Invalid password.</p>");
            $('#opassMsg').focus();
            $("#btnsubmit1").attr("disabled", true);
            opass_err = false;
            return false;
        } else {
            $("#opass").css("border", "1px solid green");
            $("#opassMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit1").attr("disabled", false);
        }

    }

    function pass_check1() {
        var pass = $('#pass1').val();
        var reg = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/
        if (pass.length == '') {
            $("#pass1").css("border", "1px solid red");
            $("#passMsg1").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#passMsg1').focus();
            $("#btnsubmit1").attr("disabled", true);
            pass_err1 = false;
            return false;
        } else {
            $("#pass1").css("border", "1px solid green");
            $("#passMsg1").html("<p class='text-danger'></p>");
            $("#btnsubmit1").attr("disabled", false);
        }
        if (!(reg.test(pass))) {
            $("#pass1").css("border", "1px solid red");
            $("#passMsg1").html("<p class='text-danger'>Invalid password.</p>");
            $('#passMsg1').focus();
            $("#btnsubmit1").attr("disabled", true);
            pass_err1 = false;
            return false;
        } else {
            $("#pass1").css("border", "1px solid green");
            $("#passMsg1").html("<p class='text-danger'></p>");
            $("#btnsubmit1").attr("disabled", false);
        }

    }

    function c_pass_check1() {
        var pass = $('#pass1').val();
        var c_pass = $('#c_pass1').val();
        if (c_pass.length == '') {
            $("#c_pass1").css("border", "1px solid red");
            $("#c_passMsg1").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#c_passMsg1').focus();
            $("#btnsubmit1").attr("disabled", true);
            c_pass_err1 = false;
            return false;
        } else {
            $("#c_pass1").css("border", "1px solid green");
            $("#c_passMsg1").html("<p class='text-danger'></p>");
            $("#btnsubmit1").attr("disabled", false);
        }
        if (c_pass != pass) {
            $("#c_pass1").css("border", "1px solid red");
            $("#c_passMsg1").html("<p class='text-danger'>Password are not matching</p>");
            $('#c_passMsg1').focus();
            $("#btnsubmit1").attr("disabled", true);
            c_pass_err1 = false;
            return false;
        } else {
            $("#c_pass1").css("border", "1px solid green");
            $("#c_passMsg1").html("<p class='text-danger'></p>");
            $("#btnsubmit1").attr("disabled", false);
        }
    }


});
</script>

</body>

</html>