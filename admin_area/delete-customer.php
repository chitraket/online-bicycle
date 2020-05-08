<?php
 session_start();
 include("includes/db.php");
 if(!isset($_SESSION['admin_email']))
 {
     echo "<script>window.open('auth-login.php','_self')</script>";
 } 
 else{
    $admin_email=$_SESSION['admin_email'];
$query_per="select * from admins where admin_email='$admin_email' and admin_status='yes'";
    $run_query_per=mysqli_query($con,$query_per);
    while($row_query_per=mysqli_fetch_array($run_query_per))
    {
         $admin_permission=$row_query_per['admin_permission'];                                
    } 
$paga=23;
    $subject=explode(",",$admin_permission);
  if(in_array($paga,$subject))
        {
    if (isset($_GET['customer_id'])) {
        $delete_id = $_GET['customer_id'];
        
        $customer_email='';
        $select_customer="select * from customers where customer_id='$delete_id'";
        $run_customer=mysqli_query($con,$select_customer);
        while($row_customer=mysqli_fetch_array($run_customer))
        {
            $customer_email=$row_customer['customer_email'];
            
        }
       
        $delete_customer="delete from review where customer_email='$customer_email'";
        mysqli_query($con,$delete_customer);

        $delete_pro = "delete from customers where customer_id='$delete_id'";
        
        $run_delete = mysqli_query($con, $delete_pro);

     if ($run_delete) {

            echo "<script>window.open('view-customer.php?m=1','_self')</script>";
        }
    } ?>
<?php
 }

else{
    include("includes/header.php");
     include("includes/sidebar.php"); 
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