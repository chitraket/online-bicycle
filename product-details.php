
<?php
$active='Shop';
include("includes/header.php");

?>
<?php
if(isset($_GET['pro_id']))
{
    $product_id=$_GET['pro_id'];
    $get_product="select * from products where product_id=$product_id and product_status='yes'";
    $run_product=mysqli_query($con,$get_product);
    $row_product=mysqli_fetch_array($run_product);
    $p_cat_id=$row_product['p_cat_id'];
    $manufacturer_id=$row_product['manufacturer_id'];
    $pro_title=$row_product['product_title'];
    $pro_qty=$row_product['available_qty'];
    $pro_price=$row_product['product_price'];
    $pro_desc=$row_product['product_desc'];
    $pro_img1=$row_product['product_img1'];
    $pro_img2=$row_product['product_img2'];
    $pro_img3=$row_product['product_img3'];
    $pro_label=$row_product['product_label'];
    $pro_discount_price=$row_product['product_discount_price'];
    $pro_discount=$row_product['product_discount'];
    
   $pro_size=$row_product['product_size'];
    if($pro_size==null )
    {
        $pro_size="N/A";
    }
    else
    {
        $pro_size=$row_product['product_size'];
    }
    $pro_frame=$row_product['product_frame'];
    if($pro_frame==null )
    {
        $pro_frame="N/A";
    }
    else
    {
        $pro_frame=$row_product['product_frame'];
    }

    $pro_weight=$row_product['product_weight'];
    if($pro_weight==null)
    {
        $pro_weight="N/A";
    }
    else
    {
        $pro_weight=$row_product['product_weight'];
    }
    $pro_front_suspension=$row_product['product_front_suspension'];
    if($pro_front_suspension==null)
    {
        $pro_front_suspension="N/A";
    }
    else
    {
        $pro_front_suspension=$row_product['product_front_suspension'];
    }
    $pro_rear_suspension=$row_product['product_rear_suspension'];
    if($pro_rear_suspension==null)
    {
        $pro_rear_suspension="N/A";
    }else{
        $pro_rear_suspension=$row_product['product_rear_suspension'];
    }

    $pro_front_derailleur=$row_product['product_front_derailleur'];
    if($pro_front_derailleur==null)
    {
        $pro_front_derailleur="N/A";
    }
    else{
        $pro_front_derailleur=$row_product['product_front_derailleur'];
    }
    $pro_rear_derailleur=$row_product['product_rear_derailleur'];
    if($pro_rear_derailleur==null)
    {
        $pro_rear_derailleur="N/A";
    }
    else{
        $pro_rear_derailleur=$row_product['product_rear_derailleur'];
    }
    $pro_wheels=$row_product['product_wheels'];
    if($pro_wheels==null)
    {
        $pro_wheels="N/A";
    }
    else{
        $pro_wheels=$row_product['product_wheels'];
    }
    $pro_tires=$row_product['product_tires'];
    if($pro_tires==null)
    {
        $pro_tires="N/A";
    }else{
        $pro_tires=$row_product['product_tires'];
    }
    $pro_shifter=$row_product['product_shifter'];
    if($pro_shifter==null)
    {
        $pro_shifter="N/A";
    }
    else
    {
        $pro_shifter=$row_product['product_shifter'];
    }
    $pro_crankset=$row_product['product_crankset'];
    if($pro_crankset==null)
    {
        $pro_crankset="N/A";
    }
    else{
        $pro_crankset=$row_product['product_crankset'];
    }
    $pro_freewheels=$row_product['product_freewheels'];
    if($pro_freewheels==null)
    {
        $pro_freewheels="N/A";
    }
    else{
        $pro_freewheels=$row_product['product_freewheels'];
    }
    $pro_bb_set=$row_product['product_bb_set'];
    if($pro_bb_set==null)
    {
        $pro_bb_set="N/A";
    }
    else{
        $pro_bb_set=$row_product['product_bb_set'];   
    }
    $pro_cassette=$row_product['product_cassette'];
    if($pro_cassette==null)
    {
        $pro_cassette="N/A";
    }
    else{
        $pro_cassette=$row_product['product_cassette'];   
    }
    $pro_colour=$row_product['product_colour'];
    if($pro_colour==null)
    {
        $pro_colour="N/A";
    }
    else{
        $pro_colour=$row_product['product_colour'];   
    }
    $pro_pedals=$row_product['product_pedals'];
    if($pro_pedals==null)
    {
        $pro_pedals="N/A";
    }
    else{
        $pro_pedals=$row_product['product_pedals'];
    }
    $pro_seat_post=$row_product['product_seat_post'];
    if($pro_seat_post==null)
    {
        $pro_seat_post="N/A";
    }
    else{
        $pro_seat_post=$row_product['product_seat_post'];
    }
    $pro_handleber=$row_product['product_handleber'];
    if($pro_handleber==null)
    {
        $pro_handleber="N/A";
    }
    else{
        $pro_handleber=$row_product['product_handleber'];
    }
    $pro_stem=$row_product['product_stem'];
    if($pro_stem==null)
    {
        $pro_stem="N/A";
    }else{
        $pro_stem=$row_product['product_stem'];
    }
    $pro_headset=$row_product['product_headset'];
    if($pro_headset==null)
    {
        $pro_headset="N/A";
    }
    else{
        $pro_headset=$row_product['product_headset'];
    }
    $pro_brakeset=$row_product['product_brakeset'];
    if($pro_brakeset==null)
    {
        $pro_brakeset="N/A";
    }
    else{
        $pro_brakeset=$row_product['product_brakeset'];
    }
    $get_manufacturer="select * from manufacturers where manufacturer_id=$manufacturer_id";
    $run_manufacturer=mysqli_query($con,$get_manufacturer);
    $row_manufacturer=mysqli_fetch_array($run_manufacturer);
    $manufacturer_title=$row_manufacturer['manufacturer_title'];

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
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.php">Bikes</a></li>
                                    <li class="breadcrumb-item active" >
                                       <?php echo $pro_title; ?> 
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
                                        if($pro_img1=="")
                                        {

                                        } 
                                        else
                                        {
                                        ?>
                                            <div class="pro-large-img img-zoom">
                                                <img src="assets/img/product/<?php echo $pro_img1 ?>" alt="product-details" />
                                            </div>
                                        <?php 
                                        }
                                        ?>
                                         <?php
                                        if($pro_img2=="")
                                        {

                                        } 
                                        else
                                        {
                                        ?>
                                            <div class="pro-large-img img-zoom">
                                                <img src="assets/img/product/<?php echo $pro_img2 ?>" alt="product-details" />
                                            </div>
                                        <?php 
                                        }
                                        ?>
                                        <?php 
                                        if($pro_img3=="")
                                        {
                                        }
                                        else
                                        {?>
                                            <div class="pro-large-img img-zoom">
                                                <img src="assets/img/product/<?php echo $pro_img3 ?>" alt="product-details" />
                                            </div>
                                        <?php
                                        } 
                                        ?>
                                        <?php
                                     if($pro_img2=="")
                                        {
                                        }
                                        else
                                        {?>
                                        
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/<?php echo $pro_img2 ?>" alt="product-details" />
                                        </div>
                                        <?php 
                                        }?>
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <?php
                                        if($pro_img1=="")
                                        {

                                        } 
                                        else
                                        {
                                        ?>
                                            <div class="pro-nav-thumb">
                                                <img src="assets/img/product/<?php echo $pro_img1 ?>" alt="product-details" />
                                            </div>
                                        <?php 
                                        }?>
                                         <?php
                                        if($pro_img2=="")
                                        {

                                        } 
                                        else
                                        {
                                        ?>
                                            <div class="pro-nav-thumb">
                                                <img src="assets/img/product/<?php echo $pro_img2 ?>" alt="product-details" />
                                            </div>
                                        <?php 
                                        }?>
                                        <?php
                                        if($pro_img3=="")
                                        {
                                        }
                                        else
                                        {?>
                                            <div class="pro-nav-thumb">
                                                <img src="assets/img/product/<?php echo $pro_img3 ?>" alt="product-details" />
                                            </div>
                                        <?php
                                        } 
                                        ?>
                                        <?php 
                                         if($pro_img2=="")
                                        {
                                        }
                                        else
                                        {?>
                                            <div class="pro-nav-thumb">
                                                <img src="assets/img/product/<?php echo $pro_img2 ?>" alt="product-details" />
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
                                           <?php echo $manufacturer_title;?>
                                        </div>
                                        <h3 class="product-name"><?php  echo $pro_title; ?></h3>
                                       <!-- <div class="ratings d-flex">
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span>1 Reviews</span>
                                            </div>
                                        </div>-->
                                        <div class="price-box">
                                        <?php
                                        if($pro_label=="new")
                                        {
                                        ?>
                                            <span class="price-regular">Rs.<?php echo $pro_price; ?></span>
                                            <span class="price-old"><del></del></span>
                                        <?php
                                        } 
                                        if($pro_label=="sale")
                                        {
                                            ?>
                                            <span class="price-regular">Rs.<?php echo $pro_price; ?></span>
                                            <span class="price-old"><del>Rs.<?php echo $pro_discount_price; ?></del></span>
                                            <?php 
                                        }
                                        ?>
                                        </div>
                                       <!-- <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                        <div class="product-countdown" data-countdown="2019/12/20"></div>-->
                                        <div class="availability">
                                           <?php  
                                           if($pro_qty<=0)
                                            {
                                                
                                             echo "  <span style='color: red;'>out of stock</span>";
                                               
                                            }
                                            else
                                            {
                                              echo " <span style='color: green'> $pro_qty in stock </span>";
                                            }
                                            ?>
                                        </div>
                                        <p class="pro-desc"><?php echo $pro_desc ?></p>
                                       
                                        
                                        
                                        <?php 
                                       
                                        if(isset($_POST['add_cart'])){
                                            
                                            $p_id = $_POST['product_id'];
                                            $product_qty = $_POST['product_qty'];
                                            $product_img=$_POST['product_img'];
                                            $product_price=$_POST['product_price'];
                                            $product_name=$_POST['product_name'];
                                            $product_size=$_POST['pro_sizes'];
                                            echo $product_size;
                                                if(isset($_SESSION[$product_name]))
                                                {
                                                    echo "<script type='text/javascript'>swal('Your product is alrady added in cart', '', 'warning')</script>";
                                                    goto end;
                                                }

                                                if ($product_qty>$pro_qty) 
                                                {
                                                    echo "<script type='text/javascript'>swal('Please enter lower quantity', '', 'warning')</script>";
                                                }
                                                else
                                                {
                                                    $papage=0;
                                                    add_cart($p_id,$product_img,$product_qty,$product_name,$product_price,$product_size,$papage);
                                                }  
                                            } 
                                            
                                            end:
                                        ?>

                                        <form action="#" method="POST">
                                        <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">Size:</h6>
                                            <div class="quantity" style="padding-top: 17px;">
                                                
                                            <div class="pro-size">
                                                <select class="nice-select" name="pro_sizes">
                                                <option>S</option>
                                                <option>M</option>
                                                <option>L</option>
                                                <option>XL</option>
                                            </select>
                                                </div>
                                            </div>

                                        <h6 class="option-title">qty:</h6>
                                            <div class="quantity">
                                                
                                                <div class="pro-qty"style="width: 110px;" >
                                                    <input type="number" min="1" value="1"  name="product_qty" style="width: 40px;">
                                                </div>
                                            </div>
                    
                                            
                                        </div>
                                       <?php  if($pro_qty<=0)
                                       {

                                       }
                                    else
                                    {
                                       
                                        ?>
                                        
                                        
                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
                                        <input type="hidden" name="product_img" value="<?php echo $pro_img1; ?>"/>
                                        <input type="hidden" name="product_price" value="<?php echo $pro_price; ?>"/>
                                        <input type="hidden" name="product_name" value="<?php echo $pro_title; ?>"/>
                                      
                                            <div class="action_link" style="margin-top: -10px;">
                                          
                                            <input type="submit" class="btn btn-cart2" name="add_cart" value="Add to cart" >
                                    
                                            </div>
                                            <?php 
                                    }
                                   
                                       ?>
                                    </form>
                                      <!--  -->
                                      <!--  <div class="color-option">
                                            <h6 class="option-title">color :</h6>
                                            <ul class="color-categories">
                                                <li>
                                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                </li>
                                                <li>
                                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                                </li>
                                                <li>
                                                    <a class="c-grey" href="#" title="Grey"></a>
                                                </li>
                                                <li>
                                                    <a class="c-brown" href="#" title="Brown"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="useful-links">
                                            <a href="#" data-toggle="tooltip" title="Compare"><i
                                                    class="pe-7s-refresh-2"></i>compare</a>
                                            <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                                    class="pe-7s-like"></i>wishlist</a>
                                        </div>
                                        <div class="like-icon">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div>
                                    </div>-->
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
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p>
                                                    <?php echo $pro_desc ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>color</td>
                                                            <td><?php echo $pro_colour ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>size</td>
                                                            <td><?php echo $pro_size ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Frame</td>
                                                            <td><?php echo $pro_frame ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Front Suspension</td>
                                                            <td><?php echo $pro_front_suspension ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rear Suspension</td>
                                                            <td><?php echo $pro_rear_suspension ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Wheels</td>
                                                            <td><?php echo $pro_wheels ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tires</td>
                                                            <td><?php echo $pro_tires ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shifters</td>
                                                            <td><?php echo $pro_shifter ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Crankset</td>
                                                            <td><?php echo $pro_crankset ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>BB Set</td>
                                                            <td><?php echo $pro_bb_set ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cassetts</td>
                                                            <td><?php echo $pro_cassette ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pedals</td>
                                                            <td><?php echo $pro_pedals ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Front Derailleur</td>
                                                            <td><?php echo $pro_front_derailleur ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rear Derailleur</td>
                                                            <td><?php echo $pro_rear_derailleur ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Seat Post</td>
                                                            <td><?php  echo $pro_seat_post ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Handlebar</td>
                                                            <td><?php echo $pro_handleber ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Stem</td>
                                                            <td><?php echo $pro_stem ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Headset</td>
                                                            <td><?php echo $pro_headset ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Brakeset</td>
                                                            <td><?php echo $pro_brakeset ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                           
                                        </div>
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
                            <h2 class="title">Related Products</h2>
                            <!--<p class="sub-title">Add related products to weekly lineup</p>-->
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">

                            <?php
                            
                                $get_products="select * from products order by rand() DESC LIMIT 0,8"; 
                                $run_products=mysqli_query($con,$get_products);
                                while($row_products=mysqli_fetch_array($run_products))
                                {
                                    $pro_id=$row_products['product_id'];
                                    $pro_title=$row_products['product_title'];
                                    $pro_price=$row_products['product_price'];
                                    $pro_img1=$row_products['product_img1'];
                                    $pro_img2=$row_products['product_img2'];
                                    $pro_label=$row_products['product_label'];
                                    $pro_discount=$row_products['product_discount'];
                                    $pro_discount_price=$row_products['product_discount_price'];
                                    ?>
                                    
                                    <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="product-details.php?pro_id=<?php echo $pro_id;?>">
                                            <img class="pri-img" src="admin_area/product_images/<?php echo $pro_img1;?>" alt="product" style="height:180px;">
                                            <img class="sec-img" src="admin_area/product_images/<?php echo $pro_img2;?>" alt="product" style="height:180px;">
                                        </a>
                                       
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
                                        <!--<div class="button-group">
                                            <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                            <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                            
                                        </div>-->
                                        <!--<div class='cart-hover'>
                                            <button class='btn btn-cart'>add to cart</button>
                                        </div>-->
                                  </figure>
                                        <div class="product-caption text-center">
                                        <!--<div class="product-identity">
                                                <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                                            </div>-->
                                            <h6 class="product-name">
                                                <a href="product-details.php?pro_id=<?php echo $pro_id;?>"><?php echo $pro_title;?></a>
                                            </h6>
                                            <div class="price-box">
                                                <?php
                                                if($pro_label=="new")
                                                { 
                                                ?>
                                                <span class="price-regular">Rs.<?php echo  $pro_price;?></span>
                                                <?php
                                                }
                                                if($pro_label=="sale")
                                                { 
                                                ?>
                                                <span class="price-regular">Rs.<?php echo  $pro_price;?></span>
                                                <span class="price-old"><del>Rs.<?php echo $pro_discount_price; ?></del></span>
                                                <?php
                                                } 
                                                ?>
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

    <!-- Quick view modal start -->
    <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html">HasTech</a>
                                    </div>
                                    <h3 class="product-name">Handmade Golden Necklace</h3>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <div class="pro-review">
                                            <span>1 Reviews</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">$70.00</span>
                                        <span class="price-old"><del>$90.00</del></span>
                                    </div>
                                    <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                    <div class="product-countdown" data-countdown="2022/02/20"></div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>200 in stock</span>
                                    </div>
                                    <p class="pro-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod tempor invidunt ut labore et dolore magna.</p>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="useful-links">
                                        <a href="#" data-toggle="tooltip" title="Compare"><i
                                            class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                            class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->

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
    <!--sweet alert-->
    <!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:06 GMT -->
</html>