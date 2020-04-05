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

if(isset($_GET['term_id'])){
    
    $term_id = $_GET['term_id'];
    
    $term_query = "select * from terms where term_id='$term_id'";
    
    $term_edit = mysqli_query($con,$term_query);
    
    $term_edit = mysqli_fetch_array($term_edit);
    
    $term_id = $term_edit['term_id'];
    
    $term_title = $term_edit['term_title'];
    
    $term_desc = $term_edit['term_desc'];

    $term_link=$term_edit['term_link'];
}

?>
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Update Term</h4>

                   
                    
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
                                <label for="example-text-input" class="col-md-3 col-form-label">Term Title </label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Term Title " name="term_title" value="<?php echo $term_title; ?>" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Term Link</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Term Link" name="term_link" value="<?php echo $term_link; ?>" id="example-text-input">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Term Desc</label>
                                <div class="col-md-9">
                                <textarea required class="form-control" placeholder="Term Desc" name="term_desc" cols="19" rows="6" ><?php echo $term_desc; ?></textarea>
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
              
              $term_title = $_POST['term_title'];
              $term_link=$_POST['term_link'];
              $term_desc = $_POST['term_desc'];
              
              $update_term = "update terms set term_title='$term_title',term_link='$term_link',term_desc='$term_desc' where term_id='$term_id'";
              
              $run_term = mysqli_query($con,$update_term);
              
              if($run_term){
                  ?>
                  <script>
                    swal({
                        title:"Your Term Has Been Updated",
                        text: "",
                        icon: "success",
                        buttons: [,"OK"],
                        successMode: true,
                       
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('view-term.php','_self');
                        } 
                        else {
                        }
                });
            </script>
                  <?php 
                  
              }
              
          }

?>


    <?php
 }
    ?>