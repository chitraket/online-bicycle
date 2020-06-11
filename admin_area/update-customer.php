<?php
 session_start();
 include("includes/db.php");
 if(!isset($_SESSION['admin_email']))
 {
     echo "<script>window.open('auth-login.php','_self')</script>";
 } 
 else{
include("includes/header.php");
include("includes/sidebar.php"); 
include("includes/validation.php");
    $paga=23;
    $admin_email=$_SESSION['admin_email'];
    $query_per="select * from admins where admin_email='$admin_email' and admin_status='yes'";
        $run_query_per=mysqli_query($con,$query_per);
        while($row_query_per=mysqli_fetch_array($run_query_per))
        {
             $admin_permission=$row_query_per['admin_permission'];
                                    
        } 
        $subject=explode(",",$admin_permission);
        if(in_array($paga,$subject))
        { 
            if(isset($_GET['customer_id']))
            {
                $edit_admin_id=$_GET['customer_id'];
                $edit_select_admin="select * from customers where customer_id='$edit_admin_id'";
               $run_edit_admin=mysqli_query($con,$edit_select_admin);
               while($row_select_admin=mysqli_fetch_array($run_edit_admin))
                {
                    $admin_email=$row_select_admin['customer_email'];
                    $admin_name=$row_select_admin['customer_name'];
                    $admin_lname=$row_select_admin['customer_lname'];
                    $admin_password=$row_select_admin['customer_pass'];
                    $admin_contact=$row_select_admin['customer_contact'];
                    $admin_image=$row_select_admin['customer_image'];
                    $admin_city=$row_select_admin['customer_city'];
                    $admin_state=$row_select_admin['customer_state'];
                    $admin_adderss=$row_select_admin['customer_address'];
                    $admin_pincode=$row_select_admin['customer_pincode'];
                    $admin_status=$row_select_admin['customer_status'];
                    
                }
            }
            $error_name="";
            $error_l_name="";
            $error_email="";
            $error_pass="";
            $error_contact="";
            $error_image2="";
            $error_state="";
            $error_city="";
            $error_status="";
            $error_pincode="";
            $error_address="";
            $errorresult=true;
            if(isset($_POST['submit'])){
                    if(firstname($_POST['a_name']))
                    {
                        $error_name="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_name="";
                    }
                    if(firstname($_POST['a_l_name']))
                    {
                        $error_l_name="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_l_name="";
                    }
                    if(firstname($_POST['a_state']))
                    {
                        $error_state="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_state="";
                    }
                    if(firstname($_POST['a_city']))
                    {
                        $error_city="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_city="";
                    }
                    if(empty($_POST['a_address']))
                    {
                        $error_address="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_address="";
                    }
                    if(emailca($_POST['a_email'],$edit_admin_id))
                    {
                        $error_email="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_email="";
                    }
                    if(pass($_POST['a_pass']))
                    {
                        $error_pass="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_pass="";
                    }
                    if(pincode($_POST['a_pincode']))
                    {
                        $error_pincode="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_pincode="";
                    }
                    if(contactca($_POST['a_contact'],$edit_admin_id))
                    {
                        $error_contact="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_contact="";
                    }

                    if(empty($_POST['customRadios']))
                    {
                        $error_status="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_status="";
                    }
                    $test_img1 = $_FILES['admin_img1']['name'];
                if(images($test_img1))
                {   
                    $error_image2="JPEG or PNG on JPG file.";
                    $errorresult=false;
                }
                else{
                    $error_image2="";
                }
                if($errorresult==false)
                    {
                        goto end;
                    }
                $a_id=$_GET['customer_id'];
              $a_name=$_POST['a_name'];
              $a_l_name=$_POST['a_l_name'];
              $a_email=$_POST['a_email'];
              $a_pass=$_POST['a_pass'];
              $a_contact=$_POST['a_contact'];
              $a_status=$_POST['customRadios'];
              $a_city=$_POST['a_city'];
              $a_state=$_POST['a_state'];
              $a_pincode=$_POST['a_pincode'];
              $a_address=$_POST['a_address'];
              $admin_img1 = $_FILES['admin_img1']['name'];
              if(!($admin_img1==''))
              {
              $temp_name1 = $_FILES['admin_img1']['tmp_name'];
             
              move_uploaded_file($temp_name1,"../customer/customer_images/$admin_img1");
              $update_cat = "update customers set customer_name='$a_name',customer_lname='$a_l_name',customer_email='$a_email',customer_pass='$a_pass',customer_state='$a_state',customer_city='$a_city',customer_contact='$a_contact',customer_address='$a_address',customer_pincode='$a_pincode',customer_image='$admin_img1',customer_status='$a_status' where customer_id='$a_id'";
              $run_cat = mysqli_query($con,$update_cat);
              if($run_cat){
                      ?>
                      <script>
                      swal({
                          title:"Your Customer Has Been Updated",
                          text: "",
                          icon: "success",
                          buttons: [,"OK"],
                          successMode: true,
                         
                  })
                  .then((willDelete) => {
                          if (willDelete) {
                              window.open('view-customer.php','_self');
                          } 
                          else {
                          }
                  });
              </script>
                      <?php
              }
          }
              else{
                  $update_cat = "update customers set customer_name='$a_name',customer_lname='$a_l_name',customer_email='$a_email',customer_pass='$a_pass',customer_state='$a_state',customer_city='$a_city',customer_contact='$a_contact',customer_address='$a_address',customer_pincode='$a_pincode',customer_status='$a_status' where customer_id='$a_id'";
              $run_cat = mysqli_query($con,$update_cat);
              if($run_cat){
                      ?>
                      <script>
                      swal({
                          title:"Your Customer Has Been Updated",
                          text: "",
                          icon: "success",
                          buttons: [,"OK"],
                          successMode: true,
                         
                  })
                  .then((willDelete) => {
                          if (willDelete) {
                              window.open('view-customer.php','_self');
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

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Update Customer</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form class="custom-validation" method="POST" enctype="multipart/form-data"> 
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Customer First Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Customer First Name" name="a_name"  value="<?php echo $admin_name; ?>" id="example-text-input" required data-parsley-pattern="[a-zA-Z]*">
                                    <span style="color: red;"><?php echo $error_name; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Customer last Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Customer last Name" name="a_l_name"  value="<?php echo $admin_lname; ?>" id="example-text-input" required data-parsley-pattern="[a-zA-Z]*">
                                    <span style="color: red;"><?php echo $error_l_name; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Customer Email</label>
                                <div class="col-md-9">
                                    <input class="form-control <?php echo $edit_admin_id; ?>" type="email" placeholder="Customer Email" name="a_email" value="<?php echo $admin_email; ?>" id="email" required>
                                    <span id="emailMsg"></span>
                                    <span style="color: red;"><?php echo $error_email; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Customer Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="password" placeholder="Customer Password" name="a_pass" value="<?php echo $admin_password; ?>" id="example-text-input" required data-parsley-pattern="(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}">
                                    <span style="color: red;"><?php echo $error_pass; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Customer Contact</label>
                                <div class="col-md-9">
                                    <input class="form-control <?php echo $edit_admin_id; ?>" type="number" placeholder="Customer Contact" name="a_contact" value="<?php echo $admin_contact; ?>" id="contact" required data-parsley-pattern="/^[9876][0-9]{9}$/">
                                    <span id="contactMsg"></span>
                                    <span style="color: red;"><?php echo $error_contact; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Customer state</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Customer State" name="a_state" value="<?php echo $admin_state; ?>" id="example-text-input" required data-parsley-pattern="[a-zA-Z]*">
                                    <span style="color: red;"><?php echo $error_state; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Customer city</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Customer City" name="a_city" value="<?php echo $admin_city; ?>" id="example-text-input" required data-parsley-pattern="[a-zA-Z]*">
                                    <span style="color: red;"><?php echo $error_city; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Customer pincode</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Customer pincode" name="a_pincode" value="<?php echo $admin_pincode; ?>" id="example-text-input" required data-parsley-pattern="[1-9][0-9]{5}">
                                    <span style="color: red;"><?php echo $error_pincode; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-url-input" class="col-md-3 col-form-label">Customer Image</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="admin_img1" class="custom-file-input" id="customFile"  accept=".jpg,.jpeg,.png">
                                            <span style="color: red;"><?php echo $error_image2; ?></span>
                                            <label class="custom-file-label" id="customFiles">Choose file</label>
                                            <br>
                                            <br/>
                                            <img  width="70" height="70" src="../customer/customer_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>">  
                                            <br>
                                            <br/>
                                            <script type="text/javascript">
                                            const realfileBtn=document.getElementById("customFile");
                                            const customTxt=document.getElementById("customFiles");
                                            realfileBtn.addEventListener("change",function(){
                                                if(realfileBtn.value)
                                                {
                                                    customTxt.innerHTML=realfileBtn.value;
                                                }
                                                else{
                                                    customTxt.innerHTML="Choose file";
                                                }
                                            });
                                            </script>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Customer Address</label>
                                <div class="col-md-9">
                                <textarea  class="form-control" placeholder="Customer Address" name="a_address" cols="19" rows="6" required ><?php echo $admin_adderss; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Customer status</label>
                                <?php
                                    if($admin_status=="no")
                                    { 
                                ?>
                                                    <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio3" name="customRadios"  value="yes" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio3">Activate</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio4" name="customRadios" value="no" class="custom-control-input" checked required>
                                                        <label class="custom-control-label" for="customRadio4">Deactivate</label>
                                                    </div>
                                                    <span style="color: red;"><?php echo $error_status; ?></span>
                                <?php 
                                    }
                                    else
                                    {
                                        ?>
                                                <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio3" name="customRadios"  value="yes" class="custom-control-input" checked required>
                                                        <label class="custom-control-label" for="customRadio3">Activate</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio4" name="customRadios" value="no" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio4">Deactivate</label>
                                                    </div>
                                                    <span style="color: red;"><?php echo $error_status; ?></span>
                                                    <?php
                                    }?>
                            </div>
                            <div class="form-group mt-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="submit" id="btnsubmit">
                                        Update
                                    </button>
                                    
                                </div>
                            </div>                                        
                       </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        <?php 
        include("includes/footer.php");
        ?>
        <?php  
            //$s_row="";
          
               
?>
    </div>
</div>
</div>
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/parsleyjs/parsley.min.js"></script>
        <script src="assets/js/pages/form-validation.init.js"></script>
        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>
    </body>

</html>
<script type="text/javascript">
$(document).ready(function() {
    var email_err = true;
    $('#email').keyup(function() {
        var emails = $("#email").val();
        var product_id=$(this).attr("class");
        var product_ids=product_id.substring(13,product_id.length);
        $.ajax({
            url: "registerss.php",
            method: "POST",
            data: {
                product_ids:product_ids,emails: emails 
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
                    $("#email").css("border", "1px solid #ced4da");
                    $("#emailMsg").html("<p class='text-danger'></p>");
                    $("#btnsubmit").attr("disabled", false);
                }
            }
        });
        
    });
    $('#contact').focusout(function() {
        var phones = $("#contact").val();
        var product_ids=$(this).attr("class");
        var product_idss=product_ids.substring(13,product_ids.length);
        $.ajax({
            url: "registerss.php",
            method: "POST",
            data: {
                product_idss: product_idss,phones: phones
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
                    $("#contact").css("border", "1px solid #ced4da");
                    $("#contactMsg").html("<p class='text-danger'></p>");
                    $("#btnsubmit").attr("disabled", false);
                }
            }
        });
    });
});

</script>
<script>
$(document).ready(function(){  
 var counter=60*60;
 myVar= setInterval(function()
 { 
     if(counter<=30)
     {

                    swal({
                        title:"Your Session is About to Expire!",
                        text: "Redirecting in "+counter+"s seconds.",
                        icon: "warning",
                        buttons: ["Logout","Stay Connected"],
                        successMode: true,
                       
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('update-customer.php','_self');
                        } 
                        else
                        {
                            window.open('logout.php','_self');
                        }

                });
     }
  if(counter==0)
  {
   $.ajax
   ({
    type:'post',
     url:'auth-logout.php',
     data:{
      logout:"logout"
     },
     success:function(response) 
     {
        window.location="auth-login.php";
     }
   });
   }
   counter--;
 }, 1000)
});
</script>
<?php
 }

else{
    
    ?>
    <!-- Sweet Alert-->

    <script>
    swal({
        title:"You cannot access this page!",
        text: "Please contact administrator",
        icon: "warning",
        buttons: [,"OK"],
        successMode: true,
       
})
.then((willDelete) => {
        if (willDelete) {
            window.open('index.php','_self');
        } 
        else {
        }
});
    </script>
    <?php
        }
    }
?>
 