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
            <form action="view-order.php" method="POST">
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">View Order</h4> 
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
                                                <th>Order ID</th>
                                                <th>Billing Name</th>
                                                <th>Date</th>
                                                <th>Total</th>
                                                <th>Payment Method</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                               
                                                
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                            
                                            <?php
                                        
                                              $select_cat="SELECT * FROM orders ";
                                              $run_cart=mysqli_query($con, $select_cat);
                                            while ($row_cart=mysqli_fetch_array($run_cart)) {
                                                $id=$row_cart["id"];
                                                    ?>
                                                    <tr>
                                                <td><?php echo $row_cart["id"]?> </td>
                                                <td><?php echo $row_cart["customer_name"]?></td>
                                                
                                                <?php 
                                                $select_cats="SELECT DISTINCT order_date FROM customer_orders WHERE order_id='$id'";
                                                $run_carts=mysqli_query($con, $select_cats);
                                                while ($row_carts=mysqli_fetch_array($run_carts)) {
                                                    $date=$row_carts["order_date"]; 
                                                    $orgDate = $date;  
                                                    $newDate = date("d-M-Y", strtotime($orgDate));  
                                                ?>
                                                <td><?php echo $newDate; ?></td>
                                                <?php
                                                } 
                                                ?>

                                                <?php
                                                $bill=0;
                                                $total=0;
                                                $select_total="SELECT * FROM customer_orders WHERE order_id='$id'";
                                                $run_total=mysqli_query($con,$select_total);
                                                while ($row_total=mysqli_fetch_array($run_total)) {
                                                    
                                                    $qty=$row_total['qty'];
                                                    $product_id=$row_total['product_id'];
                                                    $select_totals="SELECT * FROM products WHERE product_id='$product_id'";
                                                    $run_totals=mysqli_query($con,$select_totals);
                                                    while ($row_totals=mysqli_fetch_array($run_totals)) {
                                                        $bill=$row_totals['product_price']*$qty;
                                                        //$total=$total+$bill;
                                                    }
                                                    $total+=$bill;
                                                }
                                                
                                                ?>
                                                <td>Rs.<?php echo  $total; ?></td> 
                                                <?php 
                                                $select_pays="SELECT DISTINCT txnid,payment_status FROM customer_orders WHERE order_id='$id'";
                                                $run_pays=mysqli_query($con, $select_pays);
                                                while ($row_pays=mysqli_fetch_array($run_pays)) {
                                                    $pay=$row_pays["txnid"]; 
                                                   // $payment=$row_pays['payment_status'];
                                                    
                                                        if($pay=="")
                                                        {
                                                        ?>
                                                        
                                                        <td><span class="badge badge-pill badge-soft-success font-size-10" ><img src="icon/cash-on-delivery.png" style="height:25px;"/>Cash On Delivery</span></td>
                                                        <?php
                                                        
                                                        }
                                                        else{
                                                            ?>
                                                            <td><span class="badge badge-pill badge-soft-success font-size-10" ><img src="icon/icons8-paytm-32.png" style="height:25px;"/> Online Payment</span></td>
                                                              <?php
                                                        }

                                            }
                                                ?> 
                                                 <?php 
                                                $select_payss="SELECT DISTINCT order_status FROM customer_orders WHERE order_id='$id'";
                                                $run_payss=mysqli_query($con, $select_payss);
                                                while ($row_payss=mysqli_fetch_array($run_payss)) {
                                                    $order_status=$row_payss["order_status"]; 
                                                    if ($order_status=="o") {
                                                        ?>
                                                           <td><span class=" badge badge-pill badge-soft-success font-size-10" ><img src="icon/tick.png" style="height:25px;"/> Ordered And Approved</span></td>
                                                    <?php
                                                        }
                                                    else if($order_status=="p")
                                                    {
                                                    ?>
                                                          <td><span class=" badge badge-pill badge-soft-success font-size-10" ><img src="icon/packing.png" style="height:25px;"/> Packed</span>  </td>
                                                    <?php 
                                                    }
                                                    else if($order_status=="s") {
                                                        ?>
                                                           <td><span class=" badge badge-pill badge-soft-success font-size-10" ><img src="icon/truck.png" style="height:25px;"/> Shipped</span> </td>
                                                    <?php
                                                    }
                                                    else if($order_status=="d")
                                                    {
                                                        ?>
                                                         <td> <span class=" badge badge-pill badge-soft-success font-size-10" ><img src="icon/delivery-man.png" style="height:25px;"/> Delivered</span> </td>
                                                        <?php
                                                    }
                                                    else if($order_status=="c")
                                                    { 
                                                      ?>  
                                                      <td><span class="badge badge-pill badge-soft-danger font-size-10"> <img src="icon/close.png" style="height:25px;"/> Cancal Order</span></td>
                                                    <?php
                                                    } 
                                                    else if($order_status=="r")
                                                    {
                                                        ?>  
                                                      <td><span class="badge badge-pill badge-soft-warning font-size-10" ><img src="icon/return.png" style="height:25px;"/> Returned  Order</span></td>
                                                    <?php
                                                    }
                                                    } 
                                                    ?>
                                                <td><input type="button" name="view" value="View Details" id="<?php echo $row_cart["id"]?>" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light view_data"  /></td>
                                               
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
        });  
        </script> 
        <script>  
                    $(document).ready(function(){  
                        $('.view_data').click(function(){  
                            var order_id = $(this).attr("id");  
                            $.ajax({  
                                    url:"select_1.php",  
                                    method:"post",  
                                    data:{order_id:order_id},  
                                    success:function(data){  
                                        $('#employee_detail').html(data);  
                                        $('#dataModal').modal("show");  
                                    }  
                            });  
                        });  
                    });  
                </script> 
<?php
 } 
?>