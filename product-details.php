<?php
$active='Shop';
include("includes/header.php");
if(!isset($_GET['pro_id']))
{
    if($_GET['pro_id']=="")
    {
    ?>
<script type="text/javascript">
// window.open('home','_self');
</script>
<?php 
    }
}
else{
    $product_id=base64_decode($_GET['pro_id']);

    $get_product="select * from products where product_id=$product_id and product_status='yes'";
    $run_product=mysqli_query($con,$get_product);
    if(!$run_product)
    {
        ?>
<script>
// window.open('home','_self');
</script>
<?php 

    }
    else
    {
    $row_num=mysqli_num_rows($run_product);
    if($row_num==0)
    {
        ?>
<script>
window.open('home', '_self');
</script>
<?php 
    }
    $row_product=mysqli_fetch_array($run_product);
    $p_cat_id=$row_product['p_cat_id'];
    $manufacturer_id=$row_product['manufacturer_id'];
    $pro_title=$row_product['product_title'];
    $pro_qty=$row_product['available_qty'];
    $pro_price=$row_product['product_price'];
    $pro_desc=$row_product['product_desc'];
    if($pro_desc==null)
    {
        $pro_desc=" No Description Available";
    }
    else{
        $pro_desc=$row_product['product_desc'];
    }
    $pro_img1=$row_product['product_img1'];
    $pro_img2=$row_product['product_img2'];
    $pro_img3=$row_product['product_img3'];
    $pro_img4=$row_product['product_img4'];
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
    $get_manufacturer="select * from manufacturers  where manufacturer_status='yes' and manufacturer_id=$manufacturer_id";
    $run_manufacturer=mysqli_query($con,$get_manufacturer);
    $row_manufacturer=mysqli_fetch_array($run_manufacturer);
    $manufacturer_title=$row_manufacturer['manufacturer_title'];
    $get_product_cat="select * from product_categories where p_cat_status='yes' and p_cat_id=$p_cat_id";
    $run_product_cat=mysqli_query($con,$get_product_cat);
    $row_product_cat=mysqli_fetch_array($run_product_cat);
    $p_cat_title=$row_product_cat['p_cat_title'];
}
}
$error_message="";
$error_rating="";
$error_qty="";
$error_size="";
$errorresult=true;
                                        if(isset($_POST['submits']))
                                        {
                                            if(empty($_POST['message']))
                                            {
                                                $error_message = "Required..";
                                                $errorresult=false;
                                            }
                                            else
                                            {
                                                $error_message= "";
                                            }
                                            if(empty($_POST['rating']))
                                            {
                                                $error_rating = "Required..";
                                                $errorresult=false;
                                            }
                                            else{
                                                $error_rating = "";
                                            }
                                            if($errorresult==false)
                                            {
                                                goto end;
                                            }
                                            $message=$_POST['message'];
                                            $rating=$_POST['rating'];
                                            $customer_email=$_SESSION['customer_email'];
                                            $select_revieww="select * from review where customer_email='$customer_email'  and  product_id='$product_id' and papage='0'";
                                            $run_revieww=mysqli_query($con,$select_revieww);
                                           if(mysqli_num_rows($run_revieww)>0)
                                           {
                                                ?>
<script type="text/javascript">
swal({
        title: "You have already give review",
        text: "",
        icon: "warning",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('bikes-<?php echo base64_encode($product_id); ?>', '_self');
        } else {
            window.open('bikes-<?php echo base64_encode($product_id); ?>', '_self');
        }
    });
</script>
<?php
                                           }
                                            else{

                                            
                                            $insert_review="insert into review(product_id,papage,customer_email,message,time,rating,status_top,status) values('$product_id','0','$customer_email','$message',NOW(),'$rating','no','yes')";
                                            $run_review=mysqli_query($con,$insert_review);
                                            if($run_review)
                                            {
                                               ?>
<script type="text/javascript">
swal({
        title: "Thank You For Review.",
        text: "",
        icon: "success",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('bikes-<?php echo base64_encode($product_id); ?>', '_self');
        } else {
            window.open('bikes-<?php echo base64_encode($product_id); ?>', '_self');
        }
    });
</script>
<?php
                                            }
                                        }
                                    }
                                        if(isset($_POST['compare']))
                                        {
                                            if(isset($_SESSION["compare"]))
                                            {
                                                $item_array_id = array_column($_SESSION["compare"], "item_id"); 
                                                $item_array_name = array_column($_SESSION["compare"],"item_name");
                                    
                                                if(in_array($product_id, $item_array_id) && in_array($pro_title, $item_array_name))  
                                                {
                                                ?>
<script type="text/javascript">
swal({
        title: "Your product is alrady added in compare",
        text: "",
        icon: "warning",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('bikes-<?php echo base64_encode($product_id); ?>', '_self');
        } else {
            window.open('bikes-<?php echo base64_encode($product_id); ?>', '_self');
        }
    });
</script>
<?php
                                                goto end;
                                                }
                                            }

                                            if(isset($_SESSION['compare']))
                                            {
                                                $count=count($_SESSION['compare']);
                                                    if($count>=3)
                                                    {
                                                        ?>
<script type="text/javascript">
swal({
        title: "You have already slected 3 item.",
        text: "",
        icon: "warning",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('bikes-<?php echo base64_encode($product_id); ?>', '_self');
        } else {
            window.open('bikes-<?php echo base64_encode($product_id); ?>', '_self');
        }
    });
</script>
<?php 
                                                        goto end;
                                                    }
                                                    else{
                                                        $papage=0;
                                                        compare($product_id,$pro_title,$papage);
                                                    }
                                            }
                                            else
                                            {
                                                $papage=0;
                                                compare($product_id,$pro_title,$papage);
                                            }
                                        }
