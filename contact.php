<?php
        $active='contact';
       include("includes/header.php");
    ?>
<!-- Start Header Area -->
<!--div id="load_screen"><div id="loading"><img src="loder.gif" ></div></div>-->
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
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">contact us</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    <!-- contact area start -->
    <div class="contact-area section-padding pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-message">
                        <h4 class="contact-title">Tell Us Your Project</h4>
                        <form action="#" method="POST" class="contact-form">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input name="first_name" placeholder="Name " type="text" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="email_address" placeholder="Email " type="text" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="contact_subject" placeholder="Subject " type="text">
                                </div>
                                <div class="col-12">
                                    <div class="contact2-textarea text-center">
                                        <textarea placeholder="Message " name="message" class="form-control2"
                                            required=""></textarea>
                                    </div>
                                    <div class="contact-btn">
                                        <button class="btn btn-sqr" type="submit" name="submit">Send Message</button>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </form>
                        <?php
  
                                    if(isset($_POST['submit']))
                                    {
                                        $sender_name=$_POST['first_name'];
                                        $sender_email=$_POST['email_address'];
                                        $sender_subject=$_POST['contact_subject'];
                                        $sender_message=$_POST['message'];
                                        $receiver_email="skotebicycle@gmail.com";

                                        require 'PHPMailer/PHPMailerAutoload.php';
                                        $mail=new PHPMailer;
                                      try {
                                        
                                            $mail->IsSMTP();        //Sets Mailer to send message using SMTP
                                            $mail->Host = 'ssl://smtp.gmail.com';  //Sets the SMTP hosts
                                            $mail->Port = '465';        //Sets the default SMTP server port
                                            $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
                                            $mail->Username = 'skotebicycle@gmail.com';     //Sets SMTP username
                                            $mail->Password = 'Ab7man91';     //Sets SMTP password
                                            $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
                                            $mail->From = $_POST["email_address"];     //Sets the From email address for the message
                                            $mail->FromName = $_POST["first_name"];    //Sets the From name of the message
                                            $mail->AddAddress($receiver_email,'skote');//Adds a "To" address
                                            $mail->AddCC($_POST["email_address"], $_POST["first_name"]); //Adds a "Cc" address
                                            $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
                                            $mail->IsHTML(true);       //Sets message type to HTML    
                                            $mail->Subject = $_POST["contact_subject"];    //Sets the Subject of the message
                                            $mail->Body = $_POST["message"];    
                                  
                                          $mail->send();
                                      } 
                                      catch (Exception $e) {
                                          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                      }
                                    }
                            ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h4 class="contact-title">Contact Us</h4>
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum
                            est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum
                            formas human.</p>
                        <ul>
                            <li><i class="fa fa-home"></i> Address : 34,vip,surat</li>
                            <li><i class="fa fa-phone"></i> Phone:+91 9999999999 </li>
                            <li><i class="fa fa-envelope-o"></i>E-mail:skotebicycle@gmail.com </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
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


<!-- Quick view modal start -->
<!-- Quick view modal end -->

<!-- offcanvas mini cart start -->
<?php 
    include("includes/cart1.php")
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
</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:12 GMT -->

</html>