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
    $paga=44;
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
            $error_name="";
            $error_email="";
            $error_pass="";
            $error_contact="";
            $error_check="";
            $error_image2="";
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
                    if(emaila($_POST['a_email']))
                    {
                        $error_email="Required.. || Please enter valid email || Email is already registered.";
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
                    if(contacta($_POST['a_contact']))
                    {
                        $error_contact="Required.. || Please enter valid contact || Contact is already registered.";
                        $errorresult=false;
                    }
                    else{
                        $error_contact="";
                    }
                    if(empty($_POST['subject']))
                    {
                        $error_check="Required..";
                        $errorresult=false;
                    }
                    else{
                        $error_check="";
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
                $a_name=$_POST['a_name'];
                $a_email=$_POST['a_email'];
                $a_pass=$_POST['a_pass'];
                $a_contact=$_POST['a_contact'];
                $a=$_POST['subject'];
                $per=implode(",",$a);
                $admin_img1 = $_FILES['admin_img1']['name'];
                $temp_name1 = $_FILES['admin_img1']['tmp_name'];
                move_uploaded_file($temp_name1,"admin_images/$admin_img1");
                $insert_cat = "insert into admins(admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_roles,admin_permission,admin_status)  values('$a_name','$a_email','$a_pass','$admin_img1','$a_contact','sub','$per','yes')";
                $run_cat = mysqli_query($con,$insert_cat);
                if($run_cat)
                {
                        ?>
                        <script>
                        swal({
                            title:"Your New Admin Has Been Inserted.",
                            text: "",
                            icon: "success",
                            buttons: [,"OK"],
                            successMode: true,
                           
                    })
                    .then((willDelete) => {
                            if (willDelete) {
                                window.open('view-sub-user.php','_self');
                            } 
                            else {
                            }
                    });
                </script>
                        <?php
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
                    <h4 class="mb-0 font-size-18">Add Sub Admin</h4>
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
                                <label for="example-text-input" class="col-md-3 col-form-label">Admin Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Admin Name" name="a_name"  id="example-text-input" required data-parsley-pattern="[a-zA-Z]*">                                   
                                    <span style="color: red;"><?php echo $error_name; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Admin Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="email" placeholder="Admin Email" name="a_email"  id="email" required>
                                    <span id="emailMsg"></span>
                                    <span style="color: red;"><?php echo $error_email; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Admin Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="password" placeholder="Admin Password" name="a_pass"  id="example-text-input" required data-parsley-pattern="(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}">
                                    <span style="color: red;"><?php echo $error_pass; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Admin Contact</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" placeholder="Admin Contact" name="a_contact"  id="contact" required data-parsley-pattern="/^[9876][0-9]{9}$/">
                                    <span id="contactMsg"></span>
                                    <span style="color: red;"><?php echo $error_contact; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-url-input" class="col-md-3 col-form-label">Admin Image</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="admin_img1" class="custom-file-input" id="customFile"  accept=".jpg,.jpeg,.png">
                                            <span style="color: red;"><?php echo $error_image2; ?></span>
                                            <label class="custom-file-label" id="customFiles">Choose file</label>
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
                            <label for="example-url-input" class="col-md-3 col-form-label">Admin Permission</label>
                                <div class="col-md-9">
                                        <div class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="subject[]" value="1" checked required>
                                        <label class="custom-control-label" for="customCheck1">Add Product</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="subject[]" value="2" >
                                            <label class="custom-control-label" for="customCheck2">View Product</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="subject[]" value="3" >
                                            <label class="custom-control-label" for="customCheck3">Add Manufacturer</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="subject[]" value="4" >
                                            <label class="custom-control-label" for="customCheck4">View Manufacturer</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="subject[]" value="5" >
                                            <label class="custom-control-label" for="customCheck5">Add Product Category</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="subject[]" value="6" >
                                            <label class="custom-control-label" for="customCheck6">View Product Category</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7" name="subject[]" value="7" >
                                            <label class="custom-control-label" for="customCheck7">Add Filter</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck8" name="subject[]" value="8" >
                                            <label class="custom-control-label" for="customCheck8">View Filter</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck9" name="subject[]" value="9" >
                                            <label class="custom-control-label" for="customCheck9">Add Accessories</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck10" name="subject[]" value="10" >
                                            <label class="custom-control-label" for="customCheck10">View Accessories</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck11" name="subject[]" value="11" >
                                            <label class="custom-control-label" for="customCheck11">Add Accessories Manufacturer</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck12" name="subject[]" value="12" >
                                            <label class="custom-control-label" for="customCheck12">View Accessories Manufacturer</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck13" name="subject[]" value="13" >
                                            <label class="custom-control-label" for="customCheck13">Add Accessories Category</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck14" name="subject[]" value="14" >
                                            <label class="custom-control-label" for="customCheck14">View Accessories Category</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck15" name="subject[]" value="15" >
                                            <label class="custom-control-label" for="customCheck15">Add Slider</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck16" name="subject[]" value="16" >
                                            <label class="custom-control-label" for="customCheck16">View Slider</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck17" name="subject[]" value="17" >
                                            <label class="custom-control-label" for="customCheck17">Add Box</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck18" name="subject[]" value="18" >
                                            <label class="custom-control-label" for="customCheck18">View Box</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck19" name="subject[]" value="19" >
                                            <label class="custom-control-label" for="customCheck19">Add Terms & Conditions</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck20" name="subject[]" value="20" >
                                            <label class="custom-control-label" for="customCheck20">View Terms & Conditions</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck21" name="subject[]" value="21" >
                                            <label class="custom-control-label" for="customCheck21">Add Logo</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck22" name="subject[]" value="22" >
                                            <label class="custom-control-label" for="customCheck22">View Logo</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck23" name="subject[]" value="23" >
                                            <label class="custom-control-label" for="customCheck23">Customer</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck24" name="subject[]" value="24" >
                                            <label class="custom-control-label" for="customCheck24">Review</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck25" name="subject[]" value="25" >
                                            <label class="custom-control-label" for="customCheck25">Order</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck26" name="subject[]" value="26" >
                                            <label class="custom-control-label" for="customCheck26">Payment</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck27" name="subject[]" value="27" >
                                            <label class="custom-control-label" for="customCheck27">Add Privet Policy</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck28" name="subject[]" value="28" >
                                            <label class="custom-control-label" for="customCheck28">View Privet Policy</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck29" name="subject[]" value="29" >
                                            <label class="custom-control-label" for="customCheck29">Add Order Policy</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck30" name="subject[]" value="30" >
                                            <label class="custom-control-label" for="customCheck30">View Order Policy</label>
                                        </div>
                                        <span style="color: red;"><?php echo $error_check; ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group mt-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="btnsubmit" name="submit">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
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
                    $("#email").css("border", "1px solid #ced4da");
                    $("#emailMsg").html("<p class='text-danger'></p>");
                    $("#btnsubmit").attr("disabled", false);
                }
            }
        });
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
                            window.open('add-sub-user.php','_self');
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
 