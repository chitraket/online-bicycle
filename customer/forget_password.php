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
                                <li class="breadcrumb-item"><a href="../home"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Froget password</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    <?php
 $error_email="";
 $errorresult=true;
if(isset($_POST['otp']))
{
    if(email($_POST['email']))
    {
        $error_email = "Required..";
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
    $email=$_POST['email'];
    $get_products="select * from customers where customer_email='$email' and customer_status='yes'";
    $run_products=mysqli_query($con,$get_products);

    if(mysqli_num_rows($run_products)>0)
    {

        $otp=rand(1111,9999);
        $_SESSION['otp']=$otp;
      $_SESSION['email']=$email;


      require '../PHPMailer/PHPMailerAutoload.php';
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
        $mail->addAddress($email, $email);     // Add a recipient
    
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
                                            <h2 class="title">Forget Password</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>'.$otp.' is your SKOTE verification code. Enjoy shopping ! </p>
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
                                                <p style="font-size:13px; margin:0;">2018 - 19 Copy Right by Themeforest powerd by Pixel Strap</p>
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
        $mail->Subject = "Forget Password";
        $mail->Body    = "$html";
        $mail->AltBody = "";

        if($mail->send())
        {
            ?>
    <script type="text/javascript">
    swal({
            title: "OTP send successful",
            text: "OTP has been sent to your email address",
            icon: "success",
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
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
        
        }
        else
        {
          ?>
    <script type="text/javascript">
    swal({
            title: "Email id is not registered",
            text: "",
            icon: "error",
            buttons: [, "OK"],
            successMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.open('forget-password', '_self');
            }
            else{
                window.open('forget-password', '_self');
            }
        });
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
                            <h5>Forget Password</h5>
                            <form action="forget-password" method="post">
                                <div class="single-input-item">
                                    <input type="text" placeholder="Enter Email" name="email" id="email" />
                                    <span id="emailMsg"></span>
                                    <span style="color: red;"><?php echo $error_email; ?></span>
                                </div>

                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button type="submit" class="btn btn-sqr" name="otp" id="btnsubmit"
                                        onclick="send_otp()">Send OTP</button>
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
$(document).ready(function() {
    var email_err = true;


    $("#btnsubmit").attr("disabled", true);

    $('#email').keyup(function() {
        email_check();
    });
    $('#email').focusout(function() {
        email_check();
    });

    function email_check() {
        var email = $('#email').val();
        var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
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
            $("#emailMsg").html("<p class='text-danger'>Invalid email.</p>");
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


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:08 GMT -->

</html>