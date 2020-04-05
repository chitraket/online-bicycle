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
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
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
                        <!-- Login Content Start -->
                        <!-- Login Content End -->
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
 $errorresult=true;
if(isset($_POST['register'])){
    if(firstname($_POST['c_name']))
    {
        $error_c_name = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_c_name = "";
    }
    if(lastname($_POST['c_lname']))
    {
        $error_l_name = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_l_name = "";
    }
    if(email($_POST['c_email']))
    {
        $error_email = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_email = "";
    }
    if(pass($_POST['c_pass']))
    {
        $error_pass = "Required..";
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
        $error_city = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_city = "";
    }
    if(state($_POST['c_state']))
    {
        $error_state = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_state = "";
    }
    if(contact($_POST['c_contact']))
    {
        $error_c_contact = "Required..";
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
        $error_pincode = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_pincode = "";
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
    $c_image = uniqid().$_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    move_uploaded_file($c_image_tmp,"customer/customer_images/".$c_image);
    $insert_customer = "insert into customers (customer_name,customer_lname,customer_email,customer_pass,customer_state,customer_city,customer_contact,customer_address,customer_pincode,customer_image) values ('$c_name','$c_lname','$c_email','$c_pass','$c_state','$c_city','$c_contact','$c_address','$c_pincode','$c_image')";
    $run_customer = mysqli_query($con,$insert_customer);
    
        /// If register have items in cart ///
        $_SESSION['customer_email']=$c_email;
        foreach ($_SESSION as $product) {
            if (!is_array($product)) {
                ?>
                    <script type="text/javascript">
                    swal({
                        title: "Registration successful.",
                        text: "",
                        icon: "success",
                        buttons: true,
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('index.php','_self');
                        } else {
                        
                        }
                });
                    </script>

                 <?php
                 continue;
            } 
            else {
                ?>
                <script type="text/javascript">
                    swal({
                        title: "Registration successful.",
                        text: "",
                        icon: "success",
                        buttons: true,
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('checkout.php','_self');
                        } else {
                        }
                });
        </script> 
        <?php
            }
        } ?>
      <?php
}
end:
?>
                        <div class="col-lg-9">

                            <div class="login-reg-form-wrap sign-up-form">
                                <h5>Singup Form</h5>
                                <form action="#" method="post" id="registration_form" enctype="multipart/form-data">                                    
                                
                                <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                    <input type="text" name="c_name" id="f_name" placeholder="Enter your First name" autocomplete="off" >
                                                    <span style="color: red;"><?php echo $error_c_name;?></span>
                                                    <span id="f_nameMsg"></span>
                                                    
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="text" placeholder="Enter your Last name" name="c_lname" id="l_name"  autocomplete="off" />
                                                <span id="l_nameMsg"></span>
                                                <span style="color: red;"><?php echo $error_l_name; ?></span>
                                            </div>
                                        </div>
                                </div>

                
                                    <div class="single-input-item">
                                        <input type="email" placeholder="Enter your Email" name="c_email"  id="email" autocomplete="off"/>
                                        <span id="emailMsg"></span>
                                        <span style="color: red;"><?php echo $error_email; ?></span>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" placeholder="Enter your Password" id="pass" name="c_pass"/>
                                                <span id="passMsg"></span>
                                                <span style="color: red;"><?php echo $error_pass; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" placeholder="Repeat your Password" id="c_pass" name="c_c_pass" />
                                                <span id="c_passMsg"></span>
                                                <span style="color: red;"><?php echo $error_c_pass; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Enter your state" name="c_state" id="state"/>
                                        <span id="stateMsg"></span>
                                        <span style="color: red;"><?php echo $error_state; ?></span>
                                    </div>
                           
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Enter your City" name="c_city" id="city" />
                                        <span id="cityMsg"></span>
                                        <span style="color: red;"><?php echo $error_city; ?></span>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Enter your contact " name="c_contact" id="contact"/>
                                        <span id="contactMsg"></span>
                                        <span style="color: red;"><?php echo $error_c_contact; ?></span>
                                    </div>

                                    <div class="single-input-item">
                                        <input type="text" placeholder="Enter your Address" name="c_address"  id="address"/>
                                        <span id="addressMsg"></span>
                                        <span style="color: red;"><?php echo $error_address; ?></span>
                                    </div>

                                    <div class="single-input-item">
                                        <input type="text" placeholder="Enter your Pincode" name="c_pincode" id="pincode" />
                                        <span id="pincodeMsg"></span>
                                        <span style="color: red;"><?php echo $error_pincode; ?></span>
                                    </div>

                                    <div class="single-input-item">
                                    <input type="file"  name="c_image" />
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
    <!-- Quick view modal start -->
    <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html">HasTech</a>
                                    </div>
                                    <h3 class="product-name">Handmade Golden Necklace</h3>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <div class="pro-review">
                                            <span>1 Reviews</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">$70.00</span>
                                        <span class="price-old"><del>$90.00</del></span>
                                    </div>
                                    <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                    <div class="product-countdown" data-countdown="2022/02/20"></div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>200 in stock</span>
                                    </div>
                                    <p class="pro-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod tempor invidunt ut labore et dolore magna.</p>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="useful-links">
                                        <a href="#" data-toggle="tooltip" title="Compare"><i
                                            class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                            class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->
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
		// set initially button state hidden
        var f_name_err=true;
        var l_name_err=true;
        var email_err=true;
        var pass_err=true;
        var c_pass_err=true;
        var state_err=true;
        var city_err=true;
        var contact_err=true;
        var pincode_err=true;
        var address_err=true;

        $("#btnsubmit").attr("disabled",true);

        $('#f_name').keyup(function(){
            f_name_check();
        });
        $('#f_name').focusout(function(){
            f_name_check();
        });

        $('#l_name').keyup(function(){
            l_name_check();
        });
        $('#l_name').focusout(function(){
            l_name_check();
        });

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

        $('#c_pass').keyup(function(){
            c_pass_check();
        });
        $('#c_pass').focusout(function(){
            c_pass_check();
        });

        $('#state').keyup(function(){
            state_check();
        });
        $('#state').focusout(function(){
            state_check();
        });

        $('#city').keyup(function(){
            city_check();
        });
        $('#city').focusout(function(){
            city_check();
        });

        $('#contact').keyup(function(){
            contact_check();           
        });
        $('#contact').focusout(function(){
            contact_check();  
        });
        $('#contact').keyup(function(){
            var phone=$("#contact").val();
            $.ajax({
            url:"registers.php",
            method:"POST",
            data:{phone:phone},
            success:function(data){
               if(data!='0')
               {
                    $("#contact").css("border","1px solid red");
                    $("#contactMsg").html("<p class='text-danger'>Invalid contact numberss.</p>");
                    $('#contactMsg').focus();
                    $("#btnsubmit").attr("disabled",true);
                    contact_err=false;
                    return false;
               }
               else{
                $("#contact").css("border","1px solid green");
                $("#contactMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
               }
            }
        });
        });

        $('#pincode').keyup(function(){
            pincode_check();
        });
        $('#pincode').focusout(function(){
            pincode_check();
        });

        $('#address').keyup(function(){
            address_check();
        });
        $('#address').focusout(function(){
            address_check();
        });
		// use keyup event on email field
        function f_name_check(){
            var f_name=$('#f_name').val();
            var reg=/^[A-Za-z]*$/
            if(f_name.length=='')
            {
                $("#f_name").css("border","1px solid red");
                $("#f_nameMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#f_nameMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                f_name_err=false;
                return false;
            }
            else{
                $("#f_name").css("border","1px solid green");
                $("#f_nameMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);

            }
            if(!(reg.test(f_name)))
            {
                $("#f_name").css("border","1px solid red");
                $("#f_nameMsg").html("<p class='text-danger'>Invalid first name.</p>");
                $('#f_nameMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                f_name_err=false;
                return false;
            }
            else{
                $("#f_name").css("border","1px solid green");
                $("#f_nameMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }

        }
        function l_name_check(){
            var l_name=$('#l_name').val();
            var reg=/^[A-Za-z]*$/
            if(l_name.length=='')
            {
                $("#l_name").css("border","1px solid red");
                $("#l_nameMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#l_nameMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                l_name_err=false;
                return false;
            }
            else{
                $("#l_name").css("border","1px solid green");
                $("#l_nameMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);

            }
            if(!(reg.test(l_name)))
            {
                $("#l_name").css("border","1px solid red");
                $("#l_nameMsg").html("<p class='text-danger'>Invalid last name.</p>");
                $('#l_nameMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                l_name_err=false;
                return false;
            }
            else{
                $("#l_name").css("border","1px solid green");
                $("#l_nameMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }

        }
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
                $("#emailMsg").html("<p class='text-danger'>Invalid email id.</p>");
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
        function state_check(){
            var state=$('#state').val();
            var reg=/^[A-Za-z]*$/
            if(state.length=='')
            {
                $("#state").css("border","1px solid red");
                $("#stateMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#stateMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                state_err=false;
                return false;
            }
            else{
                $("#state").css("border","1px solid green");
                $("#stateMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }
            if(!(reg.test(state)))
            {
                $("#state").css("border","1px solid red");
                $("#stateMsg").html("<p class='text-danger'>Invalid state.</p>");
                $('#stateMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                state_err=false;
                return false;
            }
            else{
                $("#state").css("border","1px solid green");
                $("#stateMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }

        }
        function city_check(){
            var city=$('#city').val();
            var reg=/^[A-Za-z]*$/
            if(city.length=='')
            {
                $("#city").css("border","1px solid red");
                $("#cityMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#cityMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                city_err=false;
                return false;
            }
            else{
                $("#city").css("border","1px solid green");
                $("#cityMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }
            if(!(reg.test(city)))
            {
                $("#city").css("border","1px solid red");
                $("#cityMsg").html("<p class='text-danger'>Invalid city.</p>");
                $('#cityMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                city_err=false;
                return false;
            }
            else{
                $("#city").css("border","1px solid green");
                $("#cityMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }

        }
        
        function contact_check(){
            var contact=$('#contact').val();
            var reg=/^[9876][0-9]{9}$/
            if(contact.length=='')
            {
                $("#contact").css("border","1px solid red");
                $("#contactMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#contactMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                contact_err=false;
                
                return false;
            }
            else{
                $("#contact").css("border","1px solid green");
                $("#contactMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }
            if(!(reg.test(contact)))
            {
                $("#contact").css("border","1px solid red");
                $("#contactMsg").html("<p class='text-danger'>Invalid contact number.</p>");
                $('#contactMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                contact_err=false;
                return false;
            }
            else{
                $("#contact").css("border","1px solid green");
                $("#contactMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }

        }
        function pincode_check(){
            var pincode=$('#pincode').val();
            var reg=/^[1-9][0-9]{5}$/
            if(pincode.length=='')
            {
                $("#pincode").css("border","1px solid red");
                $("#pincodeMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#pincodeMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                pincode_err=false;
                return false;
            }
            else
            {
                $("#pincode").css("border","1px solid green");
                $("#pincodeMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }
            if(!(reg.test(pincode)))
            {
                $("#pincode").css("border","1px solid red");
                $("#pincodeMsg").html("<p class='text-danger'>Invalid pincode.</p>");
                $('#pincodeMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                pincode_err=false;
                return false;
            }
            else
            {
                $("#pincode").css("border","1px solid green");
                $("#pincodeMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }

        }
        function address_check(){
            var pass=$('#address').val();
            if(pass.length=='')
            {
                $("#address").css("border","1px solid red");
                $("#addressMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#addressMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                pass_err=false;
                return false;
            }
            else{
                $("#address").css("border","1px solid green");
                $("#addressMsg").html("<p class='text-danger'></p>");
                $("#btnsubmit").attr("disabled",false);
            }
           

        }

	
	});
</script>


</body>
<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:08 GMT -->
</html>



