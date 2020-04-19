<?php 
include("includes/db.php");
if(isset($_GET['wishlist_id']))
{
    $wishlist_id=base64_decode($_GET['wishlist_id']);
    $delete_wishlist="delete from wishlist where wishlist_id='$wishlist_id'";
    $run_wishlist=mysqli_query($con,$delete_wishlist);
    if($run_wishlist)
    {
        echo "<script>window.open('wishlist.php?m=1','_self')</script>";
    }
}
else{
    echo "<script>window.open('home','_self')</script>";
}
?>