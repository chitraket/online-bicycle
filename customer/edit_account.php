<?php

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_lname=$row_customer['customer_lname'];

$customer_email = $row_customer['customer_email'];

$customer_state = $row_customer['customer_state'];

$customer_city = $row_customer['customer_city'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$customer_image = $row_customer['customer_image'];
if($customer_image=="")
{
    $customer_image="user.png";
}
else{
    $customer_image = $row_customer['customer_image'];
}

?>

<?php 
 $error_c_name = ""; 
 $error_l_name="";
 $error_email="";
 $error_c_contact="";
 $error_city="";
 $error_state="";
 $error_address="";
 $error_image2="";
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
    $test_img2=$_FILES['c_image']['name'];
                
    if(images($test_img2))
    {   
        $error_image2="JPEG or PNG file.";
        $errorresult=false;
    }
    else{
        $error_image2="";
    }
    if($errorresult==false)
    {
        goto end;
    }
    $update_id = $customer_id;
    $c_name = $_POST['c_name'];
    $c_lname=$_POST['c_lname'];
    $c_email = $_POST['c_email'];
    $c_state = $_POST['c_state'];
    $c_city = $_POST['c_city'];
    $c_address = $_POST['c_address'];
    $c_contact = $_POST['c_contact'];
    $c_image = $_FILES['c_image']['name'];
    
    if($c_image!="")
    {
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
    
    $update_customer = "update customers set customer_name='$c_name',customer_lname='$c_lname',customer_email='$c_email',customer_state='$c_state',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact',customer_image='$c_image' where customer_id='$update_id' ";
    $run_customer = mysqli_query($con,$update_customer);
    if($run_customer){
        
       ?> 
       <script>
                    swal({
                        title: "Your account has been edited, to complete the process.",
                        text: "",
                        icon: "success",
                        buttons: [,"OK"],
                        successMode: true,
                       
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('myaccount','_self');
                        } 
                        else {
                        }
                });
            </script>
        <?php 
    }
    
}
else
{
    $update_customer = "update customers set customer_name='$c_name',customer_lname='$c_lname',customer_email='$c_email',customer_state='$c_state',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact' where customer_id='$update_id' ";
    $run_customer = mysqli_query($con,$update_customer);
    if($run_customer){
      ?>
      <script>
                    swal({
                        title: "Your account has been edited, to complete the process.",
                        text: "",
                        icon: "success",
                        buttons: [,"OK"],
                        successMode: true,
                       
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('myaccount','_self');
                        } 
                        else {
                        }
                });
            </script>
      <?php  
      
    }

}
    
    
}
end:
?>
                        <div class="tab-pane fade" id="account-info" role="tabpanel">

                            <div class="myaccount-content">
                                <h5>Account Details</h5>
                                <div class="account-details-form">
                                <form action="#" method="post" id="registration_form" enctype="multipart/form-data">                                    
                                
                                <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                            <label for="f_name">First Name</label>
                                                    <input type="text" name="c_name" id="f_name" placeholder="Enter your First name" value="<?php echo $customer_name;?>" autocomplete="off" />
                                                    <span id="f_nameMsg"></span>
                                                    <span style="color: red;"><?php echo $error_c_name;?></span>
                                                    
                                                    
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                            <label for="c_lname">Last Name</label>
                                                <input type="text" placeholder="Enter your Last name" name="c_lname" id="l_name" value="<?php echo $customer_lname; ?>" autocomplete="off" />
                                                <span id="l_nameMsg"></span>
                                                <span style="color: red;"><?php echo $error_l_name; ?></span>
                                            </div>
                                        </div>
                                </div>

                
                                    <div class="single-input-item">
                                        <label for="email" >Email</label>
                                        <input type="email" placeholder="Enter your Email" value="<?php  echo $customer_email;?>"  disabled/>
                                        <input type="hidden" name="c_email" id="email"  value="<?php  echo $customer_email;?>"/>
                                        <span id="emailMsg"></span>
                                        <span style="color: red;"><?php echo $error_email; ?></span>
                                    </div>

                                    
                                    <div class="single-input-item">
                                    <label for="state">State</label>
                                        <input type="text" placeholder="Enter your state" name="c_state" id="state" value="<?php echo $customer_state; ?>" />
                                        <span id="stateMsg"></span>
                                        <span style="color: red;"><?php echo $error_state; ?></span>
                                    </div>
                           
                                    <div class="single-input-item">
                                    <label for="city">City</label>
                                        <input type="text" placeholder="Enter your City" name="c_city" id="city" value="<?php echo $customer_city; ?>" />
                                        <span id="cityMsg"></span>
                                        <span style="color: red;"><?php echo $error_city; ?></span>
                                    </div>
                                    <div class="single-input-item">
                                    <label for="contact">Contact</label>
                                        <input type="text" placeholder="Enter your contact "  value="<?php echo $customer_contact; ?>" disabled/>
                                        <input type="hidden" name="c_contact" id="contact" value="<?php echo $customer_contact; ?>"  required/>
                                        <span id="contactMsg"></span>
                                        <span style="color: red;"><?php echo $error_c_contact; ?></span>
                                    </div>

                                    <div class="single-input-item">
                                    <label for="f_name">Address</label>
                                        <textarea  placeholder="Enter your Address" name="c_address"  id="address"  cols="30" rows="3" ><?php echo $customer_address; ?></textarea>
                                        <span id="addressMsg"></span>
                                        <span style="color: red;"><?php echo $error_address; ?></span>
                                    </div>

                                    <div class="single-input-item">
                                    <label for="image">Image</label>
                                    <input type="file" name="c_image" id="image" accept=".jpg,.jpeg,.png,.gif"/>
                                    <span style="color: red;"><?php echo $error_image2; ?></span>
                                    <span id="imageMsg"></span>
                                    <img class="img-responsive my-4 " src="customer_images/<?php echo $customer_image; ?>" style="width:100px;height:100px;" alt="Customer Image">
                                    </div>
                                    <div class="single-input-item">
                                        <button class="btn btn-sqr" id="btnsubmit" name="register">Save Changes</button>
                                    </div>
                                </form> 
                                </div>                           
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
    
    <!-- footer area end -->
    <!-- Quick view modal start -->
    
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
        var state_err=true;
        var city_err=true;
        var contact_err=true;
        var address_err=true;
        var image_err=true;

       // $("#btnsubmit").attr("disabled",true);

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
        function address_check(){
            var pass=$('#address').val();
            if(pass.length=='')
            {
                $("#address").css("border","1px solid red");
                $("#addressMsg").html("<p class='text-danger'>Please fill out this field.</p>");
                $('#addressMsg').focus();
                $("#btnsubmit").attr("disabled",true);
                address_err=false;
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
</html>