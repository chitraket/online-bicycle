<?php
 session_start();
 include("includes/db.php");
 if(!isset($_SESSION['admin_email']))
 {
     echo "<script>window.open('auth-login.php','_self')</script>";
 } 
 else{
     ?>
            <!-- ========== Left Sidebar Start ========== -->
    <?php
    include("includes/header.php");
    include("includes/sidebar.php"); 
     ?>
     <?php 

if(isset($_GET['accessories_id'])){
    
    $accessories_id = $_GET['accessories_id'];
    
    $get_accessories = "select * from accessories where accessories_id='$accessories_id'";
    
    $run_accessories = mysqli_query($con,$get_accessories);
    
    $row_accessories = mysqli_fetch_array($run_accessories);
    $accessoriess_id=$row_accessories['accessories_id'];
    $accessories_name=$row_accessories['accessories_name'];
    $accessories_brand=$row_accessories['accessories_brand'];
    $accessories_category=$row_accessories['accessories_category'];
    $accessories_image_1=$row_accessories['accessories_image_1'];
    $accessories_image_2=$row_accessories['accessories_image_2'];
    $accessories_image_3=$row_accessories['accessories_image_3'];
    $accessories_image_4=$row_accessories['accessories_image_4'];
    $accessories_qty=$row_accessories['accessories_qty'];
    $accessories_material=$row_accessories['accessories_material'];
    $accessories_color=$row_accessories['accessories_color'];
    $accessories_prices=$row_accessories['accessories_prices'];
    $accessories_desc=$row_accessories['accessories_desc'];
    $p_cat_top=$row_accessories['accessories_status'];
    $accessories_discount_price=$row_accessories['accessories_discount_price'];
    $accessories_discount=$row_accessories['accessories_discount'];
    $accessories_label=$row_accessories['accessories_label'];
   
   
}

$get_accessories_manufacturerss = "select * from accessories_brand where accessories_brand_id='$accessories_brand'";
$run_accessories_manufacturerss = mysqli_query($con,$get_accessories_manufacturerss);

while ($row_accessories_manufacturerss=mysqli_fetch_array($run_accessories_manufacturerss)) {
    $manufacturer_accessories_ids=$row_accessories_manufacturerss['accessories_brand_id'];
    $manufacturer_accessories_titles = $row_accessories_manufacturerss['accessories_brand'];
}  
$get_accessories_categorys = "select * from accessories_category where accessories_category_id='$accessories_category'";
$run_accessories_categorys = mysqli_query($con,$get_accessories_categorys);
while ($row_accessories_categorys=mysqli_fetch_array($run_accessories_categorys)) {
    $accessories_category_ids = $row_accessories_categorys['accessories_category_id'];
    $accessories_categorys = $row_accessories_categorys['accessories_category'];
}
?>
  

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Update Accessories</h4>

                   
                    
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form method="POST" enctype="multipart/form-data"> 
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Accessories Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Accessories Name" name="accessories_name" value="<?php echo $accessories_name; ?>" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Accessories Manufacturer</label>
                                <div class="col-md-9">
                                <select class="form-control" name="accessories_manufacturer">
                                <option value="<?php echo $manufacturer_accessories_ids; ?>"> <?php echo $manufacturer_accessories_titles; ?> </option>
                              
                              <?php 
                              
                              $get_accessories_manufacturers = "select * from accessories_brand";
                              $run_accessories_manufacturers = mysqli_query($con,$get_accessories_manufacturers);
                              
                              while ($row_accessories_manufacturers=mysqli_fetch_array($run_accessories_manufacturers)){
                                  
                                $manufacturer_accessories_id=$row_accessories_manufacturers['accessories_brand_id'];
                                  $manufacturer_accessories_title = $row_accessories_manufacturers['accessories_brand'];
                                  
                                  echo "
                                  
                                  <option value='$manufacturer_accessories_id'> $manufacturer_accessories_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Accessories Category</label>
                                <div class="col-md-9">
                                <select class="form-control" name="accessories_cat">
                                <option value="<?php echo $accessories_category_ids; ?>"> <?php echo $accessories_categorys ?> </option>
                              
                              <?php 
                              $get_accessories_category = "select * from accessories_category";
                              $run_accessories_category = mysqli_query($con,$get_accessories_category);
                              while ($row_accessories_category=mysqli_fetch_array($run_accessories_category)){
                                  
                                    $accessories_category_id = $row_accessories_category['accessories_category_id'];
                                  $accessories_category = $row_accessories_category['accessories_category'];
                                  
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
                                            <input type="file" name="accessories_img1" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" id="customFiles">Choose file</label>
                                           <br>
                                            <br/>
                                            <img   width="70" height="70" src="accessories_images/<?php echo$accessories_image_1 ?>" alt="<?php echo $accessories_image_1; ?>">  
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
                                <label for="example-tel-input" class="col-md-3 col-form-label">Accessories Image 2</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="accessories_img2" class="custom-file-input" id="customFilew">
                                            <label class="custom-file-label" id="customFilesw">Choose file</label>
                                            <br>
                                            <br/>
                                            <img   width="70" height="70" src="accessories_images/<?php echo$accessories_image_2; ?>" alt="<?php echo $accessories_image_2; ?>">  
                                              <br>
                                              <br/>
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
                                            <input type="file" name="accessories_img3" class="custom-file-input" id="customFilewa">
                                            <label class="custom-file-label" id="customFileswa">Choose file</label>
                                            <br>
                                            <br/>
                                            <img   width="70" height="70" src="accessories_images/<?php echo $accessories_image_3; ?>" alt="<?php echo $accessories_image_3; ?>">  
                                              <br>
                                              <br/>
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
                                            <input type="file" name="accessories_img4" class="custom-file-input" id="customFilewas">
                                            <label class="custom-file-label" id="customFileswas">Choose file</label>
                                            <br>
                                            <br/>
                                            <img   width="70" height="70" src="accessories_images/<?php echo $accessories_image_4; ?>" alt="<?php echo $accessories_image_4; ?>">  
                                              <br>
                                              <br/>
                                            <script type="text/javascript">
                                            const realfileBtnwas=document.getElementById("customFilewas");
                                            const customTxtwa=document.getElementById("customFileswas");
                                            realfileBtnwas.addEventListener("change",function(){
                                                if(realfileBtnwas.value)
                                                {
                                                    customTxtwas.innerHTML=realfileBtnwas.value;
                                                }
                                                else{
                                                    customTxtwas.innerHTML="Choose file";
                                                }
                                            });
                                            </script>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-md-3 col-form-label">Accessories label</label>
                                <div class="col-md-9">
                                <select class="form-control" name="accessories_label">
                                        <option><?php echo $accessories_label; ?></option>
                                        <option value="new">new</option>
                                        <option value="sale">sale</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Accessories Price</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Accessories Price" id="example-password-input" value="<?php echo $accessories_prices; ?>" name="accessories_price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Accessories Discount</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Accessories Discount" id="example-password-input" value="<?php echo $accessories_discount; ?>" name="accessories_discount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Accessories Discount Price</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Accessories Discount Price" id="example-password-input" value="<?php echo $accessories_discount_price; ?>" name="accessories_discount_price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Available Quantity<span class="badge badge-pill badge-soft-success font-size-12" ><?php echo $accessories_qty; ?></span></label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Accessories Quantity" value="0" name="accessories_qty" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Accessories Material</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Accessories Material" name="accessories_material" value="<?php echo $accessories_material; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Accessories Color</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Accessories Color" name="accessories_color" value="<?php echo $accessories_color;?>">
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Accessories Desc</label>
                                <div class="col-md-9">
                                <textarea required class="form-control" placeholder="Accessories Desc" name="accessories_desc" cols="19" rows="6" ><?php echo $accessories_desc; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Manufacturer Top</label>
                                <?php
                                    if($p_cat_top=="no")
                                    { 
                                ?>
                                                    <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio1" name="customRadio"  value="yes" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio1">yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio2" name="customRadio" value="no" class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="customRadio2">no</label>
                                                    </div>
                            
                                <?php 
                                    }
                                    else
                                    {
                                        ?>
                                                <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio1" name="customRadio"  value="yes" class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="customRadio1">yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio2" name="customRadio" value="no" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio2">no</label>
                                                    </div>
                                                    
                                                    <?php
                                    }?>
                            </div> 
                            <div class="form-group mt-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="update">
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
    </div>
</div>
</div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>
      
    </body>


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:43:03 GMT -->
</html>

<?php 

if(isset($_POST['update'])){
    
    $accessoriess_name = $_POST['accessories_name'];
    $accessoriess_manufacturer = $_POST['accessories_manufacturer'];
    $accessoriess_cat = $_POST['accessories_cat'];
    $accessoriess_price = $_POST['accessories_price'];
    $accessoriess_qty=$_POST['accessories_qty'];
    $accessoriess_material=$_POST['accessories_material'];
    $accessoriess_color=$_POST['accessories_color'];
    $accessoriess_desc=$_POST['accessories_desc'];
    $accessoriess_label=$_POST['accessories_label'];
    $accessoriess_discount_price=$_POST['accessories_discount_price'];
    $accessoriess_discount=$_POST['accessories_discount'];
    $accessories_status=$_POST['customRadio'];
    $accessoriess_img1 = $_FILES['accessories_img1']['name'];
    $accessoriess_img2 = $_FILES['accessories_img2']['name'];
    $accessoriess_img3 = $_FILES['accessories_img3']['name'];
    $accessoriess_img4 = $_FILES['accessories_img4']['name'];
    if (!($accessoriess_img1=="" || $accessoriess_img2=="" || $accessoriess_img3=="" || $accessoriess_img4=="")){

        $temp_name1 = $_FILES['accessories_img1']['tmp_name'];
        $temp_name2 = $_FILES['accessories_img2']['tmp_name'];
        $temp_name3 = $_FILES['accessories_img3']['tmp_name'];
        $temp_name4 = $_FILES['accessories_img4']['tmp_name'];
        move_uploaded_file($temp_name1, "accessories_images/$accessoriess_img1");
        move_uploaded_file($temp_name2, "accessories_images/$accessoriess_img2");
        move_uploaded_file($temp_name3, "accessories_images/$accessoriess_img3");
        move_uploaded_file($temp_name4, "accessories_images/$accessoriess_img4");
        $update_accessories= "update accessories set accessories_brand='$accessoriess_manufacturer',accessories_category='$accessoriess_cat',accessories_name='$accessoriess_name',accessories_image_1='$accessoriess_img1',accessories_image_2='$accessoriess_img2',accessories_image_3='$accessoriess_img3',accessories_image_4='$accessoriess_img4',accessories_qty=accessories_qty+'$accessoriess_qty',available_qty=available_qty+'$accessoriess_qty',accessories_material='$accessories_material',accessories_color='$accessoriess_color',accessories_prices='$accessoriess_price',accessories_discount_price='$accessoriess_discount_price',accessories_discount='$accessoriess_discount',accessories_label='$accessoriess_label',accessories_date=NOW(),accessories_desc='$accessoriess_desc',accessories_status='$accessories_status' where accessories_id='$accessoriess_id'";
    
        $run_accessoriess = mysqli_query($con, $update_accessories);
    
        if ($run_accessoriess) {
            ?>
              <script>
                    swal({
                        title: "Your accessories has been updated Successfully.",
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
    else{
        $update_accessories= "update accessories set accessories_brand='$accessoriess_manufacturer',accessories_category='$accessoriess_cat',accessories_name='$accessoriess_name',accessories_qty=accessories_qty+'$accessoriess_qty',available_qty=available_qty+'$accessoriess_qty',accessories_material='$accessories_material',accessories_color='$accessoriess_color',accessories_prices='$accessoriess_price',accessories_discount_price='$accessoriess_discount_price',accessories_discount='$accessoriess_discount',accessories_label='$accessoriess_label',accessories_date=NOW(),accessories_desc='$accessoriess_desc' where accessories_id='$accessoriess_id'";
    
        $run_accessoriess = mysqli_query($con, $update_accessories);
    
        if ($run_accessoriess) {
            ?>
            <script>
                    swal({
                        title: "Your accessories has been updated Successfully.",
                        text: "",
                        icon: "success",
                        buttons:[,"OK"],
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
}
?>
    <?php
 }
    ?>