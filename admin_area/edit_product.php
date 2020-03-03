<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_product'])){
        
        $edit_id = $_GET['edit_product'];
        
        $get_p = "select * from products where product_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['product_id'];
        
        $p_title = $row_edit['product_title'];
        
        $p_cat = $row_edit['p_cat_id'];
        
        $cat = $row_edit['cat_id'];
        
        $p_image1 = $row_edit['product_img1'];
        
        $p_image2 = $row_edit['product_img2'];
        
        $p_image3 = $row_edit['product_img3'];
        
        $p_price = $row_edit['product_price'];
        
        $p_size=$row_edit['product_size'];

        $p_frame=$row_edit['product_frame'];

        $p_qty=$row_edit['product_qty'];

        $p_weight=$row_edit['product_weight'];

        $p_front_suspension=$row_edit['product_front_suspension'];

        $p_rear_suspension=$row_edit['product_rear_suspension'];

        $p_front_derailleur=$row_edit['product_front_derailleur'];

        $p_rear_derailleur=$row_edit['product_rear_derailleur'];

        $p_wheels=$row_edit['product_wheels'];

        $p_tires=$row_edit['product_tires'];

        $p_shifter=$row_edit['product_shifter'];

        $p_crankset=$row_edit['product_crankset'];

        $p_freewheels=$row_edit['product_freewheels'];

        $p_bb_set=$row_edit['product_bb_set'];

        $p_cassette=$row_edit['product_cassette'];

        $p_colour=$row_edit['product_colour'];

        $p_pedals=$row_edit['product_pedals'];

        $p_seat_post=$row_edit['product_seat_post'];

        $p_handleber=$row_edit['product_handleber'];

        $p_stem=$row_edit['product_stem'];

        $p_headset=$row_edit['product_headset'];

        $p_brakeset=$row_edit['product_brakeset'];

        $p_desc = $row_edit['product_desc'];
    
        //$p_keywords = $row_edit['product_keywords'];
        
       // $p_desc = $row_edit['product_desc'];
        
    }
        
        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";
        
        $run_p_cat = mysqli_query($con,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
        $get_cat = "select * from categories where cat_id='$cat'";
        
        $run_cat = mysqli_query($con,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['cat_title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Products
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Insert Product 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="product_cat" class="form-control"><!-- form-control Begin -->
                              
                              <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from product_categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['p_cat_id'];
                                  $p_cat_title = $row_p_cats['p_cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="cat" class="form-control"><!-- form-control Begin -->
                              
                              <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img1" type="file" class="form-control" required>
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Product qty </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="product_qty" type="text" class="form-control" required value="<?php echo $p_qty; ?>">
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Product Size </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_size" type="text" class="form-control" required value="<?php echo $p_size; ?>">
                            
                        </div><!-- col-md-6 Finish -->
                         
                     </div><!-- form-group Finish -->
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Product Frame </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_frame" type="text" class="form-control" required value="<?php echo $p_frame; ?>">
                            
                        </div><!-- col-md-6 Finish -->
                         
                     </div><!-- form-group Finish -->
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Product Weight </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_weight" type="text" class="form-control" required value="<?php echo $p_weight; ?>">
                            
                        </div><!-- col-md-6 Finish -->
                         
                     </div><!-- form-group Finish -->
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Product Front Suspension </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_front_suspension" type="text" class="form-control" required value="<?php echo $p_front_suspension; ?>">
                            
                        </div><!-- col-md-6 Finish -->
                         
                     </div><!-- form-group Finish -->
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Product Rear Suspension </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_rear_suspension" type="text" class="form-control" required value="<?php echo $p_rear_suspension;?>">
                            
                        </div><!-- col-md-6 Finish -->
                         
                     </div><!-- form-group Finish -->
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Product Front Derailleur</label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_front_derailleur" type="text" class="form-control" required value="<?php echo $p_front_derailleur; ?>">
                            
                        </div><!-- col-md-6 Finish -->
                         
                     </div><!-- form-group Finish -->
                     
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">Product Rear Derailleur</label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_rear_derailleur" type="text" class="form-control" required value="<?php echo $p_rear_derailleur; ?>">
                            
                        </div><!-- col-md-6 Finish -->
                         
                     </div><!-- form-group Finish -->
                               
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Product Wheels</label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_wheels" type="text" class="form-control" required value="<?php echo $p_wheels; ?>">
                            
                        </div><!-- col-md-6 Finish -->
                         
                     </div><!-- form-group Finish -->
     
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">  Product Tires </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name=" product_tires" type="text" class="form-control" required value="<?php echo $p_tires; ?>">
                            
                        </div><!-- col-md-6 Finish -->
                         
                     </div><!-- form-group Finish -->
 
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">  Product Shifter </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_shifter" type="text" class="form-control" required value="<?php echo $p_shifter; ?>">
                            
                        </div><!-- col-md-6 Finish -->
                     </div><!-- form-group Finish -->
                     
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">  Product Crankset </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_crankset" type="text" class="form-control" required value="<?php echo $p_crankset; ?>">
                            
                        </div><!-- col-md-6 Finish -->  
                     
                     </div><!-- form-group Finish -->
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">  Product Freewheels </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_freewheels" type="text" class="form-control" required value="<?php echo $p_freewheels;  ?>">
                            
                        </div><!-- col-md-6 Finish -->  
                     
                     </div><!-- form-group Finish -->
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">  Product BB Set </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_bb_set" type="text" class="form-control" required value="<?php echo $p_bb_set; ?>">
                            
                        </div><!-- col-md-6 Finish --> 
                     </div><!-- form-group Finish --> 
                     
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">  Product Cassette </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_cassette" type="text" class="form-control" required value="<?php echo $p_cassette; ?>">
                            
                        </div><!-- col-md-6 Finish --> 
                     </div><!-- form-group Finish --> 
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Product Colour </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_colour" type="text" class="form-control" required value="<?php echo $p_colour; ?>">
                            
                        </div><!-- col-md-6 Finish --> 
                     </div><!-- form-group Finish --> 
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Product Pedals </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_pedals" type="text" class="form-control" required value="<?php echo $p_pedals; ?>">
                            
                        </div><!-- col-md-6 Finish --> 
                     </div><!-- form-group Finish --> 
                                          
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Product Seat Post </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_seat_post" type="text" class="form-control" required value="<?php echo $p_seat_post; ?>">
                            
                        </div><!-- col-md-6 Finish -->  
                     </div><!-- form-group Finish -->
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">  Product Handlebar </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_handleber" type="text" class="form-control" required value="<?php echo $p_handleber; ?>">
                            
                        </div><!-- col-md-6 Finish -->   
                     </div><!-- form-group Finish -->
                    
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">   Product Stem </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name=" product_stem" type="text" class="form-control" required value="<?php echo $p_stem; ?>">
                            
                        </div><!-- col-md-6 Finish -->
                     </div><!-- form-group Finish -->
 
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">   Product Headset </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_headset" type="text" class="form-control" required value="<?php echo $p_headset; ?>">
                            
                        </div><!-- col-md-6 Finish -->                      
 
                     </div><!-- form-group Finish -->
             
                     <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label">  Product Brakeset  </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="product_brakeset" type="text" class="form-control" required value="<?php echo $p_brakeset; ?>">
                            
                        </div><!-- col-md-6 Finish -->                      
 
                     </div><!-- form-group Finish -->            
 
                    <div class="form-group"><!-- form-group Begin -->
                        
                       <label class="col-md-3 control-label"> Product Desc </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <textarea name="product_desc" cols="19" rows="6" class="form-control" ></textarea>
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
   // $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    $product_size=$_POST['product_size'];
    $product_frame=$_POST['product_frame'];
    $product_qty=$_POST['product_qty'];
    $product_weight=$_POST['product_weight'];
    $product_front_suspension=$_POST['product_front_suspension'];
    $product_rear_suspension=$_POST['product_rear_suspension'];
    $product_front_derailleur=$_POST['product_front_derailleur'];
    $product_rear_derailleur=$_POST['product_rear_derailleur'];
    $product_wheels=$_POST['product_wheels'];
    $product_tires=$_POST['product_tires'];
    $product_shifter=$_POST['product_shifter'];
    $product_crankset=$_POST['product_crankset'];
    $product_freewheels=$_POST['product_freewheels'];
    $product_bb_set=$_POST['product_bb_set'];
    $product_cassette=$_POST['product_cassette'];
    $product_colour=$_POST['product_colour'];
    $product_pedals=$_POST['product_pedals'];
    $product_seat_post=$_POST['product_seat_post'];
    $product_handleber=$_POST['product_handleber'];
    $product_stem=$_POST['product_stem'];
    $product_headset=$_POST['product_headset'];
    $product_brakeset=$_POST['product_brakeset'];
    $product_desc = $_POST['product_desc'];

    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");
    
    $update_product = "update products set p_cat_id='$product_cat',cat_id='$cat',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_desc='$product_desc',product_qty='$product_qty',available_qty='$product_qty',product_size='$product_size',product_frame='$product_frame',product_weight='$product_weight',product_front_suspension='$product_front_suspension',product_rear_suspension='$product_rear_suspension',product_front_derailleur='$product_front_derailleur',product_rear_derailleur='$product_rear_derailleur',product_wheels='$product_wheels',product_tires='$product_title',product_shifter='$product_shifter',product_crankset='$product_crankset',product_freewheels='$product_freewheels',product_bb_set='$product_bb_set',product_cassette='$product_cassette',product_colour='$product_colour',product_pedals='$product_pedals',product_seat_post='$product_seat_post',product_handleber='$product_handleber',product_stem='$product_stem',product_headset='$product_headset',product_brakeset='$product_brakeset' where product_id='$p_id'";
    
    $run_product = mysqli_query($con,$update_product);
    
    if($run_product){
        
       echo "<script>alert('Your product has been updated Successfully')</script>"; 
        
       echo "<script>window.open('index.php?view_products','_self')</script>"; 
        
    }
    
}

?>


<?php } ?>