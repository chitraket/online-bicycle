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
            if(isset($_GET['admin_id']))
            {
                $edit_admin_id=$_GET['admin_id'];
                $edit_select_admin="select * from admins where admin_id='$edit_admin_id'";
               $run_edit_admin=mysqli_query($con,$edit_select_admin);
               while($row_select_admin=mysqli_fetch_array($run_edit_admin))
                {
                    $admin_email=$row_select_admin['admin_email'];
                    $admin_name=$row_select_admin['admin_name'];
                    $admin_password=$row_select_admin['admin_pass'];
                    $admin_contact=$row_select_admin['admin_contact'];
                    $admin_image=$row_select_admin['admin_image'];
                    $admin_permissions=$row_select_admin['admin_permission'];
                    $admin_status=$row_select_admin['admin_status'];
                    $subjects=explode(",",$admin_permissions);
                    
                }
            }
            $error_name="";
            $error_email="";
            $error_pass="";
            $error_contact="";
            $error_check="";
            $error_image2="";
            $error_status="";
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
                    if(emailua($_POST['a_email'],$edit_admin_id))
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
                    if(contactua($_POST['a_contact'],$edit_admin_id))
                    {
                        $error_contact="Required..";
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
                $a_id=$_GET['admin_id'];
              $a_name=$_POST['a_name'];
              $a_email=$_POST['a_email'];
              $a_pass=$_POST['a_pass'];
              $a_contact=$_POST['a_contact'];
              $a_status=$_POST['customRadios'];
              $a=$_POST['subject'];
              $per=implode(",",$a);
              //$admin_img1=$_POST['admin_img1'];
              $admin_img1 = $_FILES['admin_img1']['name'];
              if(!($admin_img1==''))
              {
              $temp_name1 = $_FILES['admin_img1']['tmp_name'];
             
              move_uploaded_file($temp_name1,"admin_images/$admin_img1");
              $update_cat = "update admins set admin_name='$a_name',admin_email='$a_email',admin_pass='$a_pass',admin_image='$admin_img1',admin_contact='$a_contact',admin_roles='sub',admin_permission='$per',admin_status='$a_status' where admin_id='$a_id'";
              $run_cat = mysqli_query($con,$update_cat);
              if($run_cat){
                      ?>
                      <script>
                      swal({
                          title:"Your Sub user Has Been Updated",
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
              else{
                  $update_cat = "update admins set admin_name='$a_name',admin_email='$a_email',admin_pass='$a_pass',admin_contact='$a_contact',admin_roles='sub',admin_permission='$per',admin_status='$a_status' where admin_id='$a_id'";
              $run_cat = mysqli_query($con,$update_cat);
              if($run_cat){
                      ?>
                      <script>
                      swal({
                          title:"Your Sub user Has Been Updated",
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
                    <h4 class="mb-0 font-size-18">Update Sub Admin</h4>
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
                                    <input class="form-control" type="text" placeholder="Admin Name" name="a_name"  value="<?php echo $admin_name; ?>" id="example-text-input" required data-parsley-pattern="[a-zA-Z]*">
                                    <span style="color: red;"><?php echo $error_name; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Admin Email</label>
                                <div class="col-md-9">
                                    <input class="form-control <?php echo $edit_admin_id; ?>" type="email" placeholder="Admin Email" name="a_email" value="<?php echo $admin_email; ?>" id="email" required>
                                    <span id="emailMsg"></span>
                                    <span style="color: red;"><?php echo $error_email; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Admin Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="password" placeholder="Admin Password" name="a_pass" value="<?php echo $admin_password; ?>" id="example-text-input" required data-parsley-pattern="(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}">
                                    <span style="color: red;"><?php echo $error_pass; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Admin Contact</label>
                                <div class="col-md-9">
                                    <input class="form-control <?php echo $edit_admin_id; ?>" type="number" placeholder="Admin Contact" name="a_contact" value="<?php echo $admin_contact; ?>" id="contact" required data-parsley-pattern="/^[9876][0-9]{9}$/">
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
                                            <br>
                                            <br/>
                                            <img  width="70" height="70" src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>">  
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
                            <label for="example-url-input" class="col-md-3 col-form-label">Admin Permission</label>
                                <div class="col-md-9">
                                        
                                        <div class="custom-control custom-checkbox mb-2">
                                        
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="subject[]" value="1" 
                                        <?php 
                                        if(in_array(1,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>
                                        required>
                                        <label class="custom-control-label" for="customCheck1">Add Product</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="subject[]" value="2" 
                                            <?php 
                                        if(in_array(2,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck2">View Product</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="subject[]" value="3" 
                                            <?php 
                                        if(in_array(3,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck3">Add Manufacturer</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="subject[]" value="4" 
                                            <?php 
                                        if(in_array(4,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck4">View Manufacturer</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="subject[]" value="5" 
                                            <?php 
                                        if(in_array(5,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck5">Add Product Category</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="subject[]" value="6" 
                                            <?php 
                                        if(in_array(6,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck6">View Product Category</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7" name="subject[]" value="7" 
                                            <?php 
                                        if(in_array(7,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck7">Add Filter</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck8" name="subject[]" value="8" 
                                            <?php 
                                        if(in_array(8,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck8">View Filter</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck9" name="subject[]" value="9" 
                                            <?php 
                                        if(in_array(9,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck9">Add Accessories</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck10" name="subject[]" value="10" 
                                            <?php 
                                        if(in_array(10,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck10">View Accessories</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck11" name="subject[]" value="11" 
                                            <?php 
                                        if(in_array(11,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck11">Add Accessories Manufacturer</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck12" name="subject[]" value="12" 
                                            <?php 
                                        if(in_array(12,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck12">View Accessories Manufacturer</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck13" name="subject[]" value="13" 
                                            <?php 
                                        if(in_array(13,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck13">Add Accessories Category</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck14" name="subject[]" value="14" 
                                            <?php 
                                        if(in_array(14,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck14">View Accessories Category</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck15" name="subject[]" value="15" 
                                            <?php 
                                        if(in_array(15,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck15">Add Slider</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck16" name="subject[]" value="16" 
                                            <?php 
                                        if(in_array(16,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck16">View Slider</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck17" name="subject[]" value="17" 
                                            <?php 
                                        if(in_array(17,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck17">Add Box</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck18" name="subject[]" value="18" 
                                            <?php 
                                        if(in_array(18,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck18">View Box</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck19" name="subject[]" value="19" 
                                            <?php 
                                        if(in_array(19,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck19">Add Terms & Conditions</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck20" name="subject[]" value="20" 
                                            <?php 
                                        if(in_array(20,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck20">View Terms & Conditions</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck21" name="subject[]" value="21" 
                                            <?php 
                                        if(in_array(21,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck21">Add Logo</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck22" name="subject[]" value="22" 
                                            <?php 
                                        if(in_array(22,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck22">View Logo</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck23" name="subject[]" value="23"
                                            <?php 
                                        if(in_array(23,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?> >
                                            <label class="custom-control-label" for="customCheck23">Customer</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck24" name="subject[]" value="24" 
                                            <?php 
                                        if(in_array(24,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck24">Review</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck25" name="subject[]" value="25" 
                                            <?php 
                                        if(in_array(25,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck25">Order</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck26" name="subject[]" value="26" 
                                            <?php 
                                        if(in_array(26,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck26">Payment</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck27" name="subject[]" value="27" 
                                            <?php 
                                        if(in_array(27,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck27">Add Privet Policy</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck28" name="subject[]" value="28" 
                                            <?php 
                                        if(in_array(28,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck28">View Privet Policy</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck29" name="subject[]" value="29" 
                                            <?php 
                                        if(in_array(29,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck29">Add Order Policy</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck30" name="subject[]" value="30" 
                                            <?php 
                                        if(in_array(30,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck30">View Order Policy</label>
                                        </div>
                                        <span style="color: red;"><?php echo $error_check; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Bikes status</label>
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


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:43:03 GMT -->
</html>
<script type="text/javascript">
$(document).ready(function() {
    var email_err = true;
    $('#email').keyup(function() {
        var emails = $("#email").val();
        var product_id=$(this).attr("class");
        var product_ids=product_id.substring(13,product_id.length);
        $.ajax({
            url: "registers.php",
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
            url: "registers.php",
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
                            window.open('update-sub-user.php','_self');
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
 