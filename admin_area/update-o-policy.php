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
     $paga=30;
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
if(isset($_GET['o_policy_id'])){
    
    $term_id = $_GET['o_policy_id'];
    
    $term_query = "select * from order_policy where o_policy_id='$term_id'";
    
    $term_edit = mysqli_query($con,$term_query);
    
    $term_edit = mysqli_fetch_array($term_edit);
    
    $term_id = $term_edit['o_policy_id'];
    
    $term_title = $term_edit['o_policy_title'];
    
    $term_desc = $term_edit['o_policy_desc'];

    $term_link=$term_edit['o_policy_link'];

    $term_status=$term_edit['o_policy_status'];
}
$error_tiitle="";
$error_desc="";
$error_link=""; 
$error_status="";
$errorresult=true;
if(isset($_POST['update'])){

    if(empty($_POST['term_title']))
    {
        $error_tiitle="Required..";
        $errorresult=false;
    }
    else{
        $error_tiitle="";
    }
    if(empty($_POST['term_desc']))
    {
        $error_desc="Required..";
        $errorresult=false;
    }
    else{
        $error_desc="";
    }
    if(empty($_POST['term_link']))
    {
        $error_link="Required..";
        $errorresult=false;
    }
    else{
        $error_link="";
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
    $term_title = $_POST['term_title'];
    $term_link=$_POST['term_link'];
    $term_desc = $_POST['term_desc'];
    $term_statuss=$_POST['customRadios'];
    
    $update_term = "update order_policy set o_policy_title='$term_title',o_policy_link='$term_link',o_policy_desc='$term_desc',o_policy_status='$term_statuss' where o_policy_id='$term_id'";
    
    $run_term = mysqli_query($con,$update_term);
    
    if($run_term){
        ?>
        <script>
          swal({
              title:"Your Order Policy Has Been Updated",
              text: "",
              icon: "success",
              buttons: [,"OK"],
              successMode: true,
             
      })
      .then((willDelete) => {
              if (willDelete) {
                  window.open('view-o-policy.php','_self');
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
                    <h4 class="mb-0 font-size-18">Update Order Policy</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form class="custom-validation" method="POST" enctype="multipart/form-data"> 
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Order Policy Title </label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Order Policy Title " name="term_title" value="<?php echo $term_title;?>" id="example-text-input" required>
                                    <span style="color: red;"><?php echo $error_tiitle; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Order Policy Link</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Order Policy Link" name="term_link" value="<?php echo $term_link;?>" id="example-text-input" required>
                                    <span style="color: red;"><?php echo $error_link; ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Order Policy Desc</label>
                                <div class="col-md-9">
                                <textarea required class="form-control" placeholder="Order Policy Desc" name="term_desc" cols="19" rows="6" ><?php echo $term_desc; ?></textarea>
                                <span style="color: red;"><?php echo $error_desc; ?></span>    
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Order Policy Status</label>
                                <?php
                                    if($term_status=="no")
                                    { 
                                ?>
                                                    <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio3" name="customRadios"  value="yes" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio3">Activate</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio4" name="customRadios" value="no" class="custom-control-input" required checked>
                                                        <label class="custom-control-label" for="customRadio4">Deactivate</label>
                                                    </div>
                                                    <span style="color: red;"><?php echo $error_status; ?></span>
                            
                                <?php 
                                    }
                                    else
                                    {
                                        ?>
                                                <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio3" name="customRadios"  value="yes" class="custom-control-input" required checked>
                                                        <label class="custom-control-label" for="customRadio3">Activate</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio4" name="customRadios" value="no" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio4">Deactivate</label>
                                                    </div>
                                                    <span style="color: red;"><?php echo $error_status; ?></span>
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
                            window.open('update-o-policy.php','_self');
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