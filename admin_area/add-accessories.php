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
        $paga=9;
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
        $error_product="";
        $error_manufacturer="";
        $error_category="";
        $error_image="";
        $error_image2="";
        $error_image3="";
        $error_image4="";
        $error_label="";
        $error_qty="";
        $error_price="";
        $error_discount="";
        $error_discount_price="";
        $error_size="";
        $error_color="";
        $error_top="";
        $errorresult=true;
            if(isset($_POST['submit'])){
                
                if(empty($_POST['accessories_title']))
                {
                    $error_product="Required..";
                    $errorresult=false;
                }
                else{
                    $error_product="";
                }
                if(empty($_POST['accessories_brand']))
                {
                    $error_manufacturer="Required..";
                    $errorresult=false;
                }
                else{
                    $error_manufacturer="";
                }
                if(empty($_POST['accessories_category']))
                {
                    $error_category="Required..";
                    $errorresult=false;
                }
                else{
                    $error_category="";
                }
                if(empty($_POST['accessories_label']))
                {
                    $error_label="Required..";
                    $errorresult=false;
                }
                else{
                    $error_label="";
                }
                $test_img1 = $_FILES['accessories_img1']['name'];
                if(image($test_img1))
                {   
                    $error_image="Required & JPEG or PNG file.";
                    $errorresult=false;
                }
                else{
                    $error_image="";
                }
                $test_img2=$_FILES['accessories_img2']['name'];
                
                    if(images($test_img2))
                    {   
                        $error_image2="JPEG or PNG file.";
                        $errorresult=false;
                    }
                    else{
                        $error_image2="";
                    }   
                $test_img3=$_FILES['accessories_img3']['name'];
                if(images($test_img3))
                    {   
                        $error_image3="JPEG or PNG file.";
                        $errorresult=false;
                    }
                    else{
                          $error_image3="";
                    }
                $test_img4=$_FILES['accessories_img4']['name'];
                    if(images($test_img4))
                        {   
                            $error_image4="JPEG or PNG file.";
                            $errorresult=false;
                        }
                        else{
                              $error_image4="";
                        }
                        if(empty($_POST['accessories_price']) || price($_POST['accessories_price']))
                        {
                            $error_price="Required & Enter number only";
                            $errorresult=false;
                        }
                        else{
                            $error_price="";
                        }
                        if(price($_POST['accessories_qty']) || empty($_POST['accessories_qty']))
                        {
                            $error_qty="Required & Enter number only";
                            $errorresult=false;
                        }
                        else{
                            $error_qty="";
                        }
                        if(price($_POST['accessories_discount']))
                        {
                            $error_discount="Enter number only";
                            $errorresult=false;
                        }
                        else{
                            $error_discount="";
                        }
                        if(price($_POST['accessories_discount_price']))
                        {
                            $error_discount_price="Enter number only";
                            $errorresult=false;
                        }
                        else{
                            $error_discount_price="";
                        }
                        if(color($_POST['accessories_color']))
                        {
                            $error_color="Enter letter only";
                            $errorresult=false;
                        }
                        else{
                            $error_color="";
                        }
                        if(empty($_POST['customRadio']))
                        {
                            $error_top="Required..";
                            $errorresult=false;
                        }
                        else{
                            $error_top="";   
                        }
                if($errorresult==false)
                {
                    goto end;
                }

                $accessories_name=$_POST['accessories_title'];
                $accessories_brand=$_POST['accessories_brand'];
                $accessories_category=$_POST['accessories_category'];
               
                $accessories_price=$_POST['accessories_price'];
                $accessories_qty=$_POST['accessories_qty'];
                $accessories_material=$_POST['accessories_material'];
                $accessories_color=$_POST['accessories_color'];
                $accessories_desc=$_POST['accessories_desc'];
                $accessories_status_top=$_POST['customRadio'];
                $accessories_img1=$_FILES['accessories_img1']['name'];
                $accessories_img2=$_FILES['accessories_img2']['name'];
                $accessories_img3=$_FILES['accessories_img3']['name'];
                $accessories_img4=$_FILES['accessories_img4']['name'];
              
                $accessories_label=$_POST['accessories_label'];
                $accessories_discount=$_POST['accessories_discount'];
                $accessories_discount_price=$_POST['accessories_discount_price'];
                
                $temp_name1 = $_FILES['accessories_img1']['tmp_name'];
                $temp_name2 = $_FILES['accessories_img2']['tmp_name'];
                $temp_name3 = $_FILES['accessories_img3']['tmp_name'];
                $temp_name4 = $_FILES['accessories_img4']['tmp_name'];
                
                move_uploaded_file($temp_name1,"accessories_images/$accessories_img1");
                move_uploaded_file($temp_name2,"accessories_images/$accessories_img2");
                move_uploaded_file($temp_name3,"accessories_images/$accessories_img3");
                move_uploaded_file($temp_name4,"accessories_images/$accessories_img4");
            
                $insert_accessories = "insert into accessories(accessories_brand,accessories_category,accessories_name,accessories_image_1,accessories_image_2,accessories_image_3,accessories_image_4,accessories_qty,available_qty,accessories_material,accessories_color,accessories_prices,accessories_discount_price,accessories_discount,accessories_label,accessories_date,accessories_desc,accessories_status_top,accessories_status) values ('$accessories_brand','$accessories_category','$accessories_name','$accessories_img1','$accessories_img2','$accessories_img3','$accessories_img4','$accessories_qty','$accessories_qty','$accessories_material','$accessories_color','$accessories_price','$accessories_discount_price','$accessories_discount','$accessories_label',NOW(),'$accessories_desc','$accessories_status_top','yes')";
                $run_accessories = mysqli_query($con,$insert_accessories);
                if($run_accessories){
                    ?>
                    <script>
                        swal({
                            title:"Your New Accessories Has Been Inserted.",
                            text: "",
                            icon: "success",
                            buttons: [,"OK"],
                            successMode: true,
                           
                    })
                    .then((willDelete) => {
                            if (willDelete) {
                                window.open('view-accessories.php','_self');
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
                    <h4 class="mb-0 font-size-18">Add Accessories</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form class="custom-validation" method="POST" enctype="multipart/form-data"> 
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Accessories Title</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Accessories Title" name="accessories_title"  id="example-text-input" required>
                                    <span style="color: red;"><?php echo $error_product; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Manufacturer</label>
                                <div class="col-md-9">
                                <select class="form-control select2" name="accessories_brand" required>
                                <span style="color: red;"><?php echo $error_manufacturer; ?></span>
                                        <option disabled selected value>Select</option>
                                        <?php 
                              
                                                $get_p_cats = "select * from accessories_brand where accessories_brand_status='yes'";
                                                $run_p_cats = mysqli_query($con,$get_p_cats);
                                                
                                                while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                    
                                                    $accessories_brand_id = $row_p_cats['accessories_brand_id'];
                                                    $accessories_brand = $row_p_cats['accessories_brand'];

                                                    echo "
                                                    
                                                    <option value='$accessories_brand_id'> $accessories_brand </option>
                                                    
                                                    ";
                                                    
                                                }
                                    
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Accessories Category</label>
                                <div class="col-md-9">
                                <select class="form-control select2" name="accessories_category" required>
                                <span style="color: red;"><?php echo $error_category; ?></span>        
                                <option disabled selected value>Select</option>
                                        <?php 
                              
                                                $get_p_cats = "select * from accessories_category where accessories_category_status='yes'";
                                                $run_p_cats = mysqli_query($con,$get_p_cats);
                                                
                                                while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                    
                                                    $accessories_category_id = $row_p_cats['accessories_category_id'];
                                                    $accessories_category = $row_p_cats['accessories_category'];
                                                    
                                                    
                                                    echo "
                                                    
                                                    <option value='$accessories_category_id'> $accessories_category </option>
                                                    
                                                    ";
                                                    
                                                }
                                    
                                        ?>
                                    </select>
                                </div>
                            </div>
                
                            <div class="form-group row">
                                <label for="example-url-input" class="col-md-3 col-form-label">Accessories Image 1</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="accessories_img1" class="custom-file-input" id="customFile" accept=".jpg,.jpeg,.png" required>
                                            <span style="color: red;"><?php echo $error_image; ?></span>
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
                                <label for="example-tel-input" class="col-md-3 col-form-label">Accessories Image 2</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="accessories_img2" class="custom-file-input" id="customFilew" accept=".jpg,.jpeg,.png">
                                            <span style="color: red;"><?php echo $error_image2; ?></span>
                                            <label class="custom-file-label" id="customFilesw">Choose file</label>
                                            <script type="text/javascript">
                                            const realfileBtnw=document.getElementById("customFilew");
                                            const customTxtw=document.getElementById("customFilesw");
                                            realfileBtnw.addEventListener("change",function(){
                                                if(realfileBtnw.value)
                                                {
                                                    customTxtw.innerHTML=realfileBtnw.value;
                                                }
                                                else{
                                                    customTxtw.innerHTML="Choose file";
                                                }
                                            });
                                            </script>
                                            
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-md-3 col-form-label">Accessories Image 3</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="accessories_img3" class="custom-file-input" id="customFilewa" accept=".jpg,.jpeg,.png">
                                            <span style="color: red;"><?php echo $error_image3; ?></span>
                                            <label class="custom-file-label" id="customFileswa">Choose file</label>
                                            <script type="text/javascript">
                                            const realfileBtnwa=document.getElementById("customFilewa");
                                            const customTxtwa=document.getElementById("customFileswa");
                                            realfileBtnwa.addEventListener("change",function(){
                                                if(realfileBtnwa.value)
                                                {
                                                    customTxtwa.innerHTML=realfileBtnwa.value;
                                                }
                                                else{
                                                    customTxtwa.innerHTML="Choose file";
                                                }
                                            });
                                            </script>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-md-3 col-form-label">Accessories Image 4</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="accessories_img4" class="custom-file-input" id="customFilewc" accept=".jpg,.jpeg,.png">
                                            <span style="color: red;"><?php echo $error_image4; ?></span>
                                            <label class="custom-file-label" id="customFileswc">Choose file</label>
                                            <script type="text/javascript">
                                            const realfileBtnwc=document.getElementById("customFilewc");
                                            const customTxtwc=document.getElementById("customFileswc");
                                            realfileBtnwc.addEventListener("change",function(){
                                                if(realfileBtnwc.value)
                                                {
                                                    customTxtwc.innerHTML=realfileBtnwc.value;
                                                }
                                                else{
                                                    customTxtwc.innerHTML="Choose file";
                                                }
                                            });
                                            </script>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-md-3 col-form-label">Accessories label</label>
                                <div class="col-md-9">
                                <select class="form-control" name="accessories_label" required>
                                <span style="color: red;"><?php echo $error_label; ?></span>
                                        <option disabled selected value>Select</option>
                                        <option value="new">new</option>
                                        <option value="old">old</option>
                                        <option value="sale">sale</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Accessories Price</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" placeholder="Accessories Price" id="example-password-input" name="accessories_price" data-parsley-pattern="[0-9]*" required>
                                    <span style="color: red;"><?php echo $error_price; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Accessories Discount</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" placeholder="Accessories Discount" id="example-password-input" name="accessories_discount" data-parsley-pattern="[0-9]*" >
                                    <span style="color: red;"><?php echo $error_discount; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Accessories Discount Price</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" placeholder="Accessories Discount Price" id="example-password-input" name="accessories_discount_price" data-parsley-pattern="[0-9]*">
                                    <span style="color: red;"><?php echo $error_discount_price; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Accessories qty</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" id="example-number-input" placeholder="Accessories Qty" name="accessories_qty" data-parsley-pattern="[0-9]*" required>
                                    <span style="color: red;"><?php echo $error_qty; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Accessories Material</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Accessories Material" name="accessories_material" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Accessories Color</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Accessories Color" name="accessories_color" data-parsley-pattern="[a-zA-Z]*" required>
                                    <span style="color: red;"><?php echo $error_color; ?></span>
                                </div>
                            </div>
                         
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Accessories Desc</label>
                                <div class="col-md-9">
                                <textarea  class="form-control" class="summernote" placeholder="Accessories Desc" name="accessories_desc" cols="19" rows="6"> </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Accessories Top</label>
                                                    
                                                    <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio1" name="customRadio"  value="yes" class="custom-control-input" checked />
                                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio2" name="customRadio" value="no" class="custom-control-input" />
                                                        <label class="custom-control-label" for="customRadio2">No</label>
                                                    </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="submit">
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

        <!-- select 2 plugin -->
        <script src="assets/libs/select2/js/select2.min.js"></script>
        <script src="assets/js/pages/ecommerce-select2.init.js"></script>
        <script src="assets/libs/parsleyjs/parsley.min.js"></script>
        <script src="assets/js/pages/form-validation.init.js"></script>
        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>
        <script src="assets/js/app.js"></script>
    </body>


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:43:03 GMT -->
</html>

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
                            window.open('add-accessories.php','_self');
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
