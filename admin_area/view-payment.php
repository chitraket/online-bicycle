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
                                    <h4 class="mb-0 font-size-18">View Payment</h4>
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
                                                <th>Invoice ID</th>
                                                <th>Transaction ID</th>
                                                <th>Amount</th>
                                                <th>Payment Method</th>
                                                <th>Date</th>
                                               
                                                
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                            
                                            <?php
                                        
                                              $select_cat="SELECT * FROM payments ORDER BY payment_id";
                                              $run_cart=mysqli_query($con, $select_cat);
                                            while ($row_cart=mysqli_fetch_array($run_cart)) {
                                                if($row_cart["txnid"]=="")
                                                {
                                                    $txnid="N/A";
                                                }
                                                else
                                                {
                                                    $txnid=$row_cart["txnid"];
                                                }
                                                    ?>
                                                    <tr>
                                                <td><?php echo $row_cart["invoice_no"]?> </td>
                                                <td><?php echo $txnid?></td>
                                                <td>Rs.<?php echo $row_cart["amount"]?></td>
                                               
                                                <?php 
                                               
                                                    $pay=$row_cart["txnid"]; 
                                                    if($pay=="")
                                                    {
                                                        ?>
                                                        
                                                        <td><span class="badge badge-pill badge-soft-success font-size-10" ><img src="icon/cash-on-delivery.png" style="height:25px;"/>Cash On Delivery</span></td>
                                                        <?php 
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                    <td><span class="badge badge-pill badge-soft-success font-size-10" ><img src="icon/icons8-paytm-32.png" style="height:25px;"/> Online Payment</span></td>
                                                      <?php
                                                    } 
                                                      ?> 
                                                                                                      <?php 
                                                
                                                $date=$row_cart["payment_date"]; 
                                                $orgDate = $date;  
                                                $newDate = date("d-M-Y", strtotime($orgDate));  
                                            ?>
                                            <td><?php echo $newDate; ?></td>
                                           


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
                
               
                <!-- end modal -->
                
               <?php 
                include("includes/footer.php");
               ?>

            </div>
            </form>
            <!-- end main content-->
          <?php
          if(isset($_POST['submit']))
          {
            $update_p_cat = "update customer_orders set order_status='mmmm' where order_id='$id'";
              
            $run_p_cat = mysqli_query($con,$update_p_cat);
            
            if($run_p_cat){

                echo "<script>alert('Your Product Category Has Been Updated')</script>";
                echo "<script>window.open('view-slider.php','_self')</script>";
                
            }
          }
          ?>
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
        
<?php
 } 
?>