if(isset($_POST['add_cart'])){
                                            
    
    if(empty($_POST['product_qty']))
    {
        $error_qty = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_qty= "";
    }
    if(empty($_POST['pro_sizes']))
    {
        $error_size = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_size= "";
    }
    if($errorresult==false)
    {
        goto end;
    }
    $p_id = $_POST['product_id'];
    $product_qty = $_POST['product_qty'];
    $product_img=$_POST['product_img'];
    $product_price=$_POST['product_price'];
    $product_name=$_POST['product_name'];
    $product_size=$_POST['pro_sizes'];
        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id"); 
            $item_array_name = array_column($_SESSION["shopping_cart"],"item_name");

            if(in_array($p_id, $item_array_id) && in_array($product_name, $item_array_name))  
            {
            ?>
<script type="text/javascript">
swal({
        title: "Your product is alrady added in cart",
        text: "",
        icon: "warning",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('bikes-<?php echo base64_encode($p_id); ?>', '_self');
        } else {
            window.open('bikes-<?php echo base64_encode($p_id); ?>', '_self');
        }
    });
</script>
<?php
            goto end;
            }
        }

        if ($product_qty>$pro_qty) 
        {
            ?>
<script type="text/javascript">
swal({
        title: "Please enter lower quantity",
        text: "",
        icon: "warning",
        buttons: [, "OK"],
        successMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.open('bikes-<?php echo base64_encode($p_id); ?>', '_self');
        } else {
            window.open('bikes-<?php echo base64_encode($p_id); ?>', '_self');
        }
    });
</script>
<?php 
        }
        else
        {
            $papage=0;
            add_cart($p_id,$product_img,$product_qty,$product_name,$product_price,$product_size,$papage);
        }  
    } 
