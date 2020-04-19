
<?php
$active='Accessories';
include("includes/header.php");

?>
<?php
if(!isset($_GET['accessories_id']))
{
    ?>
    <script>
        window.open('home','_self');
    </script>
    <?php 
}
else{
    $accessories_id=base64_decode($_GET['accessories_id']);
    $get_accessories="select * from accessories where accessories_status='yes' and accessories_id=$accessories_id";
    $run_accessories=mysqli_query($con,$get_accessories);
    if(!$run_accessories)
    {
        ?>
        <script>
        window.open('home','_self');
    </script>
    <?php 
    }
    else
    {
    $row_accessories=mysqli_fetch_array($run_accessories);
    $accessories_brand=$row_accessories['accessories_brand'];
    $accessories_category=$row_accessories['accessories_category'];
    $accessories_name=$row_accessories['accessories_name'];
    $accessories_image_1=$row_accessories['accessories_image_1'];
    $accessories_image_2=$row_accessories['accessories_image_2'];
    $accessories_image_3=$row_accessories['accessories_image_3'];
    $accessories_qty=$row_accessories['accessories_qty'];
    $available_qty=$row_accessories['available_qty'];
    $accessories_material=$row_accessories['accessories_material'];
    $pro_label=$row_accessories['accessories_label'];
    $pro_discount_price=$row_accessories['accessories_discount_price'];
    $pro_discount=$row_accessories['accessories_discount'];
    if($accessories_material=="null")
    {
        $accessories_material="N/A";
    }
    else{
        $accessories_material=$row_accessories['accessories_material'];
    }
    $accessories_color=$row_accessories['accessories_color'];
    if($accessories_color=="null")
    {
        $accessories_color="N/A";
    }
    else
    {
        $accessories_color=$row_accessories['accessories_color'];
    }
    $accessories_prices=$row_accessories['accessories_prices'];
    $accessories_desc=$row_accessories['accessories_desc'];
    $get_manufacturer="select * from accessories_brand where accessories_brand_id=$accessories_brand";
    $run_manufacturer=mysqli_query($con,$get_manufacturer);
    $row_manufacturer=mysqli_fetch_array($run_manufacturer);
    $accessories_brand=$row_manufacturer['accessories_brand'];
    }
}
?>

    <!-- Start Header Area -->
   
    <!-- end Header Area -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="accessories">Accessories</a></li>
                                    <li class="breadcrumb-item active" >
                                       <?php echo $accessories_name ?> 
                                    </li>                                
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        <?php
                                        if($accessories_image_1=="")
                                        {

                                        } 
                                        else
                                        {
                                        ?>
                                            <div class="pro-large-img img-zoom">
                                                <img src="admin_area/accessories_images/<?php echo $accessories_image_1 ?>" alt="product-details" />
                                            </div>
                                        <?php 
                                        }
                                        ?>
                                         <?php
                                        if($accessories_image_2=="")
                                        {

                                        } 
                                        else
                                        {
                                        ?>
                                            <div class="pro-large-img img-zoom">
                                                <img src="admin_area/accessories_images/<?php echo $accessories_image_2 ?>" alt="product-details" />
                                            </div>
                                        <?php 
                                        }
                                        ?>
                                        <?php 
                                        if($accessories_image_3=="")
                                        {
                                        }
                                        else
                                        {?>
                                            <div class="pro-large-img img-zoom">
                                                <img src="admin_area/accessories_images/<?php echo $accessories_image_3 ?>" alt="product-details" />
                                            </div>
                                        <?php
                                        } 
                                        ?>
                                        <?php 
                                        if($accessories_image_3=="")
                                        {
                                        }
                                        else
                                        {?>
                                            <div class="pro-large-img img-zoom">
                                                <img src="admin_area/accessories_images/<?php echo $accessories_image_3 ?>" alt="product-details" />
                                            </div>
                                        <?php
                                        } 
                                        ?>
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <?php
                                        if($accessories_image_1=="")
                                        {

                                        } 
                                        else
                                        {
                                        ?>
                                            <div class="pro-nav-thumb">
                                                <img src="admin_area/accessories_images/<?php echo $accessories_image_1 ?>" alt="product-details" />
                                            </div>
                                        <?php 
                                        }?>
                                         <?php
                                        if($accessories_image_2=="")
                                        {

                                        } 
                                        else
                                        {
                                        ?>
                                            <div class="pro-nav-thumb">
                                                <img src="admin_area/accessories_images/<?php echo $accessories_image_2 ?>" alt="product-details" />
                                            </div>
                                        <?php 
                                        }?>
                                        <?php
                                        if($accessories_image_3=="")
                                        {
                                        }
                                        else
                                        {?>
                                            <div class="pro-nav-thumb">
                                                <img src="admin_area/accessories_images/<?php echo $accessories_image_3 ?>" alt="product-details" />
                                            </div>
                                        <?php
                                        } 
                                        ?>
                                        <?php 
                                         if($accessories_image_3=="")
                                        {
                                        }
                                        else
                                        {?>
                                            <div class="pro-nav-thumb">
                                                <img src="admin_area/accessories_images/<?php echo $accessories_image_3 ?>" alt="product-details" />
                                            </div>
                                        <?php 
                                        }?>
                                    </div>
                                    
                                    <div class="product-badge">
                                        <?php
                                        if($pro_label=="new")
                                        { 
                                        ?>
                                            <div class="product-label new">
                                                <span>New</span>
                                            </div>
                                            <?php
                                        } 
                                        if($pro_label=="sale")
                                        {
                                            ?>
                                            <div class="product-label new">
                                                <span>Sale</span>
                                            </div>
                                            <div class='product-label discount'>
                                                <span><?php echo $pro_discount; ?>%</span>
                                            </div>
                                            <?php
                                        } 
                                            ?>
                                         </div>
                                </div>
                                <div class="col-lg-7">
                              
                                    <div class="product-details-des">
                                        
                                        <div class="manufacturer-name">
                                           <?php echo $accessories_brand;?>
                                        </div>
                                        <h3 class="product-name"><?php  echo $accessories_name;?></h3>
                                       <div class="ratings d-flex">
                                       <?php
                                       $pro_idss=base64_decode($_GET['accessories_id']);
                                       //$output=0;
                                        $query="select AVG(rating) as rating from review where product_id='$pro_idss' and status='yes' and papage='1'";
                                        $statement=mysqli_query($con,$query);
                                        while($ruo=mysqli_fetch_array($statement))
                                        {
                                        $output=round($ruo['rating']);
                                        } 
                                        $select_reviewss="select * from review where product_id='$pro_idss' and status='yes' and papage='1'";
                                        $run_reviewss=mysqli_query($con,$select_reviewss);
                                        $total_reviewss=mysqli_num_rows($run_reviewss);
                                        if($output==0)
                                        {
                                        ?>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span><?php echo $total_reviewss; ?> Reviews</span>
                                            </div>
                                            <?php
                                        }
                                       else if($output==1)
                                        {
                                            ?>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span><?php echo $total_reviewss; ?> Reviews</span>
                                            </div>
                                            <?php
                                        }
                                       else if($output==2)
                                        {
                                            ?>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span><?php echo $total_reviewss; ?> Reviews</span>
                                            </div>
                                            <?php
                                        }
                                        else if($output==3)
                                        {
                                            ?>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span><?php echo $total_reviewss; ?> Reviews</span>
                                            </div>
                                            <?php
                                        }
                                        else if($output==4)
                                        {
                                            ?>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span><?php echo $total_reviewss; ?> Reviews</span>
                                            </div>
                                            <?php
                                        }
                                        else if($output==5)
                                        {
                                            ?>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span><?php echo $total_reviewss; ?> Reviews</span>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        </div>
                                        <div class="price-box">
                                        <?php
                                        if($pro_label=="new")
                                        {
                                        ?>
                                            <span class="price-regular">Rs.<?php echo $accessories_prices; ?></span>
                                            <span class="price-old"><del></del></span>
                                        <?php
                                        } 
                                        if($pro_label=="sale")
                                        {
                                            ?>
                                            <span class="price-regular">Rs.<?php echo $accessories_prices; ?></span>
                                            <span class="price-old"><del>Rs.<?php echo $pro_discount_price; ?></del></span>
                                            <?php 
                                        }
                                        ?>
                                        </div>
                                        <!--<h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                        <div class="product-countdown" data-countdown="2019/12/20"></div>-->
                                        <div class="availability">
                                           <?php  
                                           if($available_qty<=0)
                                            {
                                                
                                             echo "  <span style='color: red;'>out of stock</span>";
                                               
                                            }
                                            else
                                            {
                                              echo " <span style='color: green'> $available_qty in stock </span>";
                                            }
                                            ?>
                                        </div>
                                        <p class="pro-desc"><?php echo $accessories_desc; ?></p>
                                       
                                        
                                        
                                        <?php 
                                        if(isset($_POST['add_cart'])){
                                            
                                            $p_id = $_POST['accessories_id'];
                                            $product_qty = $_POST['accessories_qty'];
                                            $product_img=$_POST['accessories_img'];
                                            $product_price=$_POST['accessories_price'];
                                            $product_name=$_POST['accessories_name'];
                                            $product_size="N/A";
                                                if(isset($_SESSION[$product_name.$p_id]))
                                                {
                                                    ?>
                                                    <script type="text/javascript">
                                                        swal({
                                                            title: "Your product is alrady added in cart",
                                                            text: "",
                                                            icon: "warning",
                                                            buttons:[,"OK"],
                                                            successMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                            if (willDelete) {
                                                                window.open('accessories-details?accessories_id=<?php echo base64_encode($p_id); ?>','_self');
                                                            } else {
                                                            
                                                            }
                                                    });
                                                </script>
                                                    <?php 
                                                    goto end;
                                                }

                                                if ($product_qty>$available_qty) 
                                                {
                                                    ?>
                                                    <script type="text/javascript">
                                                        swal({
                                                            title: "Please enter lower quantity",
                                                            text: "",
                                                            icon: "warning",
                                                            buttons:[,"OK"],
                                                            successMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                            if (willDelete) {
                                                                window.open('accessories-details?accessories_id=<?php echo base64_encode($p_id); ?>','_self');
                                                            } else {
                                                            
                                                            }
                                                    });
                                                </script>
                                                    <?php 
                                                }
                                                else
                                                {
                                                    $papage=1;
                                                    add_cart($p_id,$product_img,$product_qty,$product_name,$product_price,$product_size,$papage);
                                                }
                                              
                                                
                                            } 
                                            
                                            end:
                                        ?>

                                        <form action="#" method="POST">
                                        <div class="quantity-cart-box d-flex align-items-center">
                                       

                                        <h6 class="option-title">qty:</h6>
                                            <div class="quantity">
                                                
                                                <div class="pro-qty"style="width: 110px;" >
                                                    <input type="number" min="1" value="1"  name="accessories_qty" style="width: 40px;">
                                                </div>
                                            </div>
                    
                                            
                                       
                                       <?php  if($available_qty<=0)
                                       {

                                       }
                                    else
                                    {
                                       
                                        ?>
                                        
                                        
                                        <input type="hidden" name="accessories_id" value="<?php echo $accessories_id; ?>"/>
                                        <input type="hidden" name="accessories_img" value="<?php echo $accessories_image_1; ?>"/>
                                        <input type="hidden" name="accessories_price" value="<?php echo $accessories_prices; ?>"/>
                                        <input type="hidden" name="accessories_name" value="<?php echo $accessories_name; ?>"/>
                                      
                                            <div class="action_link" style="margin-top: 0px;">
                                          
                                            <input type="submit" class="btn btn-cart2" name="add_cart" value="Add to cart" >
                                    
                                            </div>
                                            <?php 
                                    }
                                   
                                       ?>
                                        </div>
                                    </form>
                                    <div class="color-option">
                                            
                                            </div>
                                            <?php
                                             if(isset($_SESSION['customer_email']))
                                             { 
                                            ?>
                                            <form method="POST" action="">
                                            <div class="useful-links">
                                            <button  type="submit" name="submit"  title="Wishlist" ><i class="pe-7s-like"></i> Wishlist</button>
                                            </div>
                                            </form>
                                            <?php
                                            if(isset($_POST['submit']))
                                            {
                                                $customer_emailss=$_SESSION['customer_email'];
                                                $product_idss=base64_decode($_GET['accessories_id']);
                                                $select_wishlist="select * from wishlist where customer_email='$customer_emailss' and product_id='$product_idss'";
                                                $run_wishlist=mysqli_query($con,$select_wishlist);
                                                if(mysqli_num_rows($run_wishlist)>0)
                                                {
                                                    ?>
                                                    <script type="text/javascript">
                                                    swal({
                                                        title: "You have already add product to wishlist",
                                                        text: "",
                                                        icon: "warning",
                                                        buttons:[,"OK"],
                                                        successMode: true,
                                                })
                                                .then((willDelete) => {
                                                        if (willDelete) {
                                                            window.open('accessories-details?accessories_id=<?php echo base64_encode($product_idss); ?>','_self');
                                                        } else {
                                                        
                                                        }
                                                });
                                                    </script>
                                                    <?php
                                                }
                                                else
                                                {
                                                    $papage=1;
                                                    wishlist($product_idss,$customer_emailss,$papage);
                                                }
                                            }
                                             }
                                            else
                                            {
    
                                            } 
                                            ?>
                                            <div class="like-icon">
                                                <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                                <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                                <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                                <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#tab_one">description</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_two">Information</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_three">reviews</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p>
                                                    <?php echo $accessories_desc ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>Material</td>
                                                            <td><?php echo $accessories_material ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Color</td>
                                                            <td><?php echo $accessories_color ?></td>
                                                        </tr>
                                                          
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="tab_three">
                                                <form action="#" method="POST" class="review-form">
                                                    <?php
                                                    $product_ids=base64_decode($_GET['accessories_id']);
                                                    $select_reviews="select * from review where product_id='$product_ids' and status='yes' and papage='1'";
                                                    $run_reviews=mysqli_query($con,$select_reviews);
                                                    $total_reviews=mysqli_num_rows($run_reviews);
                                                    $select_a="select * from accessories where accessories_id='$product_ids' and accessories_status='yes'";
                                                    $run_a=mysqli_query($con,$select_a);
                                                    while($row_a=mysqli_fetch_array($run_a))
                                                    {
                                                        $product_namess=$row_a['accessories_name'];
                                                    }
                                                    ?>
                                                <h5><?php echo $total_reviews; ?> review for <span><?php echo $product_namess; ?></span></h5>
                                                    <?php
                                                   
                                                    $select_review="select * from review where product_id='$product_ids'and status='yes' and papage='1'";
                                                     $run_review=mysqli_query($con,$select_review);
                                                     while($row_review=mysqli_fetch_array($run_review))
                                                     {
                                                         $customer_emailss=$row_review['customer_email'];
                                                        $rating=$row_review['rating'];
                                                        $time=$row_review['time']; 
                                                        $orgDate = $time;  
                                                        $newDate = date("d-M-Y", strtotime($orgDate));  
                                                        $message=$row_review['message'];
                                                     
                                                    ?>
                                                 
                                                    <div class="total-reviews">
                                                        <?php
                                                        $customer_review="select * from customers where customer_email='$customer_emailss' and customer_status='yes'";
                                                        $run_customer_review=mysqli_query($con,$customer_review);
                                                        while($row_customer_review=mysqli_fetch_array($run_customer_review))
                                                        {
                                                            ?>
                                                            <div class="rev-avatar">
                                                            <img src="customer/customer_images/<?php echo $row_customer_review['customer_image']; ?>" alt="">
                                                        </div>
                                                           
                                                        
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <?php
                                                                if($rating==1)
                                                                {
                                                                ?>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                                <?php 
                                                                }
                                                                else if($rating==2){
                                                                    ?>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                                    <?php
                                                                }
                                                                else if($rating==3)
                                                                {
                                                                    ?>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star-o"></i></span>
                                                                    <span class="good"><i class="fa fa-star-o"></i></span>
                                                                    <?php
                                                                }
                                                                else if($rating==4)
                                                                {
                                                                    ?>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star-o"></i></span>
                                                                    <?php 
                                                                }
                                                                else if($rating==5)
                                                                {
                                                                    ?>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                    <?php
                                                                }
                                                                ?>
                                                                

                                                            </div>
                                                            <div class="post-author">
                                                                <p><span><?php echo $row_customer_review['customer_name']; ?>-</span> <?php echo $newDate; ?></p>
                                                            </div>
                                                            <p><?php echo $message; ?></p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        }
                                                    }
                                                   
                                                    ?>
                                                    <?php
                                                    if(isset($_SESSION['customer_email']))
                                                    { 
                                                    ?>
                                                    
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Review</label>
                                                            <textarea class="form-control" name="message" required> </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="rating" checked>
                                                            &nbsp;
                                                            <input type="radio" value="2" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="rating">
                                                            &nbsp;Good
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <input type="submit" class="btn btn-sqr" value="Continue" name="submits" />
                                                    </div>
                                                    <?php
                                                    }
                                                    else
                                                    {

                                                    }
                                                    ?>

                                                </form> <!-- end of review-form -->
                                            </div>
                                        </div>
                                        <?php 
                                        if(isset($_POST['submits']))
                                        {
                                            $message=$_POST['message'];
                                            $rating=$_POST['rating'];
                                            $pro_ids=base64_decode($_GET['accessories_id']);
                                            $customer_email=$_SESSION['customer_email'];
                                            $select_revieww="select * from review where customer_email='$customer_email'  and  product_id='$pro_ids' and papage='1'";
                                            $run_revieww=mysqli_query($con,$select_revieww);
                                           if(mysqli_num_rows($run_revieww)>0)
                                           {
                                                ?>
                                                 <script type="text/javascript">
                                                swal({
                                                    title: "You have already give review",
                                                    text: "",
                                                    icon: "warning",
                                                    buttons:[,"OK"],
                                                    successMode: true,
                                            })
                                            .then((willDelete) => {
                                                    if (willDelete) {
                                                        window.open('accessories-details?accessories_id=<?php echo base64_encode($pro_ids); ?>','_self');
                                                    } else {
                                                    
                                                    }
                                            });
                                                </script>
                                                <?php
                                           }
                                            else{

                                            
                                            $insert_review="insert into review(product_id,papage,customer_email,message,time,rating,status) values('$pro_ids','1','$customer_email','$message',NOW(),'$rating','yes')";
                                            $run_review=mysqli_query($con,$insert_review);
                                            if($run_review)
                                            {
                                               ?>
                                               <script type="text/javascript">
                                                swal({
                                                    title: "Thank You For Review.",
                                                    text: "",
                                                    icon: "success",
                                                    buttons:[,"OK"],
                                                    successMode: true,
                                            })
                                            .then((willDelete) => {
                                                    if (willDelete) {
                                                        window.open('accessories-details?accessories_id=<?php echo base64_encode($pro_ids); ?>','_self');
                                                    } else {
                                                    
                                                    }
                                            });
                                                </script>
                                               <?php
                                            }
                                        }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Related Accessories</h2>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">

                            <?php
                            
                                $get_products="select * from accessories order by rand() DESC LIMIT 0,8"; 
                                $run_products=mysqli_query($con,$get_products);
                                while($row_products=mysqli_fetch_array($run_products))
                                {
                                    $pro_id=$row_products['accessories_id'];
                                    $pro_title=$row_products['accessories_name'];
                                    $pro_price=$row_products['accessories_prices'];
                                    $pro_img1=$row_products['accessories_image_1'];
                                    $pro_img2=$row_products['accessories_image_2'];
                                    ?>
                                    
                                    <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="accessories-details?accessories_id=<?php echo base64_encode($pro_id);?>">
                                            <img class="pri-img" src="admin_area/accessories_images/<?php echo $pro_img1;?>" alt="product">
                                            <img class="sec-img" src="admin_area/accessories_images/<?php echo $pro_img2;?>" alt="product">
                                        </a>
                                        <div class="product-badge">
                                            <div class="product-label new">
                                                <span>new</span>
                                            </div>
                                          <!--  <div class='product-label discount'>
                                                <span>10%</span>
                                            </div>-->
                                        </div>
                                       <!-- <div class="button-group">
                                            <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                            <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                            
                                        </div>-->
                                        <!--<div class='cart-hover'>
                                            <button class='btn btn-cart'>add to cart</button>
                                        </div>-->
                                  </figure>
                                        <div class="product-caption text-center">
                                            <h6 class="product-name">
                                                <a href="accessories-details?accessories_id=<?php echo base64_encode($pro_id);?>"><?php echo $pro_title;?></a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Rs.<?php echo  $pro_price;?></span>
                                                <span class="price-old"><del></del></span>
                                            </div>
                                        </div>
                            </div>
                                <?php 
                                }
                            ?>


                            <!-- product item start -->

                            <!-- product item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php
    include("includes/footer.php");
    ?>
    <!-- footer area end -->


    <!-- offcanvas mini cart start -->
    <?php
     include("includes/cart1.php");
    ?>
    <!-- offcanvas mini cart end -->

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!-- slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="assets/js/plugins/image-zoom.min.js"></script>
    <!-- Imagesloaded JS -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- Instagram feed JS -->
    <script src="assets/js/plugins/instagramfeed.min.js"></script>
    <!-- mailchimp active js -->
    <script src="assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
    <!--sweet alert-->
    <!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:06 GMT -->
</html>