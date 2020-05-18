<div class="tab-pane fade" id="delete-account" role="tabpanel">

    <form action="" method="post">
        <!-- form Begin -->

        <div class="single-input-item">
            <button name="Yes" class="btn btn-sqr">Yes, I Want To Delete</button>
            <button name="No" class="btn btn-sqr">No, I Dont Want To Delete</button>
        </div>


    </form><!-- form Finish -->
</div>

<?php 

$c_email = $_SESSION['customer_email'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from customers where customer_email='$c_email'";
    
    $run_delete_customer = mysqli_query($con,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Successfully delete your account, feel sorry about this. Good Bye')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('myaccount.php','_self')</script>";
    
}

?>