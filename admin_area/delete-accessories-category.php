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
    $subject=explode(",",$admin_permission);
    $paga=14;
    if(in_array($paga,$subject))
    {
        if (isset($_GET['accessories_id'])) {
            $delete_id = $_GET['accessories_id'];
            
            $select_product="select * from accessories where accessories_category='$delete_id'";
            $run_product=mysqli_query($con,$select_product);
            while($row_product=mysqli_fetch_array($run_product))
            {
                $accessories_ids=$row_product['accessories_id'];
                $update_review="delete from review where product_id='$accessories_ids'";
                mysqli_query($con,$update_review);
                $update_Wishlist="delete from wishlist where product_id='$accessories_ids'";
                mysqli_query($con,$update_Wishlist);
            }
            
            $delete_pro = "update  accessories_category set accessories_category_status='delete' where accessories_category_id='$delete_id'";
            $run_delete = mysqli_query($con, $delete_pro);
            $delete_product = "update  accessories set accessories_status='delete' where accessories_category='$delete_id'";
            mysqli_query($con, $delete_product);
            
            
            if ($run_delete) {            
                echo "<script>window.open('view-accessories-category.php?m=1','_self')</script>";
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
            //window.open('index.php','_self');
        } 
        else {
        }
});
    </script>
    <?php
        }
    }
?>