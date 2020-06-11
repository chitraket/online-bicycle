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
     $paga=17;
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
            $error_name = ""; 
            $error_status="";
            $error_title="";
            $error_desc="";
            $errorresult=true;

            if(isset($_POST['submit'])){
                if(empty($_POST['p_box']))
                {
                    $error_name="Required..";
                    $errorresult=false;
                }
                else{
                    $error_name="";
                }
                if(empty($_POST['box_desc']))
                {
                    $error_desc="Required..";
                    $errorresult=false;
                }
                else{
                    $error_desc="";
                }    
                
                        if(empty($_POST['box_title']))
                        {
                            $error_title="Required..";
                            $errorresult=false;
                        }
                        else{
                            $error_title="";   
                        }
                if($errorresult==false)
                {
                    goto end;
                }
                $box_title = $_POST['box_title'];
                $box_desc = $_POST['box_desc'];
                $p_box = $_POST['p_box'];
                $insert_cat = "insert into boxes_section (box_icon,box_title,box_desc,box_status) values ('$p_box','$box_title','$box_desc','yes')";
                
                $run_cat = mysqli_query($con,$insert_cat);
                
                if($run_cat){
                    ?>
                <script>
                    swal({
                        title: "Your New Box Has Been Inserted..",
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
                    
               <?php  }
                
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
                    <h4 class="mb-0 font-size-18">Add Box</h4>  
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
                                <label for="example-text-input" class="col-md-3 col-form-label">Box Title</label>
                                <div class="col-md-9">
                                
                                <select class="form-control select2" name="p_box" required>
                                <span style="color: red;"><?php echo $error_name; ?></span>
                                    <option disabled selected value>Select</option>
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
                                    <option value="up-arrow">up-arrow</option>
                                    <option value="angle-left">angle-left</option>
                                    <option value="angle-down">angle-down</option>
                                    <option value="switch">switch</option>
                                    <option value="angle-down-circle">angle-down-circle</option>
                                    <option value="scissors">scissors</option>
                                    <option value="wallet">wallet</option>
                                    <option value="safe">safe</option>
                                    <option value="volume2">volume2</option>
                                    <option value="volume1">volume1</option>
                                    <option value="voicemail">voicemail</option>
                                    <option value="video">video</option>
                                    <option value="user">user</option>
                                    <option value="upload">upload</option>
                                    <option value="unlock">unlock</option>
                                    <option value="umbrella">umbrella</option>
                                    <option value="trash">trash</option>
                                    <option value="tools">tools</option>
                                    <option value="timer">timer</option>
                                    <option value="ticket">ticket</option>
                                    <option value="target">target</option>
                                    <option value="sun">sun</option>
                                    <option value="study">study</option>
                                    <option value="stopwatch">stopwatch</option>
                                    <option value="speaker">speaker</option>
                                    <option value="star">star</option>
                                    <option value="signal">signal</option>
                                    <option value="shuffle">shuffle</option>
                                    <option value="shopbag">shopbag</option>
                                    <option value="share">share</option>
                                    <option value="server">server</option>
                                    <option value="search">search</option>
                                    <option value="film">film</option>
                                    <option value="science">science</option>
                                    <option value="disk">disk</option>
                                    <option value="ribbon">ribbon</option>
                                    <option value="repeat">repeat</option>
                                    <option value="refresh">refresh</option>
                                    <option value="add-user">add-user</option>
                                    <option value="refresh-cloud">refresh-cloud</option>
                                    <option value="paperclip">paperclip</option>
                                    <option value="radio">radio</option>
                                    <option value="note2">note2</option>
                                    <option value="print">print</option>
                                    <option value="network">network</option>
                                    <option value="prev">prev</option>
                                    <option value="mute">mute</option>
                                    <option value="power">power</option>
                                    <option value="medal">medal</option>
                                    <option value="portfolio">portfolio</option>
                                    <option value="plus">plus</option>
                                    <option value="left-arrow">left-arrow</option>
                                    <option value="play">play</option>
                                    <option value="key">key</option>
                                    <option value="plane">plane</option>
                                    <option value="joy">joy</option>
                                    <option value="photo-gallery">photo-gallery</option>
                                    <option value="pin">pin</option>
                                    <option value="phone">phone</option>
                                    <option value="plug">plug</option>
                                    <option value="pen">pen</option>
                                    <option value="bicycle">bicycle</option>
                                    <option value="bell">bell</option>
                                    <option value="alarm">alarm</option>
                                    <option value="airplay">airplay</option>
                                    <option value="albums">albums</option>
                                    <option value="attention">attention</option>
                                    <option value="box2">box2</option>
                                    <option value="box1">box1</option> 
                                </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Box Title</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Box Title" name="box_title"  id="example-text-input" required>
                                    <span style="color: red;"><?php echo $error_title; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-3 col-form-label">Box Description</label>
                                <div class="col-md-9">
                                <textarea required class="form-control" placeholder="Box Description" name="box_desc" cols="19" rows="6" > </textarea>
                                <span style="color: red;"><?php echo $error_desc; ?></span>    
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

        <!-- select 2 plugin -->
        <script src="assets/libs/select2/js/select2.min.js"></script>
        <script src="assets/js/pages/ecommerce-select2.init.js"></script>

        <script src="assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="assets/js/pages/form-validation.init.js"></script>
        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>
        <script src="assets/js/app.js"></script>
    </body>
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
                            window.open('add-box.php','_self');
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
