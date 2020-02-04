<div class="tab-pane fade" id="change-pass" role="tabpanel">

                                                <div class="myaccount-content">
                                                    <h5>Change Password</h5>
                                                    <div class="account-details-form">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">Old Password</label>
                                                                        <input type="text" id="old_pass" name="old_pass" placeholder="Old Password"  required />
                                                                    </div>
                                                                </div> 
                                                                <div class="col-lg-12">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">New Password</label>
                                                                        <input type="text" id="new_pass" name="new_pass" placeholder="New Password" required/>
                                                                    </div>
                                                                </div> 

                                                                <div class="col-lg-12">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">Old Password</label>
                                                                        <input type="text" id="new_pass_again" name="new_pass_again" placeholder="First Name"  />
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="single-input-item">
                                                                <button name="submit" class="btn btn-sqr">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
</div>                                       

<?php 

if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Your password has been updated')</script>";
        
        echo "<script>window.open('myaccount.php','_self')</script>";
        
    }
    
}
?>