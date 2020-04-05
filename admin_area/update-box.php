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

if(isset($_GET['box_id'])){
    
    $box_id = $_GET['box_id'];
    
    $edit_p_cat_query = "select * from boxes_section where box_id='$box_id'";
    
    $run_edit = mysqli_query($con,$edit_p_cat_query);
    
    $row_edit = mysqli_fetch_array($run_edit);
    
    $box_id = $row_edit['box_id'];
    
    $box_title = $row_edit['box_title'];
    
    $box_desc = $row_edit['box_desc'];
    
    $box_icon=$row_edit['box_icon'];
}

?>
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Update Box</h4>
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
                                <label for="example-text-input" class="col-md-3 col-form-label">Box Icon</label>
                                <div class="col-md-9">
                                <select class="form-control select2" name="p_box">
                                <option value="<?php echo $box_icon; ?>"> <?php echo $box_icon; ?> </option>
                                    <option value="album">album</option>
                                    <option value="back-2">back-2</option>
                                    <option value="arc">arc</option>
                                    <option value="bandaid">bandaid</option>
                                    <option value="car">car</option>
                                    <option value="diamond">diamond</option>
                                    <option value="door-lock">door-lock</option>
                                    <option value="eyedropper">eyedropper</option>
                                    <option value="female">female</option>
                                    <option value="gym">gym</option>
                                    <option value="hammer">hammer</option>
                                    <option value="headphones">headphones</option>
                                    <option value="helm">helm</option>
                                    <option value="hourglass">hourglass</option>
                                    <option value="leaf">leaf</option>
                                    <option value="magic-wand">magic-wand</option>
                                    <option value="male">male</option>
                                    <option value="map-2">map-2</option>
                                    <option value="next-2">next-2</option>
                                    <option value="paint-bucket">paint-bucket</option>
                                    <option value="pendrive">pendrive</option>
                                    <option value="photo">photo</option>
                                    <option value="piggy">piggy</option>
                                    <option value="plugin">plugin</option>
                                    <option value="refresh-2">refresh-2</option>
                                    <option value="rocket">rocket</option>
                                    <option value="settings">settings</option>
                                    <option value="shield">shield</option>
                                    <option value="smile">smile</option>
                                    <option value="usb">usb</option>
                                    <option value="vector">vector</option>
                                    <option value="wine">wine</option>
                                    <option value="cash">cash</option>
                                    <option value="close">close</option>
                                    <option value="bluetooth">bluetooth</option>
                                    <option value="cloud-download">cloud-download</option>
                                    <option value="way">way</option>
                                    <option value="close-circle">close-circle</option>
                                    <option value="id">id</option>
                                    <option value="angle-up">angle-up</option>
                                    <option value="wristwatch">wristwatch</option>
                                    <option value="angle-up-circle">angle-up-circle</option>
                                    <option value="world">world</option>
                                    <option value="angle-right">angle-right</option>
                                    <option value="volume">volume</option>
                                    <option value="angle-right-circle">angle-right-circle</option>
                                    <option value="users">users</option>
                                    <option value="angle-left">angle-left</option>
                                    <option value="user-female">user-female</option>
                                    <option value="angle-left-circle">angle-left-circle</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Box Title </label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Box Title " name="box_title" value="<?php echo $box_title; ?>" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Box Desc</label>
                                <div class="col-md-9">
                                <textarea required class="form-control" placeholder="Box Desc" name="box_desc" cols="19" rows="6" ><?php echo $box_desc; ?></textarea>
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

        <!-- select 2 plugin -->
        <script src="assets/libs/select2/js/select2.min.js"></script>
        <script src="assets/js/pages/ecommerce-select2.init.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>
    </body>


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:43:03 GMT -->
</html>

<?php  

          if(isset($_POST['update'])){

              $p_box=$_POST['p_box'];
              
              $box_title = $_POST['box_title'];
              
              $box_desc = $_POST['box_desc'];
              


              $update_p_cat = "update boxes_section set box_icon='$p_box',box_title='$box_title',box_desc='$box_desc' where box_id='$box_id'";
              
              $run_p_cat = mysqli_query($con,$update_p_cat);
              
              if($run_p_cat){

                ?>

                <script>
                    swal({
                        title: "successful update box.",
                        text: "",
                        icon: "success",
                        buttons:[,"OK"],
                        successMode: true,
                       
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('view-box.php','_self');
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