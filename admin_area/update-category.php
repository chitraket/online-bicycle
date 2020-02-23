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

if(isset($_GET['cat_id'])){
    
    $edit_p_cat_id = $_GET['cat_id'];
    
    $edit_p_cat_query = "select * from categories where cat_id='$edit_p_cat_id'";
    
    $run_edit = mysqli_query($con,$edit_p_cat_query);
    
    $row_edit = mysqli_fetch_array($run_edit);
    
    $p_cat_id = $row_edit['cat_id'];
    
    $p_cat_title = $row_edit['cat_title'];
    
    $p_cat_desc = $row_edit['cat_desc'];
    
}

?>
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add Product</h4>

                   
                    
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
                                <label for="example-text-input" class="col-md-3 col-form-label">Category Title </label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Category Title " name="p_cat_title" value="<?php echo $p_cat_title; ?>" id="example-text-input">
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Category Desc</label>
                                <div class="col-md-9">
                                <textarea required class="form-control" placeholder="Category Desc" name="p_cat_desc" cols="19" rows="6" ><?php echo $p_cat_desc; ?></textarea>
                                </div>
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
              
              $p_cat_title = $_POST['p_cat_title'];
              
              $p_cat_desc = $_POST['p_cat_desc'];
              
              $update_p_cat = "update categories set cat_title='$p_cat_title',cat_desc='$p_cat_desc' where cat_id='$p_cat_id'";
              
              $run_p_cat = mysqli_query($con,$update_p_cat);
              
              if($run_p_cat){

                  echo "<script>alert('Your Product Category Has Been Updated')</script>";
                  echo "<script>window.open('view-category.php','_self')</script>";
                  
              }
              
          }

?>


    <?php
 }
    ?>