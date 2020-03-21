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
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form method="POST" enctype="multipart/form-data"> 
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Accessories Title</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Accessories Title" name="accessories_title"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Manufacturer</label>
                                <div class="col-md-9">
                                <select class="form-control" name="accessories_brand">
                                        <option>Select</option>
                                        <?php 
                              
                                                $get_p_cats = "select * from accessories_brand";
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
                                <select class="form-control" name="accessories_category">
                                        <option>Select</option>
                                        <?php 
                              
                                                $get_p_cats = "select * from accessories_category";
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
                                            <input type="file" name="accessories_img1" class="custom-file-input" id="customFile">
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
                                            <input type="file" name="accessories_img2" class="custom-file-input" id="customFilew">
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
                                            <input type="file" name="accessories_img3" class="custom-file-input" id="customFilewa">
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
                                <label for="example-password-input" class="col-md-3 col-form-label">Accessories Price</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Accessories Price" id="example-password-input" name="accessories_price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Accessories qty</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Accessories Qty" name="accessories_qty" >
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
                                    <input class="form-control" type="text" id="example-number-input" placeholder="Accessories Color" name="accessories_color" >
                                </div>
                            </div>
                         
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Accessories Desc</label>
                                <div class="col-md-9">
                                <textarea required class="form-control" placeholder="Accessories Desc" name="accessories_desc" cols="19" rows="6"></textarea>
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
        <?php 

        if(isset($_POST['submit'])){
            

            $accessories_name=$_POST['accessories_title'];
            $accessories_brand=$_POST['accessories_brand'];
            $accessories_category=$_POST['accessories_category'];
           
            $accessories_price=$_POST['accessories_price'];
            $accessories_qty=$_POST['accessories_qty'];
            $accessories_material=$_POST['accessories_material'];
            $accessories_color=$_POST['accessories_color'];
            $accessories_desc=$_POST['accessories_desc'];

            $accessories_img1=$_FILES['accessories_img1']['name'];
            $accessories_img2=$_FILES['accessories_img2']['name'];
            $accessories_img3=$_FILES['accessories_img3']['name'];
          
            
            $temp_name1 = $_FILES['accessories_img1']['tmp_name'];
            $temp_name2 = $_FILES['accessories_img2']['tmp_name'];
            $temp_name3 = $_FILES['accessories_img3']['tmp_name'];
            
            move_uploaded_file($temp_name1,"accessories_images/$accessories_img1");
            move_uploaded_file($temp_name2,"accessories_images/$accessories_img2");
            move_uploaded_file($temp_name3,"accessories_images/$accessories_img3");
            


            $insert_accessories = "insert into accessories(accessories_brand,accessories_category,accessories_name,accessories_image_1,accessories_image_2,accessories_image_3,accessories_qty,available_qty,accessories_material,accessories_color,accessories_prices,accessories_date,accessories_desc) values ('$accessories_brand','$accessories_category','$accessories_name','$accessories_img1','$accessories_img2','$accessories_img3','$accessories_qty','$accessories_qty','$accessories_material','$accessories_color','$accessories_price',NOW(),'$accessories_desc')";
            $run_accessories = mysqli_query($con,$insert_accessories);
            if($run_accessories){
                
                echo "<script>alert('Product has been inserted sucessfully')</script>";
                echo "<script>window.open('view-accessories.php','_self')</script>";
                
            }
            
        }

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

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>
    </body>


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:43:03 GMT -->
</html>



    <?php
 }
    ?>