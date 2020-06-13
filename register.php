<?php
        $active='';
       include("includes/header.php");
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
                                <li class="breadcrumb-item"><a href="home"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Register</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper section-padding ">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Register Content Start -->
                    <?php 
 $error_c_name = ""; 
 $error_l_name="";
 $error_pass="";
 $error_email="";
 $error_c_pass="";
 $error_c_contact="";
 $error_city="";
 $error_state="";
 $error_address="";
 $error_pincode="";
 $error_image2="";
 $errorresult=true;
if(isset($_POST['register'])){
    if(firstname($_POST['c_name']))
    {
        $error_c_name = "Required.. || Please enter valid first name.";
        $errorresult=false;
    }
    else
    {
        $error_c_name = "";
    }
    if(lastname($_POST['c_lname']))
    {
        $error_l_name = "Required.. || Please enter valid last name.";
        $errorresult=false;
    }
    else
    {
        $error_l_name = "";
    }
    if(email($_POST['c_email']))
    {
        $error_email = "Required.. || Please enter valid email || Email is already registered.";
        $errorresult=false;
    }
    else
    {
        $error_email = "";
    }
    if(pass($_POST['c_pass']))
    {
        $error_pass = "Required.. || Please enter valid password";
        $errorresult=false;
    }
    else
    {
        $error_pass = "";
    }
    if(c_pass($_POST['c_c_pass']))
    {
        $error_c_pass = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_c_pass = "";
    }

    if(city($_POST['c_city']))
    {
        $error_city = "Required.. || Please enter valid city.";
        $errorresult=false;
    }
    else
    {
        $error_city = "";
    }
    if(state($_POST['c_state']))
    {
        $error_state = "Required.. || Please enter valid state.";
        $errorresult=false;
    }
    else
    {
        $error_state = "";
    }
    if(contact($_POST['c_contact']))
    {
        $error_c_contact = "Required || Please enter valid contact || Contact is already registered.";
        $errorresult=false;
    }
    else
    {
        $error_c_contact = "";
    }
    if(address($_POST['c_address']))
    {
        $error_address = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_address = "";
    }
    if(pincode($_POST['c_pincode']))
    {
        $error_pincode = "Required.. || Please enter valid pincode.";
        $errorresult=false;
    }
    else
    {
        $error_pincode = "";
    }
    $test_img2=$_FILES['c_image']['name'];
                
    if(images($test_img2))
    {   
        $error_image2="JPEG or PNG or JPG file.";
        $errorresult=false;
    }
    else{
        $error_image2="";
    }
    if($errorresult==false)
    {
        goto end;
    }
    $c_name = $_POST['c_name'];
    $c_lname=$_POST['c_lname'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_state = $_POST['c_state'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_pincode=$_POST['c_pincode'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    move_uploaded_file($c_image_tmp,"customer/customer_images/".$c_image);
    $insert_customer = "insert into customers (customer_name,customer_lname,customer_email,customer_pass,customer_state,customer_city,customer_contact,customer_address,customer_pincode,customer_image,customer_date,customer_status) values ('$c_name','$c_lname','$c_email','$c_pass','$c_state','$c_city','$c_contact','$c_address','$c_pincode','$c_image',NOW(),'no')";
    $run_customer = mysqli_query($con,$insert_customer);
    if($run_customer)
    {
        require 'PHPMailer/PHPMailerAutoload.php';
      $mail=new PHPMailer;
    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'ssl://smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'skotebicycle@gmail.com';                     // SMTP username
        $mail->Password   = 'Ab7man91';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom('skotebicycle@gmail.com', 'SKOTE');
        $mail->addAddress($c_email, $c_email);     // Add a recipient
    
        $html='<!DOCTYPE html>
        <html lang="en">
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
                <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
                <title>SKOTE - Bikes Shop</title>
                <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
                <style type="text/css">
                    body{
                        text-align: center;
                        margin: 0 auto;
                        width: 650px;
                        font-family: "Open Sans", sans-serif;
                        background-color: #e2e2e2;		      	
                        display: block;
                    }
                    ul{
                        margin:0;
                        padding: 0;
                    }
                    li{
                        display: inline-block;
                        text-decoration: unset;
                    }
                    a{
                        text-decoration: none;
                    }
                    p{
                        margin: 15px 0;
                    }
        
                    h5{
                        color:#444;
                        text-align:left;
                        font-weight:400;
                    }
                    .text-center{
                        text-align: center
                    }
                    .main-bg-light{
                        background-color: #fafafa;
                    }
                    .title{
                        color: #444444;
                        font-size: 22px;
                        font-weight: bold;
                        margin-top: 10px;
                        margin-bottom: 10px;
                        padding-bottom: 0;
                        text-transform: uppercase;
                        display: inline-block;
                        line-height: 1;
                    }
                    table{
                        margin-top:30px
                    }
                    table.top-0{
                        margin-top:0;
                    }
                    table.order-detail , .order-detail th , .order-detail td {
                        border: 1px solid #ddd;
                        border-collapse: collapse;
                    }
                    .order-detail th{
                        font-size:16px;
                        padding:15px;
                        text-align:center;
                    }
                    .footer-social-icon tr td img{
                        margin-left:5px;
                        margin-right:5px;
                    }
                </style>
            </head>
            <body style="margin: 20px auto;">
                
                <table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
                    <tbody>
                        <tr>
                            <td>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr class="header">
                                        <td align="left" valign="top" >
                                            <img src="cid:1001" class="main-logo" style="width: 150px;">
                                        </td>
                                    </tr>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" >
                                    <tr>
                                        <td>
                                            <h2 class="title">Email Verification.</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                       <p> Click <a href="http://localhost/SKOTE/register-verification-'.base64_encode($c_email).'" class="btn btn-sqr">here</a> to activate your account.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="border-top:1px solid #777;height:1px;margin-top: 30px;">
                                        </td>
                                    </tr>
                                </table>                        
        <table class="main-bg-light text-center top-0"  align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 30px;">
                                    <div>
                                        <h4 class="title" style="margin:0;text-align: center;">Follow us</h4>
                                    </div>
                                    <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon" align="center" class="text-center" style="margin-top:20px;">
                                        <tr>
                                            <td>
                                                <a href="#"><img src="cid:1004" alt="">
                                                
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#"><img src="cid:1005" alt=""></a>
                                            </td>
                                            <td>
                                                <a href="#"><img src="cid:1006" alt=""></a>
                                            </td>
                                            <td>
                                                <a href="#"><img src="cid:1007" alt=""></a>
                                            </td>
                                        </tr>                                    
                                    </table>
                                    <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
                                    <table  border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;" >
                                        <tr>
                                            <td>
                                                <a href="#" style="font-size:13px">Want to change how you receive these emails?</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="font-size:13px; margin:0;">© 2020 Skote.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" style="font-size:13px; margin:0;text-decoration: underline;">Unsubscribe</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
    </body>
</html>';
                                       
        // Content
           $mail->AddEmbeddedImage("assets/img/email-temp/logo.png",1001,'logo.png');
        
        $mail->AddEmbeddedImage("assets/img/email-temp/facebook.png",1004, 'facebook.png');
        $mail->AddEmbeddedImage("assets/img/email-temp/youtube.png", 1005, 'youtube.png');
        $mail->AddEmbeddedImage("assets/img/email-temp/twitter.png",1006,  'twitter.png');
        $mail->AddEmbeddedImage("assets/img/email-temp/pinterest.png",1007,  'pinterest.png');          

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "{Last Step}-Email Verification Required";
        $mail->Body    = "$html";
        $mail->AltBody = "";

        if($mail->send())
        {
        
        ?>
                    <script type="text/javascript">
                    swal({
                            title: "Registration successful.",
                            text: "Please Check Your Email For Confirmation.",
                            icon: "success",
                            buttons: [, "OK"],
                            successMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.open('customer/login', '_self');
                            } else {
                                window.open('customer/login', '_self');
                            }
                        });
                    </script>
                    <?php 
        }
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    }
}
end:
?>
                    <div class="col-lg-9">

                        <div class="login-reg-form-wrap sign-up-form">
                            <h5>Register Form</h5>
                            <form action="register" method="POST" id="registration_form" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <label for="f_name">First Name</label>
                                            <input type="text" name="c_name" id="f_name"
                                                placeholder="Enter your First name" autocomplete="off">
                                            <span style="color: red;"><?php echo $error_c_name;?></span>
                                            <span id="f_nameMsg"></span>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <label for="c_lname">Last Name</label>
                                            <input type="text" placeholder="Enter your Last name" name="c_lname"
                                                id="l_name" autocomplete="off" />
                                            <span id="l_nameMsg"></span>
                                            <span style="color: red;"><?php echo $error_l_name; ?></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-input-item">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder="Enter your Email" name="c_email" id="email"
                                        autocomplete="off" />
                                    <span id="emailMsg"></span>
                                    <span style="color: red;"><?php echo $error_email; ?></span>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <label for="pass">Password</label>
                                            <input type="password" placeholder="Enter your Password" id="pass"
                                                name="c_pass" />
                                            <span id="passMsg"></span>
                                            <span style="color: red;"><?php echo $error_pass; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <label for="c_pass">Repeat Password</label>
                                            <input type="password" placeholder="Repeat your Password" id="c_pass"
                                                name="c_c_pass" />
                                            <span id="c_passMsg"></span>
                                            <span style="color: red;"><?php echo $error_c_pass; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <label for="state">State</label>
                                    <input type="text" placeholder="Enter your state" name="c_state" id="state" />
                                    <span id="stateMsg"></span>
                                    <span style="color: red;"><?php echo $error_state; ?></span>
                                </div>

                                <div class="single-input-item">
                                    <label for="city">City</label>
                                    <input type="text" placeholder="Enter your City" name="c_city" id="city" />
                                    <span id="cityMsg"></span>
                                    <span style="color: red;"><?php echo $error_city; ?></span>
                                </div>
                                <div class="single-input-item">
                                    <label for="contact">Contact</label>
                                    <input type="text" placeholder="Enter your contact " name="c_contact"
                                        id="contact" />
                                    <span id="contactMsg"></span>
                                    <span style="color: red;"><?php echo $error_c_contact; ?></span>
                                </div>

                                <div class="single-input-item">
                                    <label for="address">Address</label>
                                    <input type="text" placeholder="Enter your Address" name="c_address" id="address" />
                                    <span id="addressMsg"></span>
                                    <span style="color: red;"><?php echo $error_address; ?></span>
                                </div>

                                <div class="single-input-item">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" placeholder="Enter your Pincode" name="c_pincode" id="pincode" />
                                    <span id="pincodeMsg"></span>
                                    <span style="color: red;"><?php echo $error_pincode; ?></span>
                                </div>

                                <div class="single-input-item">
                                    <label for="image">Image</label>
                                    <input type="file" name="c_image" id="image" accept=".jpg,.jpeg,.png" />
                                    <span id="imageMsg"></span>
                                    <span style="color: red;"><?php echo $error_image2; ?></span>
                                </div>

                                <div class="single-input-item">
                                    <button class="btn btn-sqr" id="btnsubmit" name="register">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
$(document).ready(function() {
    // set initially button state hidden
    var f_name_err = true;
    var l_name_err = true;
    var email_err = true;
    var pass_err = true;
    var c_pass_err = true;
    var state_err = true;
    var city_err = true;
    var contact_err = true;
    var pincode_err = true;
    var address_err = true;
    var image_err = true;

    $("#btnsubmit").attr("disabled", true);

    $('#f_name').keyup(function() {
        f_name_check();
    });
    $('#f_name').focusout(function() {
        f_name_check();
    });

    $('#l_name').keyup(function() {
        l_name_check();
    });
    $('#l_name').focusout(function() {
        l_name_check();
    });

    $('#email').keyup(function() {
        email_check();
    });
    $('#email').focusout(function() {
        var email = $("#email").val();
        $.ajax({
            url: "registers.php",
            method: "POST",
            data: {
                email: email
            },
            success: function(data) {
                if (data != '0') {
                    $("#email").css("border", "1px solid red");
                    $("#emailMsg").html(
                        "<p class='text-danger'>Email is already registered.</p>");
                    $('#emailMsg').focus();
                    $("#btnsubmit").attr("disabled", true);
                    email_err = false;
                    return false;
                } else {
                    email_check();
                }
            }
        });

    });

    $('#pass').keyup(function() {
        pass_check();
    });
    $('#pass').focusout(function() {
        pass_check();
    });

    $('#c_pass').keyup(function() {
        c_pass_check();
    });
    $('#c_pass').focusout(function() {
        c_pass_check();
    });

    $('#state').keyup(function() {
        state_check();
    });
    $('#state').focusout(function() {
        state_check();
    });

    $('#city').keyup(function() {
        city_check();
    });
    $('#city').focusout(function() {
        city_check();
    });

    $('#contact').keyup(function() {
        contact_check();
    });
    $('#contact').focusout(function() {
        var phone = $("#contact").val();
        $.ajax({
            url: "registers.php",
            method: "POST",
            data: {
                phone: phone
            },
            success: function(data) {
                if (data != '0') {
                    $("#contact").css("border", "1px solid red");
                    $("#contactMsg").html(
                        "<p class='text-danger'>Contact is already registered.</p>");
                    $('#contactMsg').focus();
                    $("#btnsubmit").attr("disabled", true);
                    contact_err = false;
                    return false;
                } else {
                    contact_check();
                }
            }
        });
    });

    $('#pincode').keyup(function() {
        pincode_check();
    });
    $('#pincode').focusout(function() {
        pincode_check();
    });

    $('#address').keyup(function() {
        address_check();
    });
    $('#address').focusout(function() {
        address_check();
    });
    // use keyup event on email field
    function f_name_check() {
        var f_name = $('#f_name').val();
        var reg = /^[A-Za-z]*$/
        if (f_name.length == '') {
            $("#f_name").css("border", "1px solid red");
            $("#f_nameMsg").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#f_nameMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            f_name_err = false;
            return false;
        } else {
            $("#f_name").css("border", "1px solid green");
            $("#f_nameMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);

        }
        if (!(reg.test(f_name))) {
            $("#f_name").css("border", "1px solid red");
            $("#f_nameMsg").html("<p class='text-danger'>Invalid first name.</p>");
            $('#f_nameMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            f_name_err = false;
            return false;
        } else {
            $("#f_name").css("border", "1px solid green");
            $("#f_nameMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }

    }

    function l_name_check() {
        var l_name = $('#l_name').val();
        var reg = /^[A-Za-z]*$/
        if (l_name.length == '') {
            $("#l_name").css("border", "1px solid red");
            $("#l_nameMsg").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#l_nameMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            l_name_err = false;
            return false;
        } else {
            $("#l_name").css("border", "1px solid green");
            $("#l_nameMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);

        }
        if (!(reg.test(l_name))) {
            $("#l_name").css("border", "1px solid red");
            $("#l_nameMsg").html("<p class='text-danger'>Invalid last name.</p>");
            $('#l_nameMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            l_name_err = false;
            return false;
        } else {
            $("#l_name").css("border", "1px solid green");
            $("#l_nameMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }

    }

    function email_check() {
        var email = $('#email').val();
        var reg = /@gmail\.com$/
        if (email.length == '') {
            $("#email").css("border", "1px solid red");
            $("#emailMsg").html("<p class='text-danger'>Please fill out this field.</p>");
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
            $("#emailMsg").html("<p class='text-danger'>Invalid email id (Only add Gmail id).</p>");
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

    function pass_check() {
        var pass = $('#pass').val();
        var reg = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/
        if (pass.length == '') {
            $("#pass").css("border", "1px solid red");
            $("#passMsg").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#passMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            pass_err = false;
            return false;
        } else {
            $("#pass").css("border", "1px solid green");
            $("#passMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }
        if (!(reg.test(pass))) {
            $("#pass").css("border", "1px solid red");
            $("#passMsg").html("<p class='text-danger'>Invalid password.</p>");
            $('#passMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            pass_err = false;
            return false;
        } else {
            $("#pass").css("border", "1px solid green");
            $("#passMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }

    }

    function c_pass_check() {
        var pass = $('#pass').val();
        var c_pass = $('#c_pass').val();
        if (c_pass.length == '') {
            $("#c_pass").css("border", "1px solid red");
            $("#c_passMsg").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#c_passMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            c_pass_err = false;
            return false;
        } else {
            $("#c_pass").css("border", "1px solid green");
            $("#c_passMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }
        if (c_pass != pass) {
            $("#c_pass").css("border", "1px solid red");
            $("#c_passMsg").html("<p class='text-danger'>Password are not matching</p>");
            $('#c_passMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            c_pass_err = false;
            return false;
        } else {
            $("#c_pass").css("border", "1px solid green");
            $("#c_passMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }
    }

    function state_check() {
        var state = $('#state').val();
        var reg = /^[A-Za-z]*$/
        if (state.length == '') {
            $("#state").css("border", "1px solid red");
            $("#stateMsg").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#stateMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            state_err = false;
            return false;
        } else {
            $("#state").css("border", "1px solid green");
            $("#stateMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }
        if (!(reg.test(state))) {
            $("#state").css("border", "1px solid red");
            $("#stateMsg").html("<p class='text-danger'>Invalid state.</p>");
            $('#stateMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            state_err = false;
            return false;
        } else {
            $("#state").css("border", "1px solid green");
            $("#stateMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }

    }

    function city_check() {
        var city = $('#city').val();
        var reg = /^[A-Za-z]*$/
        if (city.length == '') {
            $("#city").css("border", "1px solid red");
            $("#cityMsg").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#cityMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            city_err = false;
            return false;
        } else {
            $("#city").css("border", "1px solid green");
            $("#cityMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }
        if (!(reg.test(city))) {
            $("#city").css("border", "1px solid red");
            $("#cityMsg").html("<p class='text-danger'>Invalid city.</p>");
            $('#cityMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            city_err = false;
            return false;
        } else {
            $("#city").css("border", "1px solid green");
            $("#cityMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }

    }

    function contact_check() {
        var contact = $('#contact').val();
        var reg = /^[9876][0-9]{9}$/
        if (contact.length == '') {
            $("#contact").css("border", "1px solid red");
            $("#contactMsg").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#contactMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            contact_err = false;

            return false;
        } else {
            $("#contact").css("border", "1px solid green");
            $("#contactMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }
        if (!(reg.test(contact))) {
            $("#contact").css("border", "1px solid red");
            $("#contactMsg").html("<p class='text-danger'>Invalid contact number.</p>");
            $('#contactMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            contact_err = false;
            return false;
        } else {
            $("#contact").css("border", "1px solid green");
            $("#contactMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }

    }

    function pincode_check() {
        var pincode = $('#pincode').val();
        var reg = /^[1-9][0-9]{5}$/
        if (pincode.length == '') {
            $("#pincode").css("border", "1px solid red");
            $("#pincodeMsg").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#pincodeMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            pincode_err = false;
            return false;
        } else {
            $("#pincode").css("border", "1px solid green");
            $("#pincodeMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }
        if (!(reg.test(pincode))) {
            $("#pincode").css("border", "1px solid red");
            $("#pincodeMsg").html("<p class='text-danger'>Invalid pincode.</p>");
            $('#pincodeMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            pincode_err = false;
            return false;
        } else {
            $("#pincode").css("border", "1px solid green");
            $("#pincodeMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }

    }

    function address_check() {
        var pass = $('#address').val();
        if (pass.length == '') {
            $("#address").css("border", "1px solid red");
            $("#addressMsg").html("<p class='text-danger'>Please fill out this field.</p>");
            $('#addressMsg').focus();
            $("#btnsubmit").attr("disabled", true);
            pass_err = false;
            return false;
        } else {
            $("#address").css("border", "1px solid green");
            $("#addressMsg").html("<p class='text-danger'></p>");
            $("#btnsubmit").attr("disabled", false);
        }
    }

});
</script>


</body>

</html>