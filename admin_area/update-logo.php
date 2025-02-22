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
     $paga=22;
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

if(isset($_GET['logo_id'])){
    
    $edit_p_cat_id = $_GET['logo_id'];
    
    $edit_p_cat_query = "select * from logo where logo_id='$edit_p_cat_id'";
    
    $run_edit = mysqli_query($con,$edit_p_cat_query);
    
    $row_edit = mysqli_fetch_array($run_edit);
    
    $l_id = $row_edit['logo_id'];
    $l_name = $row_edit['logo_name'];
    $l_img=$row_edit['logo_img'];
    $l_url=$row_edit['logo_link'];
    $l_status=$row_edit['logo_status'];
}
        $error_product="";
        $error_top="";
        $error_image2="";
        $error_status="";
        $errorresult=true;
if(isset($_POST['update'])){
      
    if(empty($_POST['s_name']))
                {
                    $error_product="Required..";
                    $errorresult=false;
                }
                else{
                    $error_product="";
                }
                $test_img2=$_FILES['slider_img']['name'];
                if(images($test_img2))
                {   
                    $error_image2="JPEG or PNG file.";
                    $errorresult=false;
                }
                else{
                    $error_image2="";
                } 
                        if(empty($_POST['s_url']))
                        {
                            $error_top="Required..";
                            $errorresult=false;
                        }
                        else{
                            $error_top="";   
                        }
                        if(empty($_POST['customRadios']))
                        {
                            $error_status="Required..";
                            $errorresult=false;
                        }
                        else{
                            $error_status="";   
                        }
                if($errorresult==false)
                {
                    goto end;
                }
    $s_name = $_POST['s_name'];
    
  $s_status=$_POST['customRadios'];
    
    $s_urls=$_POST['s_url'];

    $slider_img = $_FILES['slider_img']['name'];

    if(!($slider_img==""))
    {
    $temp_name1 = $_FILES['slider_img']['tmp_name'];
    move_uploaded_file($temp_name1,"logo/$slider_img");

    $update_p_cat = "update logo set logo_name='$s_name',logo_img='$slider_img',logo_link='$s_urls',logo_status='$s_status' where logo_id='$l_id'";
    
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
      $update_p_cat = "update logo set logo_name='$s_name',logo_link='$s_urls',logo_status='$s_status' where logo_id='$l_id'";
    
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
end:
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
                       <form class="custom-validation" method="POST" enctype="multipart/form-data"> 
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Logo Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="logo Name" name="s_name" value="<?php echo $l_name; ?>" id="example-text-input" required>
                                    <span style="color: red;"><?php echo $error_product; ?></span> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-url-input" class="col-md-3 col-form-label">Logo Image</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="slider_img" class="custom-file-input" id="customFile" accept=".jpg,.jpeg,.png">
                                            <span style="color: red;"><?php echo $error_image2; ?></span>
                                            <label class="custom-file-label" id="customFiles">Choose file</label>
                                           <br>
                                            <br/>
                                            <img   width="100" height="50" src="logo/<?php echo $l_img; ?>" alt="<?php echo $l_img; ?>">  
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
                                <input class="form-control" type="text" placeholder="Logo URL" name="s_url" value="<?php echo $l_url; ?>" id="example-text-input" required>
                                <span style="color: red;"><?php echo $error_top; ?></span>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Box Status</label>
                                <?php
                                    if($l_status=="no")
                                    { 
                                ?>
                                                    <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio3" name="customRadios"  value="yes" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio3">Activate</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio4" name="customRadios" value="no" class="custom-control-input" checked required>
                                                        <span style="color: red;"><?php echo $error_status; ?></span>
                                                        <label class="custom-control-label" for="customRadio4">Deactivate</label>
                                                    </div>
                            
                                <?php 
                                    }
                                    else
                                    {
                                        ?>
                                                <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio3" name="customRadios"  value="yes" class="custom-control-input" checked required>
                                                        <span style="color: red;"><?php echo $error_status; ?></span>
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
        <script src="assets/libs/parsleyjs/parsley.min.js"></script>

<script src="assets/js/pages/form-validation.init.js"></script>
        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

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
                            window.open('update-logo.php','_self');
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