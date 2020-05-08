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
     $paga=5;
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
        $error_product="";
        $error_top="";
        $errorresult=true;
        if(isset($_POST['submit'])){
              
            if(empty($_POST['p_cat_title']))
                {
                    $error_product="Required..";
                    $errorresult=false;
                }
                else{
                    $error_product="";
                }
                        if(empty($_POST['customRadio']))
                        {
                            $error_top="Required..";
                            $errorresult=false;
                        }
                        else{
                            $error_top="";   
                        }
                if($errorresult==false)
                {
                    goto end;
                }
            $p_cat_title = $_POST['p_cat_title'];
            
            $p_cat_top=$_POST['customRadio'];
            
            $insert_p_cat = "insert into product_categories (p_cat_title,p_cat_top,p_cat_status) values('$p_cat_title','$p_cat_top','yes')";
            
            $run_p_cat = mysqli_query($con,$insert_p_cat);
            
            if($run_p_cat){
              ?>
                 <script>
                  swal({
                      title:"Your New Bikes Category Has Been Inserted.",
                      text: "",
                      icon: "success",
                      buttons: [,"OK"],
                      successMode: true,
                     
              })
              .then((willDelete) => {
                      if (willDelete) {
                          window.open('view-product-category.php','_self');
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
                    <h4 class="mb-0 font-size-18">Add Bikes Category</h4> 
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
                                <label for="example-text-input" class="col-md-3 col-form-label">Bikes Category Title</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Bikes Category Title" name="p_cat_title"  id="example-text-input" required>
                                    <span style="color: red;"><?php echo $error_product; ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Bikes Category Top</label>
                                                    
                                                    <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio1" name="customRadio"  value="yes" class="custom-control-input" checked  required/>
                                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio2" name="customRadio" value="no" class="custom-control-input" />
                                                        <label class="custom-control-label" for="customRadio2">No</label>
                                                    </div>
                                                    <span style="color: red;"><?php echo $error_top; ?></span>
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
                            window.open('add-product-category.php','_self');
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
