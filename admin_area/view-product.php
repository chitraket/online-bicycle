<?php
 session_start();
 include("includes/db.php");
 if(!isset($_SESSION['admin_email']))
 {
     echo "<script>window.open('auth-login.php','_self')</script>";
 } 
 else{
     ?>
    <?php
    include("includes/header.php");
    include("includes/sidebar.php"); 
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
                                    <h4 class="mb-0 font-size-18">View Product</h4>

                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <table id="employee_data" class="table table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Available Quantity</th>
                                                <th>Sold Out</th>
                                                <th>Product Top</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                            
                                            <?php
                                            
                                              $select_cat="SELECT * FROM products  where product_status IN ('yes','no') ORDER BY product_id DESC";
                                              $run_cart=mysqli_query($con, $select_cat);
                                            while ($row_cart=mysqli_fetch_array($run_cart)) {
                                               ?>
                                                <tr>
                                                <td>
                                                <img src="product_images/<?php echo $row_cart["product_img1"]; ?>" width="50" height="50"></td>
                                                <td><?php echo $row_cart["product_title"]; ?></td>
                                                <td><?php echo $row_cart["product_price"]; ?></td>
                                                <td><?php echo $row_cart["product_qty"]; ?></td>
                                                <td><?php echo $row_cart["available_qty"]; ?></td>
                                                <td><?php echo $sold_out=$row_cart['product_qty']-$row_cart['available_qty'];?></td>
                                                <td>
                                                <?php 
                                                if($row_cart['product_status_top']=="yes")
                                                {
                                                ?>
                                               
                                                    <input type="checkbox" id="ch<?php echo $row_cart['product_id']; ?>" class="switch2" name="no" switch="none" checked/>
                                                <label for="ch<?php echo $row_cart['product_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                
                                                    <input type="checkbox" id="ch<?php echo $row_cart['product_id']; ?>" class="switch2" name="yes" switch="none" />
                                                <label for="ch<?php echo $row_cart['product_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                
                                                    <?php 
                                                } 
                                                ?>
                                                </td>
                                                <td>
                                               <?php 
                                                if($row_cart['product_status']=="yes")
                                                {
                                                ?>
                                               
                                                    <input type="checkbox" id="<?php echo $row_cart['product_id']; ?>" class="switch1" name="no" switch="none" checked/>
                                                <label for="<?php echo $row_cart['product_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                
                                                    <input type="checkbox" id="<?php echo $row_cart['product_id']; ?>" class="switch1" name="yes" switch="none" />
                                                <label for="<?php echo $row_cart['product_id']; ?>" data-on-label="On"
                                                    data-off-label="Off"></label>
                                                
                                                    <?php 
                                                } 
                                                ?>
                                                </td>
                                                <td><a href="delete-product.php?product_id=<?php echo $row_cart["product_id"]; ?>" class="btn-delete"><i class="bx bx-trash font-size-20 align-middle mr-1"></i></a><a href="update-product.php?product_id=<?php echo $row_cart["product_id"]; ?>" class="pl-2"><i class="bx bx-edit font-size-20 align-middle mr-1"></i></a> <input type="button" name="view" value="View Details" id="<?php echo $row_cart["product_id"];?>" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light view_data" /></td>
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
                                <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
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
                            window.open('view-product.php','_self');
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
                            var product_id = $(this).attr("id");  
                            $.ajax({  
                                    url:"select.php",  
                                    method:"post",  
                                    data:{product_id:product_id},  
                                    success:function(data){  
                                        $('#employee_detail').html(data);  
                                        $('#dataModal').modal("show");  
                                    }  
                            });  
                        });    
                </script>
                <script>
                    $('.switch1').on('click',function(){
                        var product_ids=$(this).attr("id");
                        var product_idss=$(this).attr("name");
                        $.ajax({
                            url:"product-status.php",
                            method:"POST",
                            data:{product_ids:product_ids,product_idss:product_idss},
                            success:function()
                            {

                            }
                        });
                    });
                </script>
                 <script>
                    $('.switch2').on('click',function(){
                        var product_id=$(this).attr("id");
                        var product_ids=product_id.substring(2,product_id.length);
                        var product_idss=$(this).attr("name");
                        $.ajax({
                            url:"product-status-top.php",
                            method:"POST",
                            data:{product_ids:product_ids,product_idss:product_idss},
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
                        title: "Are you sure?",
                        text: "Delete product.",
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
                        title: "successful delete product.",
                        text: "",
                        icon: "success",
                        buttons: [,"Ok"],
                        successMode: true,
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('view-product.php','_self'); 
                        } else {
                        
                        }
                });
                
           }    
        </script> 
        
<?php
 } 
?>