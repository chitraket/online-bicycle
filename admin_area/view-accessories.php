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
    $paga=10;
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
     
     ?>

            <!-- Left Sidebar End -->

             
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <form action="#" method="POST">
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">View Accessories</h4>
    
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
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>qty</th>
                                                <th>Available qty</th>
                                                <th>Sold Out</th>
                                                <th>Accessories Top</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                            
                                            <?php
                                            
                                              $select_cat="SELECT * FROM accessories where accessories_status IN ('yes','no') ORDER BY accessories_id DESC";
                                              $run_cart=mysqli_query($con, $select_cat);
                                            while ($row_cart=mysqli_fetch_array($run_cart)) {
                                               
                                                ?><tr>
                                                <td>
                                                <img src="accessories_images/<?php echo $row_cart["accessories_image_1"];?>" width="60" height="60"></td>
                                                <td><?php echo $row_cart["accessories_name"];?></td>
                                                <td><?php echo $row_cart["accessories_prices"]; ?></td>
                                                <td><?php echo $row_cart["accessories_qty"]; ?></td>
                                                <td><?php echo $row_cart["available_qty"] ?></td>
                                                <td><?php echo $sold_out=$row_cart["accessories_qty"]-$row_cart["available_qty"]; ?></td>
                                                <td>
                                                <?php 
                                                if($row_cart['accessories_status_top']=="yes")
                                                {
                                                ?>
                                               
                                                    <input type="checkbox" id="ch<?php echo $row_cart['accessories_id']; ?>" class="switch2" name="no" switch="none" checked/>
                                                <label for="ch<?php echo $row_cart['accessories_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                
                                                    <input type="checkbox" id="ch<?php echo $row_cart['accessories_id']; ?>" class="switch2" name="yes" switch="none" />
                                                <label for="ch<?php echo $row_cart['accessories_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                
                                                    <?php 
                                                } 
                                                ?>
                                                </td>
                                                <td>
                                               <?php 
                                                if($row_cart['accessories_status']=="yes")
                                                {
                                                ?>
                                               
                                                    <input type="checkbox" id="<?php echo $row_cart['accessories_id']; ?>" class="switch1" name="no" switch="none" checked/>
                                                <label for="<?php echo $row_cart['accessories_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                
                                                    <input type="checkbox" id="<?php echo $row_cart['accessories_id']; ?>" class="switch1" name="yes" switch="none" />
                                                <label for="<?php echo $row_cart['accessories_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                
                                                    <?php 
                                                } 
                                                ?>
                                                </td>
                                                <td><a href="delete-accessories.php?accessories_id=<?php echo $row_cart["accessories_id"] ?>" class="btn-delete"><i class="bx bx-trash font-size-20 align-middle mr-1"></i></a><a href="update-accessories.php?accessories_id=<?php echo $row_cart["accessories_id"]; ?>" class="pl-2"><i class="bx bx-edit font-size-20 align-middle mr-1"></i></a> <input type="button" name="view" value="View Details" id="<?php echo $row_cart["accessories_id"];?>" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light view_data"  /></td>
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


                <div class="modal fade exampleModal" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Accessories Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="employee_detail">
                             
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                
               
                <!-- end modal -->

                <?php
                if(isset($_GET['m']))
                { 
                ?>
                <div class="flash-data" data-flashdata="<?php echo $_GET['m'] ?>"></div>
                <?php
                } 
                ?>

               <?php 
                include("includes/footer.php");
               ?>

            </div>
            </form>
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
                            window.open('view-accessories.php','_self');
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
                     $(document).on('click','.view_data', function(){  
                            var accessories_id = $(this).attr("id");  
                            $.ajax({  
                                    url:"select2.php",  
                                    method:"post",  
                                    data:{accessories_id:accessories_id},  
                                    success:function(data){  
                                        $('#employee_detail').html(data);  
                                        $('#dataModal').modal("show");  
                                    }  
                            });  
                        });    
            </script>
            <script>
                    $('.switch1').on('click',function(){
                        var accessories_ids=$(this).attr("id");
                        var accessories_idss=$(this).attr("name");
                        $.ajax({
                            url:"accessories-status.php",
                            method:"POST",
                            data:{accessories_ids:accessories_ids,accessories_idss:accessories_idss},
                            success:function()
                            {
                                window.open('view-accessories.php','_self');
                            }
                        });
                    });
                </script>
                 <script>
                    $('.switch2').on('click',function(){
                        var accessories_id=$(this).attr("id");
                        var accessories_ids=accessories_id.substring(2,accessories_id.length);
                        var accessories_idss=$(this).attr("name");
                        $.ajax({
                            url:"accessories-status-top.php",
                            method:"POST",
                            data:{accessories_ids:accessories_ids,accessories_idss:accessories_idss},
                            success:function()
                            {
                                window.open('view-accessories.php','_self');
                            }
                        });
                        
                        
                    });
                </script> 
            <script>
           $('.btn-delete').on('click',function(e){
               e.preventDefault();
               const href =$(this).attr('href')
               swal({
                        title: "Are you sure?",
                        text: "Delete accessories.",
                        icon: "warning",
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
                        title: "successful accessories.",
                        text: "",
                        icon: "success",
                        buttons: [,"Ok"],
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('view-accessories.php','_self'); 
                        } else {
                        
                        }
                });
                
           }    
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