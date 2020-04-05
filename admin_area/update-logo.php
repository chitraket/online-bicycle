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

if(isset($_GET['logo_id'])){
    
    $edit_p_cat_id = $_GET['logo_id'];
    
    $edit_p_cat_query = "select * from logo where logo_id='$edit_p_cat_id'";
    
    $run_edit = mysqli_query($con,$edit_p_cat_query);
    
    $row_edit = mysqli_fetch_array($run_edit);
    
    $l_id = $row_edit['logo_id'];
    $l_name = $row_edit['logo_name'];
    $l_img=$row_edit['logo_img'];
    $l_url=$row_edit['logo_link'];
}

?>
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Update Logo</h4>  
                </div>

        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form method="POST" enctype="multipart/form-data"> 
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Logo Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="logo Name" name="s_name" value="<?php echo $l_name; ?>" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-url-input" class="col-md-3 col-form-label">Logo Image</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="slider_img" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" id="customFiles">Choose file</label>
                                           <br>
                                            <br/>
                                            <img   width="70" height="70" src="logo/<?php echo $l_img; ?>" alt="<?php echo $l_img; ?>">  
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
                                <label for="example-number-input" class="col-md-3 col-form-label">Logo URL</label>
                                <div class="col-md-9">
                                <input class="form-control" type="text" placeholder="Logo URL" name="s_url" value="<?php echo $l_url; ?>" id="example-text-input">
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

$s_rows="";
          if(isset($_POST['update'])){
              
              $s_name = $_POST['s_name'];
              

              
              $s_urls=$_POST['s_url'];

              $slider_img = $_FILES['slider_img']['name'];

              if(!($slider_img==""))
              {
              $temp_name1 = $_FILES['slider_img']['tmp_name'];
              move_uploaded_file($temp_name1,"logo/$slider_img");
        
              $update_p_cat = "update logo set logo_name='$s_name',logo_img='$slider_img',logo_link='$s_urls' where logo_id='$l_id'";
              
              $run_p_cat = mysqli_query($con,$update_p_cat);
              if($run_p_cat){
                ?>
                <script>
                    swal({
                        title:"Your Logo Has Been Updated",
                        text: "",
                        icon: "success",
                        buttons: [,"OK"],
                        successMode: true,
                       
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('view-logo.php','_self');
                        } 
                        else {
                        }
                });
            </script>
                  <?php 

              }
            }
              else{
                $update_p_cat = "update logo set logo_name='$s_name',logo_link='$s_urls' where logo_id='$l_id'";
              
                $run_p_cat = mysqli_query($con,$update_p_cat);
                if($run_p_cat){
                  ?>
                  <script>
                      swal({
                          title:"Your Logo Has Been Updated",
                          text: "",
                          icon: "success",
                          buttons: [,"OK"],
                          successMode: true,
                         
                  })
                  .then((willDelete) => {
                          if (willDelete) {
                              window.open('view-logo.php','_self');
                          } 
                          else {
                          }
                  });
              </script>
                    <?php 
              }
              
              
              }
              
          }
        }
?>