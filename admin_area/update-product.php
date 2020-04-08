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

if(isset($_GET['product_id'])){
    
    $edit_id = $_GET['product_id'];
    
    $get_p = "select * from products where product_id='$edit_id'";
    
    $run_edit = mysqli_query($con,$get_p);
    
    $row_edit = mysqli_fetch_array($run_edit);

    $p_id = $row_edit['product_id'];

    $manufacturer_id=$row_edit['manufacturer_id'];
    
    $p_title = $row_edit['product_title'];
    
    $p_cat = $row_edit['p_cat_id'];
    
    $cat = $row_edit['cat_id'];
    
    $p_image1 = $row_edit['product_img1'];
    
    $p_image2 = $row_edit['product_img2'];
    
    $p_image3 = $row_edit['product_img3'];

    $p_image4 =$row_edit['product_img4'];
    
    $p_price = $row_edit['product_price'];

    $p_discount_price=$row_edit['product_discount_price'];

    $p_discount=$row_edit['product_discount'];

    $p_label=$row_edit['product_label'];
    
    $p_size=$row_edit['product_size'];

    $p_frame=$row_edit['product_frame'];

    $p_qty=$row_edit['product_qty'];

    $p_weight=$row_edit['product_weight'];

    $p_front_suspension=$row_edit['product_front_suspension'];

    $p_rear_suspension=$row_edit['product_rear_suspension'];

    $p_front_derailleur=$row_edit['product_front_derailleur'];

    $p_rear_derailleur=$row_edit['product_rear_derailleur'];

    $p_wheels=$row_edit['product_wheels'];

    $p_tires=$row_edit['product_tires'];

    $p_shifter=$row_edit['product_shifter'];

    $p_crankset=$row_edit['product_crankset'];

    $p_freewheels=$row_edit['product_freewheels'];

    $p_bb_set=$row_edit['product_bb_set'];

    $p_cassette=$row_edit['product_cassette'];

    $p_colour=$row_edit['product_colour'];

    $p_pedals=$row_edit['product_pedals'];

    $p_seat_post=$row_edit['product_seat_post'];

    $p_handleber=$row_edit['product_handleber'];

    $p_stem=$row_edit['product_stem'];

    $p_headset=$row_edit['product_headset'];

    $p_brakeset=$row_edit['product_brakeset'];

    $p_desc = $row_edit['product_desc'];
    $p_top=$row_edit['product_status_top'];
    $p_status=$row_edit['product_status'];
    //$p_keywords = $row_edit['product_keywords'];
    
   // $p_desc = $row_edit['product_desc'];
    
}

    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
    $get_cat = "select * from categories where cat_id='$cat'";
    
    $run_cat = mysqli_query($con,$get_cat);
    
    $row_cat = mysqli_fetch_array($run_cat);
    
    $cat_title = $row_cat['cat_title'];

    $get_manufacturer = "select * from 	manufacturers where manufacturer_id='$manufacturer_id'";
    
    $run_manufacturer = mysqli_query($con,$get_manufacturer);
    
    $row_manufacturer = mysqli_fetch_array($run_manufacturer);
    
    $manufacturer_title = $row_manufacturer['manufacturer_title'];

?>


