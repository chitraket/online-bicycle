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
     $paga=19;
     $admin_email=$_SESSION['admin_email'];
     $query_per="select * from admins where admin_email='$admin_email'";
         $run_query_per=mysqli_query($con,$query_per);
         while($row_query_per=mysqli_fetch_array($run_query_per))
         {
              $admin_permission=$row_query_per['admin_permission'];
                                     
         } 
         $subject=explode(",",$admin_permission);
        if(in_array($paga,$subject))
        {
     ?>

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add Terms</h4>

                   
                    
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
                                <label for="example-text-input" class="col-md-3 col-form-label">Terms Title</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Terms Title" name="terms_title"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Terms link</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Terms Link" name="terms_link"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Terms Description</label>
                                <div class="col-md-9">
                                <textarea required class="form-control" placeholder="Terms Description" name="terms_desc" cols="19" rows="6"> </textarea>
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
                            window.open('add-terms.php','_self');
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

if(isset($_POST['submit'])){
    
    $terms_title = $_POST['terms_title'];
   
    $terms_desc = $_POST['terms_desc'];

    $terms_link=$_POST['terms_link'];
    
    
    $insert_terms = "insert into terms (term_title,term_link,term_desc,term_status) values ('$terms_title','$terms_link','$terms_desc','yes')";
    
    $run_terms = mysqli_query($con,$insert_terms);
    
    if($run_terms){
        ?>
         <script>
        swal({
            title:"Your New Terms Has Been Inserted.",
            text: "",
            icon: "success",
            buttons: [,"OK"],
            successMode: true,
           
    })
    .then((willDelete) => {
            if (willDelete) {
                window.open('view-terms.php','_self');
            } 
            else {
            }
    });
</script>
      <?php  
    }
    
}
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