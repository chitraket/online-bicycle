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
            <!-- Left Sidebar End --> 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            
            
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">View Manufacturer</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <table id="employee_data" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Manufacturer Title</th>
                                                <th>Manufacturer Top</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                            
                                            <?php
                                            
                                              $select_cat="SELECT * FROM manufacturers where manufacturer_status IN ('yes','no')  ORDER BY manufacturer_id DESC";
                                              $run_cart=mysqli_query($con, $select_cat);
                                            while ($row_cart=mysqli_fetch_array($run_cart)) {
                                               ?>
                                                <tr>
                                                <td><?php echo $row_cart["manufacturer_title"] ?></td>
                                                <td>
                                                <?php 
                                                if($row_cart['manufacturer_top']=="yes")
                                                {
                                                ?>
                                               
                                                    <input type="checkbox" id="ch<?php echo $row_cart['manufacturer_id']; ?>" class="switch2" name="no" switch="none" checked/>
                                                <label for="ch<?php echo $row_cart['manufacturer_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                
                                                    <input type="checkbox" id="ch<?php echo $row_cart['manufacturer_id']; ?>" class="switch2" name="yes" switch="none" />
                                                <label for="ch<?php echo $row_cart['manufacturer_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                
                                                    <?php 
                                                } 
                                                ?>
                                                </td>
                                                <td>
                                               <?php 
                                                if($row_cart['manufacturer_status']=="yes")
                                                {
                                                ?>
                                               
                                                    <input type="checkbox" id="<?php echo $row_cart['manufacturer_id']; ?>" class="switch1" name="no" switch="none" checked/>
                                                <label for="<?php echo $row_cart['manufacturer_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                
                                                    <input type="checkbox" id="<?php echo $row_cart['manufacturer_id']; ?>" class="switch1" name="yes" switch="none" />
                                                <label for="<?php echo $row_cart['manufacturer_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                
                                                    <?php 
                                                } 
                                                ?>
                                                </td>
                                               
                                                    <td><a href="delete-manufacturer.php?manufacturer_id=<?php echo $row_cart["manufacturer_id"]?>" class="btn-delete"><i class="bx bx-trash font-size-20 align-middle mr-1"></i></a><a href="update-manufacturer.php?manufacturer_id=<?php echo $row_cart["manufacturer_id"]?>" class="pl-2"><i class="bx bx-edit font-size-20 align-middle mr-1"></i></a> </td>
                                                </tr>
                                                <?php 
                                                 }?>
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
               
                <!-- Modal -->
                <?php
                if(isset($_GET['m']))
                { 
                ?>
                <div class="flash-data" data-flashdata="<?php echo $_GET['m'] ?>"></div>
                <?php
                } 
                ?>
               
                <!-- end modal -->
               <?php 
               include("includes/footer.php");
               ?>
            </div>
            
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
      
                
        <!-- Right Sidebar -->
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>    

        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/vertical/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:43:50 GMT -->
</html>
    <script>  
        $(document).ready(function(){  
            $('#employee_data').DataTable();  
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
                            window.open('view-manufacturer.php','_self');
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
        <script>
                    $('.switch1').on('click',function(){
                        var manufacturer_ids=$(this).attr("id");
                        var manufacturer_idss=$(this).attr("name");
                        $.ajax({
                            url:"manufacturer-status.php",
                            method:"POST",
                            data:{manufacturer_ids:manufacturer_ids,manufacturer_idss:manufacturer_idss},
                            success:function()
                            {

                            }
                        });
                    });
        </script> 
        <script>
                    $('.switch2').on('click',function(){
                        var manufacturer_id=$(this).attr("id");
                        var manufacturer_ids=manufacturer_id.substring(2,manufacturer_id.length);
                        var manufacturer_idss=$(this).attr("name");
                        $.ajax({
                            url:"manufacturer-status-top.php",
                            method:"POST",
                            data:{manufacturer_ids:manufacturer_ids,manufacturer_idss:manufacturer_idss},
                            success:function()
                            {

                            }
                        });
                        
                        
                    });
        </script>

        <script>
           $('.btn-delete').on('click',function(e){
               e.preventDefault();
               const href =$(this).attr('href')
               swal({
                        title:"Are you sure?",
                        text:"Delete Product Manufacturer.",
                        icon:"warning",
                        buttons: true,
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                           document.location.href=href;
                        } else {
                        
                        }
                });
              
           })
           const flashdata=$('.flash-data').data('flashdata')
           if(flashdata){
            swal({
                        title:"successful delete Manufacturer.",
                        text: "",
                        icon:"success",
                        buttons: [,"Ok"],
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('view-manufacturer.php','_self'); 
                        } 
                        else {
                        
                        }
                });
           }    
        </script> 
<?php
 } 
?>