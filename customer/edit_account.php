<?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_lname=$row_customer['customer_lname'];

$customer_email = $row_customer['customer_email'];

$customer_state = $row_customer['customer_state'];

$customer_city = $row_customer['customer_city'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$customer_image = $row_customer['customer_image'];

?>
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Account Details</h5>
                                                    <div class="account-details-form">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">First
                                                                            Name</label>
                                                                        <input type="text" id="first-name" name="c_name" placeholder="First Name" value="<?php echo $customer_name;?> " />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="last-name" class="required">Last
                                                                            Name</label>
                                                                        <input type="text" id="last-name" name="c_lname" placeholder="Last Name" value="<?php echo $customer_lname; ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="email" class="required">Email Addres</label>
                                                                <input type="email" id="email" name="c_email" placeholder="Email Address" value="<?php  echo $customer_email;?>" />
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="display-address" class="required">address</label>
                                                                <input type="text" id="display-address" name="c_address" placeholder="address" value="<?php echo $customer_address; ?>" />
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="display-city" class="required">city</label>
                                                                <input type="text" id="display-city" name="c_city" placeholder="city" value="<?php echo $customer_city; ?>" />
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="display-state" class="required">state</label>
                                                                <input type="text" id="display-state" name="c_state" placeholder="state" value="<?php echo $customer_state; ?>" />
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="display-contact" class="required">contact number</label>
                                                                <input type="text" id="display-contact" name="c_contact" placeholder="Display Name" value="<?php echo $customer_contact; ?>" />
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="display-image" class="required">image</label>
                                                                <input type="file" id="display-image" name="c_image"  />
                                                                <img class="img-responsive my-4 " src="customer_images/<?php echo $customer_image; ?>" alt="Costumer Image">
                                                            </div>
                                                            <!--<fieldset>
                                                                <legend>Password change</legend>
                                                                <div class="single-input-item">
                                                                    <label for="current-pwd" class="required">Current
                                                                        Password</label>
                                                                    <input type="password" id="current-pwd" placeholder="Current Password" />
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="new-pwd" class="required">New
                                                                                Password</label>
                                                                            <input type="password" id="new-pwd" placeholder="New Password" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="confirm-pwd" class="required">Confirm
                                                                                Password</label>
                                                                            <input type="password" id="confirm-pwd" placeholder="Confirm Password" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>-->
                                                            <div class="single-input-item">
                                                                <button name="update" class="btn btn-sqr">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_name = $_POST['c_name'];
    
    $c_lname=$_POST['c_lname'];

    $c_email = $_POST['c_email'];
    
    $c_state = $_POST['c_state'];
    
    $c_city = $_POST['c_city'];
    
    $c_address = $_POST['c_address'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
    
    $update_customer = "update customers set customer_name='$c_name',customer_lname='$c_lname',customer_email='$c_email',customer_state='$c_state',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact',customer_image='$c_image' where customer_id='$update_id' ";
    
    $run_customer = mysqli_query($con,$update_customer);
    
    if($run_customer){
        
        echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}

?>