end:
?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="bikes">Bikes</a></li>
                                <li class="breadcrumb-item"><a
                                        href="bikes_manufacturer-<?php echo base64_encode($manufacturer_id) ?>"><?php echo $manufacturer_title; ?></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="bikes_category-<?php echo base64_encode($p_cat_id) ?>"><?php echo $p_cat_title; ?></a>
                                </li>
                                <li class="breadcrumb-item active">
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
                                        <img src="admin_area/product_images/<?php echo $pro_img1 ?>"
                                            alt="product-details" />
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
                                        <img src="admin_area/product_images/<?php echo $pro_img2 ?>"
                                            alt="product-details" />
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
                                        <img src="admin_area/product_images/<?php echo $pro_img3 ?>"
                                            alt="product-details" />
                                    </div>
                                    <?php
                                        } 
                                        ?>
                                    <?php
                                     if($pro_img4=="")
                                        {
                                        }
                                        else
                                        {?>

                                    <div class="pro-nav-thumb">
                                        <img src="admin_area/product_images/<?php echo $pro_img4 ?>"
                                            alt="product-details" />
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
                                        <img src="admin_area/product_images/<?php echo $pro_img1 ?>"
                                            alt="product-details" />
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
                                        <img src="admin_area/product_images/<?php echo $pro_img2 ?>"
                                            alt="product-details" />
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
                                        <img src="admin_area/product_images/<?php echo $pro_img3 ?>"
                                            alt="product-details" />
                                    </div>
                                    <?php
                                        } 
                                        ?>
                                    <?php 
                                         if($pro_img4=="")
                                        {
                                        }
                                        else
                                        {?>
                                    <div class="pro-nav-thumb">
                                        <img src="admin_area/product_images/<?php echo $pro_img4 ?>"
                                            alt="product-details" />
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
                                        if($pro_label=="old")
                                        { 
                                            
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
                                    <div class="ratings d-flex">
                                        <?php
                                      // $pro_idss=base64_decode($_GET['pro_id']);
                                       //$output=0;
                                        $query="select AVG(rating) as rating from review where product_id='$product_id' and status='yes' and papage='0'";
                                        $statement=mysqli_query($con,$query);
                                        while($ruo=mysqli_fetch_array($statement))
                                        {
                                        $output=round($ruo['rating']);
                                        } 
                                        $select_reviewss="select * from review where product_id='$product_id' and status='yes' and papage='0'";
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
                                        <span class="price-regular">Rs.<?php echo $pro_price; ?></span>

                                        <?php
                                        } 
                                        if($pro_label=="old")
                                        {
                                        ?>
                                        <span class="price-regular">Rs.<?php echo $pro_price; ?></span>
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


                                    <form action="#" method="POST">
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">Size:</h6>
                                            <div class="quantity" style="padding-top: 17px;">

                                                <div class="pro-size">
                                                    <select class="nice-select" name="pro_sizes" required>
                                                        <?php 
                                                    $select_qty="select * from products where product_id='$product_id'";
                                                    $run_qty=mysqli_query($con,$select_qty);
                                                    while($row_qty=mysqli_fetch_array($run_qty))
                                                    {
                                                        $p_qty=$row_qty['product_size'];
                                                        $subject=explode(",",$p_qty);
                                                    }
                                                    
                                                    if(in_array("33cms",$subject))
                                                    {
                                                        ?>
                                                        <option value="33cms">33cms</option>
                                                        <?php
                                                    }
                                                    if(in_array("38cms",$subject))
                                                    {
                                                        ?>
                                                        <option value="38cms">38cms</option>
                                                        <?php
                                                    }
                                                    if(in_array("40cms",$subject))
                                                    {
                                                        ?>
                                                        <option value="40cms">40cms</option>
                                                        <?php
                                                    }
                                                    if(in_array("45cms",$subject))
                                                    {
                                                        ?>
                                                        <option value="45cms">45cms</option>
                                                        <?php
                                                    }
                                                    if(in_array("48cms",$subject))
                                                    {
                                                        ?>
                                                        <option value="48cms">48cms</option>
                                                        <?php
                                                    }
                                                    if(in_array("53cms",$subject))
                                                    {
                                                        ?>
                                                        <option value="53cms">53cms</option>
                                                        <?php
                                                    }
                                                    if(in_array("55cms",$subject))
                                                    {
                                                        ?>
                                                        <option value="55cms">55cms</option>
                                                        <?php
                                                    }
                                                    
                                                    ?>


                                                    </select>
                                                    <span style="color: red;"><?php echo $error_size; ?></span>
                                                </div>
                                            </div>

                                            <h6 class="option-title">qty:</h6>
                                            <div class="quantity">

                                                <div class="pro-qty" style="width: 110px;">
                                                    <input type="number" min="1" value="1" name="product_qty"
                                                        style="width: 40px;" required>
                                                    <span style="color: red;"><?php echo $error_qty; ?></span>
                                                </div>
                                            </div>


                                        </div>
                                        <?php  if($pro_qty<=0)
                                       {

                                       }
                                    else
                                    {
                                       
                                        ?>


                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                                        <input type="hidden" name="product_img" value="<?php echo $pro_img1; ?>" />
                                        <input type="hidden" name="product_price" value="<?php echo $pro_price; ?>" />
                                        <input type="hidden" name="product_name" value="<?php echo $pro_title; ?>" />

                                        <div class="action_link" style="margin-top: -10px;">

                                            <input type="submit" class="btn btn-cart2" name="add_cart"
                                                value="Add to cart">

                                        </div>
                                        <?php 
                                    }
                                   
                                       ?>
                                    </form>

                                    <div class="color-option">

                                    </div>
                                    <?php
                                         
                                        ?>
                                    <form method="POST" action="">
                                        <div class="useful-links">
                                            <?php 
                                        if(isset($_SESSION['customer_email']))
                                        { 
                                            ?>
                                            <button type="submit" data-toggle="tooltip" name="wishlist"
                                                title="Wishlist"><i class="pe-7s-like"></i> Wishlist</button>
                                            <?php
                                        }
                                        ?>
                                            <button type="submit" name="compare" data-toggle="tooltip" title="Compare"
                                                class="pl-2"><i class="pe-7s-refresh-2"></i> Compare</button>

                                        </div>

                                    </form>
                                    <?php
                                        
                                        if(isset($_SESSION['customer_email']))
                                        {
                                        if(isset($_POST['wishlist']))
                                        {
                                            $customer_emailss=$_SESSION['customer_email'];
                                            $select_wishlist="select * from wishlist where customer_email='$customer_emailss' and product_id='$product_id' and papage='0' and status='yes'";
                                            $run_wishlist=mysqli_query($con,$select_wishlist);
                                            if(mysqli_num_rows($run_wishlist)>0)
                                            {
                                                ?>
                                    <script type="text/javascript">
                                    swal({
                                            title: "You have already add product to wishlist",
                                            text: "",
                                            icon: "warning",
                                            buttons: [, "OK"],
                                            successMode: true,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                window.open('bikes-<?php echo base64_encode($product_id); ?>',
                                                    '_self');
                                            } else {

                                            }
                                        });
                                    </script>
                                    <?php
                                            }
                                            else
                                            {
                                                $papage=0;
                                                wishlist($product_id,$customer_emailss,$papage);
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
                                        <div class="tab-pane fade" id="tab_three">
                                            <form action="#" method="POST" class="review-form">
                                                <?php
                                                    //$product_ids=base64_decode($_GET['pro_id']);
                                                    $select_reviews="select * from review where product_id='$product_id' and status='yes' and papage='0'";
                                                    $run_reviews=mysqli_query($con,$select_reviews);
                                                    $total_reviews=mysqli_num_rows($run_reviews);
                                                    ?>
                                                <h5><?php echo $total_reviews; ?> review for
                                                    <span><?php echo $pro_title; ?></span></h5>
                                                <?php
                                                   
                                                    $select_review="select * from review where product_id='$product_id'and status='yes' and papage='0'";
                                                     $run_review=mysqli_query($con,$select_review);
                                                     while($row_review=mysqli_fetch_array($run_review))
                                                     {
                                                        $customer_emailss=$row_review['customer_email'];
                                                        $rating=$row_review['rating'];
                                                        $time=$row_review['time']; 
                                                        $orgDate = $time;  
                                                        $newDate = date("d-M-Y", strtotime($orgDate));  
                                                        $message=$row_review['message'];
                                                        if($message==null)
                                                        {
                                                            $message="N/A";
                                                        }
                                                        else{
                                                            $message=$row_review['message'];
                                                        }
                                                    ?>

                                                <div class="total-reviews">
                                                    <?php
                                                        $customer_review="select * from customers where customer_email='$customer_emailss' and customer_status='yes'";
                                                        $run_customer_review=mysqli_query($con,$customer_review);
                                                        while($row_customer_review=mysqli_fetch_array($run_customer_review))
                                                        {
                                                            ?>
                                                    <div class="rev-avatar">
                                                        <?php
                                                            if($row_customer_review['customer_image']=="")
                                                            {
                                                                ?>
                                                        <img src="customer/customer_images/user.png" alt="">
                                                        <?php 
                                                            } 
                                                            else{
                                                            ?>
                                                        <img src="customer/customer_images/<?php echo $row_customer_review['customer_image']; ?>"
                                                            alt="">
                                                        <?php 
                                                            }
                                                            ?>
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
                                                            <p><span><?php echo $row_customer_review['customer_name']; ?>-</span>
                                                                <?php echo $newDate; ?></p>
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
                                                        <label class="col-form-label"><span class="text-danger"></span>
                                                            Your Review</label>
                                                        <textarea class="form-control" name="message"
                                                            required> </textarea>
                                                        <span style="color: red;"><?php echo $error_message; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger"></span>
                                                            Rating</label>
                                                        &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                        <input type="radio" value="1" name="rating" checked required>
                                                        &nbsp;
                                                        <input type="radio" value="2" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="3" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="4" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="5" name="rating">
                                                        &nbsp;Good
                                                        &nbsp;
                                                        <span style="color: red;"><?php echo $error_rating; ?></span>
                                                    </div>

                                                </div>
                                                <div class="buttons">
                                                    <input type="submit" class="btn btn-sqr" value="Continue"
                                                        name="submits" />
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
                            
                                $get_products="select * from products where product_status='yes' and product_status_top='yes' and p_cat_id='$p_cat_id'  order by rand() DESC LIMIT 0,8"; 
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
                                    $manufacturer_id=$row_products['manufacturer_id'];
                                    $pro_discount_price=$row_products['product_discount_price'];
                                    ?>

                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="bikes-<?php echo base64_encode($pro_id);?>">
                                    <img class="pri-img" src="admin_area/product_images/<?php echo $pro_img1;?>"
                                        alt="product">
                                    <?php
                                            if($pro_img2=="")
                                            {
                                                ?>
                                    <img class="sec-img" src="admin_area/product_images/<?php echo $pro_img1;?>"
                                        alt="product">
                                    <?php
                                            }
                                            else{ 
                                            ?>
                                    <img class="sec-img" src="admin_area/product_images/<?php echo $pro_img2;?>"
                                        alt="product">
                                    <?php
                                            } 
                                            ?>
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
                                        if($pro_label=="old")
                                        {

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
                            </figure>
                            <div class="product-caption text-center">
                                <div class="manufacturer-name">
                                    <?php
                                                    $query3="select * from manufacturers where manufacturer_id='$manufacturer_id'";
                                                    $run_carts=mysqli_query($db, $query3);
                                                    while ($row_carts=mysqli_fetch_array($run_carts)) { 
                                            ?>
                                    <a
                                        href="bikes_manufacturer-<?php echo base64_encode($manufacturer_id);?>"><?php echo $row_carts['manufacturer_title']; ?></a>
                                    <?php 
                                                }
                                                ?>
                                </div>
                                <h6 class="product-name">
                                    <a href="bikes-<?php echo base64_encode($pro_id);?>"><?php echo $pro_title;?></a>
                                </h6>
                                <div class="price-box">
                                    <?php
                                                if($pro_label=="new")
                                                { 
                                                ?>
                                    <span class="price-regular">Rs.<?php echo  $pro_price;?></span>
                                    <?php
                                                }
                                                if($pro_label=="old")
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
<script>
tinymce.init({
    selector: 'textarea'
});
</script>

</body>


</html>