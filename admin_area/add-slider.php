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
                    <h4 class="mb-0 font-size-18">Add Slider</h4>

                   
                    
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
                                <label for="example-text-input" class="col-md-3 col-form-label">Slider Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Slider Name" name="s_name"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-url-input" class="col-md-3 col-form-label">Slider Image</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="product_img1" class="custom-file-input" id="customFile">
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
                            <label for="example-text-input" class="col-md-3 col-form-label">Slider Row</label>
                                                    
                                                    <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio1" name="customRadio"  value="left" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1">left side</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio2" name="customRadio" value="right" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio2">right side</label>
                                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Slider Row 1</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Slider Row 1" name="s_row_1"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Slider Row 2</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Slider Row 2" name="s_row_2"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Slider URL</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Slider URL" name="s_url"  id="example-text-input">
                                </div>
                            </div>
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
            $s_row="";
          if(isset($_POST['submit'])){
            $s_name=$_POST['s_name'];
            $product_img1=$_POST['product_img1'];
            $product_img1 = $_FILES['product_img1']['name'];
            $temp_name1 = $_FILES['product_img1']['tmp_name'];
           
            $s_row_1=$_POST['s_row_1'];
            $s_row_2=$_POST['s_row_2'];
            $s_url=$_POST['s_url'];
           if($_POST['customRadio']=="right")
           {
                $s_row="float-md-right float-none";
           }
           else{
               $s_row="";
           }
                $view_slides="select * from slider";
                $view_run_slide=mysqli_query($con,$view_slides);
                $count=mysqli_num_rows($view_run_slide);
                if($count<4)
                {
                    move_uploaded_file($temp_name1,"slides_images/$product_img1");
                    $insert_cat = "insert into slider(slide_name,slide_image,slide_row,slide_row_2,status,slide_url)  values('$s_name','$product_img1','$s_row_1','$s_row_2','$s_row','$s_url')";
                    $run_cat = mysqli_query($con,$insert_cat);
                    echo "<script>alert('Your new slide image has been inserted')</script>";
                    echo "<script>window.open('view-slider.php','_self')</script>";
                }
               else
               {
                echo "<script>alert('You have already inserted 4 slides')</script>";    
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