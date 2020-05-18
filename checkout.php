<?php
    $active='';
    include("includes/header.php");
   $_SESSION['papage']=1;
?>
<?php 
           
           if(!isset($_SESSION['customer_email'])){
            echo "<script>window.open('customer/login','_self')</script>";
           }     
           if(empty($_SESSION['shopping_cart']))
           {
            echo "<script>window.open('home','_self')</script>";
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
                                <li class="breadcrumb-item"><a href="home"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <?php
$session_email=$_SESSION['customer_email'];
$select_customer="select * from customers where customer_email='$session_email'";
$run_customers=mysqli_query($con,$select_customer);
$row_customer=mysqli_fetch_array($run_customers);
$customer_id=$row_customer['customer_id'];
$_SESSION['c_id']=$customer_id;

?>
    <?php 
                 $error_c_name = ""; 
                 $error_l_name="";
                 $error_pass="";
                 $error_c_pass="";
                 $error_c_contact="";
                 $error_city="";
                 $error_state="";
                 $error_address="";
                 $error_pincode="";
                 $error_box="";
                 //$address="";
                 $error_new_address="";
                 $errorresult=true;
        if(isset($_POST['place_order']))
        {

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
    if(contacts($_POST['c_contact']))
    {
        $error_c_contact = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_c_contact = "";
    }
    if(address($_POST['c_addresss']))
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
    if(empty($_POST['payment']))
    {
        $error_new_address="Required..";
        $errorresult=false;
    }
    else
    {
        $error_new_address="";
    }
    if(empty($_POST['paymentmethod']))
    {
        $error_box="Required..";
        $errorresult=false;
    }
    else{
        $error_box="";
    }
    if($errorresult==false)
    {
        goto end;
    }
    
            if($_POST['paymentmethod']=="cash")
            {
                $_SESSION['CUST_ID']=$_POST['CUST_ID'];
              ?>
    <script type="text/javascript">
    swal({
            title: "Order Successfully Placed",
            text: "Thank you for ordering. We received your order and will begin processing it soon. Your order information appears below.",
            icon: "success",
            buttons: true,
            successMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.open('form_process2.php', '_self');
            } else {
                window.open('checkout', '_self');
            }
        });
    </script>
    <?php
            }
            else{  
                $_SESSION['ORDER_ID']=$_POST['ORDER_ID'];
                $_SESSION['CUST_ID']=$_POST['CUST_ID'];
               // $_SESSION['c_id']=$customer_id;
                $_SESSION['INDUSTRY_TYPE_ID']=$_POST['INDUSTRY_TYPE_ID'];
                $_SESSION['CHANNEL_ID']=$_POST['CHANNEL_ID'];
                $_SESSION['TXN_AMOUNT']=$_POST['TXN_AMOUNT'];
            echo "<script>window.open('pgRedirect.php','_self')</script>";
            }
            $customer_emails=$_SESSION['customer_email'];
            $f_names=$_POST['c_name'];
            if(isset($_SESSION['customer_email']))
            {
            $email=$_SESSION['customer_email'];
            }
            $country=$_POST['c_state'];
            $city=$_POST['c_city'];
            $phone=$_POST['c_contact'];
                if($_POST['payment']=='deliert')
                {
                    $address=$_POST['c_address'];
                }
                else
                {
                    $address=$_POST['c_addresss'];
                }
            $update_order="update customers set customer_name='$f_names',customer_email='$email',customer_state='$country',customer_city='$city',customer_contact='$phone',customer_address='$address' where customer_email='$customer_emails'";
            $run_querys=mysqli_query($db,$update_order);

        }
        end:
        ?>
    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">

            <form name="postForm" action="#" method="POST">

                <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID"
                    autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
                <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID"
                    autocomplete="off" value="<?php echo $customer_id; ?>">
                <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID"
                    autocomplete="off" value="Retail">
                <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID"
                    autocomplete="off" value="WEB">
                <div class="row">

                    <?php
                
                if(isset($_SESSION['customer_email'])){
                    $customer_email=$_SESSION['customer_email'];
                    $select_customer = "select * from customers where customer_email='$customer_email'";
                    $run_customer=mysqli_query($con,$select_customer);
                    while($row_products=mysqli_fetch_array($run_customer)){
                        $customer_name=$row_products['customer_name'];
                        $customer_lname=$row_products['customer_lname'];
                        $customer_email=$row_products['customer_email'];
                        $customer_country=$row_products['customer_state'];
                        $customer_address=$row_products['customer_address'];
                        $customer_city=$row_products['customer_city'];
                        $customer_contact=$row_products['customer_contact'];
                        $customer_pincode=$row_products['customer_pincode'];
                ?>
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Billing Details</h5>
                            <div class="billing-form-wrap">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="f_name" class="required">First Name</label>
                                            <input type="text" name="c_name" id="f_name"
                                                placeholder="Enter your First name"
                                                value="<?php echo $customer_name; ?>" required />
                                            <span style="color: red;"><?php echo $error_c_name;?></span>
                                            <span id="f_nameMsg"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="f_name" class="required">Last Name</label>
                                            <input type="text" name="c_lname" id="l_name"
                                                placeholder="Enter your Last name"
                                                value="<?php echo $customer_lname; ?>" required />
                                            <span id="l_nameMsg"></span>
                                            <span style="color: red;"><?php echo $error_l_name; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <label for="town" class="required">Email</label>
                                    <input type="text" placeholder="Enter your Email"
                                        value="<?php echo $_SESSION['customer_email'] ?>" disabled />

                                </div>
                                <div class="single-input-item">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cashon" name="payment" value="deliert"
                                            class="custom-control-input" checked />
                                        <label class="custom-control-label" for="cashon" class="required">Delivery
                                            address <span
                                                style="color: red;"><?php echo $error_new_address; ?></span></label>
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <textarea placeholder="Enter your Address" cols="30" rows="3"
                                        disabled><?php echo $customer_address; ?></textarea>
                                    <input type="hidden" name="c_address" value="<?php echo $customer_address; ?>" />
                                </div>

                                <div class="single-input-item">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cashons" name="payment" value="new"
                                            class="custom-control-input" />
                                        <label class="custom-control-label" for="cashons" class="required">New address
                                            <span style="color: red;"><?php echo $error_new_address; ?></span></label>


                                    </div>
                                </div>


                                <div class="single-input-item">
                                    <textarea placeholder="Enter New Address" name="c_addresss" id="txtaddress"
                                        cols="30" rows="3"><?php echo "  " ?></textarea>
                                    <span id="addressMsg"></span>
                                    <span style="color: red;"><?php echo $error_address; ?></span>
                                </div>
                                <div class="single-input-item">
                                    <label for="town" class="required">Town / City</label>
                                    <input type="text" placeholder="Enter your City" name="c_city" id="city"
                                        value="<?php echo $customer_city; ?>" required />
                                    <span id="cityMsg"></span>
                                    <span style="color: red;"><?php echo $error_city; ?></span>
                                </div>

                                <div class="single-input-item">
                                    <label for="state" class="required">State / Divition</label>
                                    <input type="text" placeholder="Enter your state" name="c_state" id="state"
                                        value="<?php echo $customer_country; ?>" />
                                    <span id="stateMsg"></span>
                                    <span style="color: red;"><?php echo $error_state; ?></span>
                                </div>

                                <div class="single-input-item">
                                    <label for="postcode" class="required">Postcode / ZIP</label>
                                    <input type="text" placeholder="Enter your Pincode" name="c_pincode" id="pincode"
                                        value="<?php echo $customer_pincode; ?>" required />
                                    <span id="pincodeMsg"></span>
                                    <span style="color: red;"><?php echo $error_pincode; ?></span>
                                </div>

                                <div class="single-input-item">
                                    <label for="phone" class="required">Phone</label>

                                    <input type="text" placeholder="Enter your contact"
                                        value="<?php echo $customer_contact; ?>" disabled />
                                    <input type="hidden" name="c_contact" id="contact"
                                        value="<?php echo $customer_contact; ?>" required>
                                    <span id="contactMsg"></span>
                                    <span style="color: red;"><?php echo $error_c_contact; ?></span>
                                </div>

                                <!-- <div class="single-input-item">
                                        <label for="ordernote">Order Note</label>
                                        <textarea name="ordernote" name="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>-->
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                } 
                        ?>
                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Your Order Summary</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total=0;
                                              foreach ($_SESSION['shopping_cart'] as $key => $value) {
                                                  $total=$total+$value['item_price']*$value['item_qty'];
                                            ?>
                                            <tr>
                                                <?php if($value['papage']==0)
                                                {?>
                                                <td><a href="bikes-<?php echo base64_encode($value['item_id']); ?>"><?php echo $value['item_name']; ?>
                                                        <strong> × <?php echo $value['item_qty']; ?></strong></a>
                                                </td>
                                                <td><?php echo $value['item_price']*$value['item_qty']; ?></td>
                                                <?php
                                                }
                                                if ($value['papage']==1) {
                                                    ?>
                                                <td><a
                                                        href="accessories-<?php echo base64_encode($value['item_id']); ?>"><?php echo $value['item_name']; ?>
                                                        <strong> × <?php echo $value['item_qty']; ?></strong></a>
                                                </td>
                                                <td><?php echo $value['item_price']*$value['item_qty']; ?></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                        </tbody>
                                        <?php 
                                                }
                                        ?>
                                        <tfoot>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><strong><?php echo $total; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>GST (12%)</td>
                                                <td><strong><?php echo $gst=$total*12/100; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td><strong><?php echo $totals=$total+$gst; ?></strong>
                                                    <input type="hidden" title="TXN_AMOUNT" tabindex="10" type="text"
                                                        name="TXN_AMOUNT" value="<?php echo $totals; ?>">
                                                </td>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>

                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                                    class="custom-control-input" checked required />
                                                <label class="custom-control-label" for="cashon">Cash On Delivery <span
                                                        style="color: red;"><?php echo $error_box; ?></span></label>

                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>

                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="paypalpayment" name="paymentmethod"
                                                    value="paypal" class="custom-control-input" />
                                                <label class="custom-control-label" for="paypalpayment">Paytm <img
                                                        src="assets/img/paypal-card.jpg" class="img-fluid paypal-card"
                                                        alt="Paypal" /> <span
                                                        style="color: red;"><?php echo $error_box; ?></span></label>

                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="paypal">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.</p>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">I have read and agree to
                                                the website <a href="index.html">terms and conditions.</a></label>
                                        </div>
                                        <button type="submit" name="place_order" class="btn btn-sqr">Place
                                            Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <!-- checkout main wrapper end -->
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
    var pass_err = true;
    var c_pass_err = true;
    var state_err = true;
    var city_err = true;
    var contact_err = true;
    var pincode_err = true;
    var address_err = true;

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
        contact_check();
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