<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Update Product</h4>
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
                                <label for="example-text-input" class="col-md-3 col-form-label">Product Title</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Product Title" name="product_title" value="<?php echo $p_title; ?>" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Manufacturer</label>
                                <div class="col-md-9">
                                <select class="form-control" name="manufacturer_cat">
                                <option value="<?php echo $manufacturer_id; ?>"> <?php echo $manufacturer_title; ?> </option>
                              
                              <?php 
                              
                              $get_manufacturers = "select * from manufacturers";
                              $run_manufacturers = mysqli_query($con,$get_manufacturers);
                              
                              while ($row_manufacturers=mysqli_fetch_array($run_manufacturers)){
                                  
                                $manufacturer_id = $row_manufacturers['manufacturer_id'];
                                  $manufacturer_title = $row_manufacturers['manufacturer_title'];
                                  
                                  echo "
                                  
                                  <option value='$manufacturer_title'> $manufacturer_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Product Category</label>
                                <div class="col-md-9">
                                <select class="form-control" name="product_cat">
                                <option value="<?php echo $p_cat; ?>" > <?php echo $p_cat_title ?> </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from product_categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                $p_cat = $row_p_cats['p_cat_id'];
                                  $p_cat_title = $row_p_cats['p_cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-md-3 col-form-label">Category</label>
                                <div class="col-md-9">
                                
                                <select name="cat" class="form-control"><!-- form-control Begin -->
                              
                              <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                $cat = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$cat'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-url-input" class="col-md-3 col-form-label">Product Image 1</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="product_img1" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" id="customFiles">Choose file</label>
                                           <br>
                                            <br/>
                                            <img   width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">  
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
                                <label for="example-tel-input" class="col-md-3 col-form-label">Product Image 2</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="product_img2" class="custom-file-input" id="customFilew">
                                            <label class="custom-file-label" id="customFilesw">Choose file</label>
                                            <br>
                                            <br/>
                                            <img   width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image1; ?>">  
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
                                <label for="example-tel-input" class="col-md-3 col-form-label">Product Image 3</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="product_img3" class="custom-file-input" id="customFilewa">
                                            <label class="custom-file-label" id="customFileswa">Choose file</label>
                                            <br>
                                            <br/>
                                            <img   width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image1; ?>">  
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
                                <label for="example-tel-input" class="col-md-3 col-form-label">Product Image 4</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="product_img4" class="custom-file-input" id="customFilewas">
                                            <label class="custom-file-label" id="customFileswas">Choose file</label>
                                            <br>
                                            <br/>
                                            <img   width="70" height="70" src="product_images/<?php echo $p_image4; ?>" alt="<?php echo $p_image1; ?>">  
                                              <br>
                                              <br/>
                                            <script type="text/javascript">
                                            const realfileBtnwas=document.getElementById("customFilewas");
                                            const customTxtwas=document.getElementById("customFileswas");
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
                                <label for="example-email-input" class="col-md-3 col-form-label">Product label</label>
                                <div class="col-md-9">
                                <select class="form-control" name="product_label">
                                        <option><?php echo $p_label; ?></option>
                                        <option value="new">new</option>
                                        <option value="sale">sale</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Product Price</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Prodcut Price" id="example-password-input" value="<?php echo $p_price; ?>" name="product_price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Product Discount</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Prodcut Discount" id="example-password-input" value="<?php echo $p_discount; ?>" name="product_discount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Product Discount Price</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Prodcut Discount Price" id="example-password-input" value="<?php echo $p_discount_price; ?>" name="product_discount_price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Available Quantity<span class="badge badge-pill badge-soft-success font-size-12" ><?php echo $p_qty; ?></span></label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Qty" value="0" name="product_qty" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label"> Product Size</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Size" name="product_size" value="<?php echo $p_size; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Frame</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Frame" name="product_frame" value="<?php echo $p_frame; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Weight</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Weight" name="product_weight" value="<?php echo $p_weight; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Front Suspension</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Front Suspension" name="product_front_suspension" value="<?php echo $p_front_suspension; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Rear Suspension</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Rear Suspension" name="product_rear_suspension" value="<?php echo $p_rear_suspension;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Front Derailleur</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Front Derailleur" name="product_front_derailleur" value="<?php echo $p_front_derailleur; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Rear Derailleur</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Rear Derailleur" name="product_rear_derailleur" value="<?php echo $p_rear_derailleur; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Wheels</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text"  id="example-number-input" placeholder="Product Wheels" name="product_wheels" value="<?php echo $p_wheels; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label"> Product Tires</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Tires" name="product_tires" value="<?php echo $p_tires; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Shifter</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Shifter" name="product_shifter" value="<?php echo $p_shifter; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Crankset</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Crankset" name="product_crankset" value="<?php echo $p_crankset; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Freewheels</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Freewheels" name="product_freewheels" value="<?php echo $p_freewheels; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product BB Set</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product BB Set" name="product_bb_set" value="<?php echo $p_bb_set; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Cassette</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Cassette" name="product_cassette" value="<?php echo $p_cassette; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Colour</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Colour" name="product_colour" value="<?php echo $p_colour; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Pedals</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Pedals" name="product_pedals" value="<?php echo $p_pedals; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Seat Post</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Seat Post" name="product_seat_post" value="<?php echo $p_seat_post; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Handlebar</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Handlebar" name="product_handleber" value="<?php echo $p_handleber; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Stem</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Stem" name="product_stem" value="<?php echo $p_stem; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Headset</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Headset" name="product_headset" value="<?php echo $p_headset; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Brakeset</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Product Brakeset" name="product_brakeset" value="<?php echo $p_brakeset; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Product Desc</label>
                                <div class="col-md-9">
                                <textarea required class="form-control" placeholder="Product Desc" name="product_desc" cols="19" rows="6" ><?php echo $p_desc; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Product Top</label>
                                <?php
                                    if($p_top=="no")
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
                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Product status</label>
                                <?php
                                    if($p_status=="no")
                                    { 
                                ?>
                                                    <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio3" name="customRadios"  value="yes" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio3">Activate</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio4" name="customRadios" value="no" class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="customRadio4">Deactivate</label>
                                                    </div>
                            
                                <?php 
                                    }
                                    else
                                    {
                                        ?>
                                                <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio3" name="customRadios"  value="yes" class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="customRadio3">Activate</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio4" name="customRadios" value="no" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio4">Deactivate</label>
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
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $manufacturer_cat=$_POST['manufacturer_cat'];
    $product_price = $_POST['product_price'];
    $product_label=$_POST['product_label'];
    $product_discount=$_POST['product_discount'];
    $product_discount_price=$_POST['product_discount_price'];
    $product_desc = $_POST['product_desc'];
    $product_size=$_POST['product_size'];
    $product_frame=$_POST['product_frame'];
    $product_qty=$_POST['product_qty'];
    $product_weight=$_POST['product_weight'];
    $product_front_suspension=$_POST['product_front_suspension'];
    $product_rear_suspension=$_POST['product_rear_suspension'];
    $product_front_derailleur=$_POST['product_front_derailleur'];
    $product_rear_derailleur=$_POST['product_rear_derailleur'];
    $product_wheels=$_POST['product_wheels'];
    $product_tires=$_POST['product_tires'];
    $product_shifter=$_POST['product_shifter'];
    $product_crankset=$_POST['product_crankset'];
    $product_freewheels=$_POST['product_freewheels'];
    $product_bb_set=$_POST['product_bb_set'];
    $product_cassette=$_POST['product_cassette'];
    $product_colour=$_POST['product_colour'];
    $product_pedals=$_POST['product_pedals'];
    $product_seat_post=$_POST['product_seat_post'];
    $product_handleber=$_POST['product_handleber'];
    $product_stem=$_POST['product_stem'];
    $product_headset=$_POST['product_headset'];
    $product_brakeset=$_POST['product_brakeset'];
    $product_desc = $_POST['product_desc'];
    $product_top=$_POST['customRadio'];
    $product_status=$_POST['customRadios'];
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    $product_img4 = $_FILES['product_img4']['name'];
    
    if(!($product_img1=="" || $product_img2=="" || $product_img3=="" || $product_img4==""))
    {
        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];
        $temp_name4 = $_FILES['product_img4']['tmp_name'];
        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");
        move_uploaded_file($temp_name4,"product_images/$product_img4");

        $update_product = "update products set manufacturer_id='$manufacturer_cat', p_cat_id='$product_cat',cat_id='$cat',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_img4='$product_img4',product_price='$product_price',product_discount_price='$product_discount_price',product_discount='$product_discount',product_label='$product_label',product_desc='$product_desc',product_qty=product_qty+'$product_qty',available_qty=available_qty+'$product_qty',product_size='$product_size',product_frame='$product_frame',product_weight='$product_weight',product_front_suspension='$product_front_suspension',product_rear_suspension='$product_rear_suspension',product_front_derailleur='$product_front_derailleur',product_rear_derailleur='$product_rear_derailleur',product_wheels='$product_wheels',product_tires='$product_tires',product_shifter='$product_shifter',product_crankset='$product_crankset',product_freewheels='$product_freewheels',product_bb_set='$product_bb_set',product_cassette='$product_cassette',product_colour='$product_colour',product_pedals='$product_pedals',product_seat_post='$product_seat_post',product_handleber='$product_handleber',product_stem='$product_stem',product_headset='$product_headset',product_brakeset='$product_brakeset',product_status_top='$product_top',product_status='$product_status' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
        echo "<script>alert('Your product has been updated Successfully')</script>"; 
            
        echo "<script>window.open('view-product.php','_self')</script>"; 
        }
    }
    else
    {
        $update_product = "update products set manufacturer_id='$manufacturer_cat', p_cat_id='$product_cat',cat_id='$cat',date=NOW(),product_title='$product_title',product_price='$product_price',product_discount_price='$product_discount_price',product_discount='$product_discount',product_label='$product_label',product_desc='$product_desc',product_qty=product_qty+'$product_qty',available_qty=available_qty+'$product_qty',product_size='$product_size',product_frame='$product_frame',product_weight='$product_weight',product_front_suspension='$product_front_suspension',product_rear_suspension='$product_rear_suspension',product_front_derailleur='$product_front_derailleur',product_rear_derailleur='$product_rear_derailleur',product_wheels='$product_wheels',product_tires='$product_tires',product_shifter='$product_shifter',product_crankset='$product_crankset',product_freewheels='$product_freewheels',product_bb_set='$product_bb_set',product_cassette='$product_cassette',product_colour='$product_colour',product_pedals='$product_pedals',product_seat_post='$product_seat_post',product_handleber='$product_handleber',product_stem='$product_stem',product_headset='$product_headset',product_brakeset='$product_brakeset',product_status_top='$product_top',product_status='$product_status' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            ?>

            <script>
                    swal({
                        title: "successful update product.",
                        text: "",
                        icon: "success",
                        buttons: [,"OK"],
                        successMode: true,
                       
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('view-product.php','_self');
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