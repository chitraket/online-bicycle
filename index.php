<?php
$active='Home';
?>
<!-- Start Header Area -->
<?php
       include("includes/header.php");
    ?>
<!-- end Header Area -->
<script>
window.addEventListener("load", setTimeout(function() {
    var load_screen = document.getElementById("load_screen");

    document.body.removeChild(load_screen);
}, 1000));
</script>
<div id="load_screen">
    <div id="loading"><img src="loder.gif"></div>
</div>
<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">

            <!-- single slider item start -->
            <?php
                $get_slides="select * from slider where slide_status='yes'";
                $run_slider=mysqli_query($con,$get_slides);
                while($row_slides=mysqli_fetch_array($run_slider)){
                    $slide_name=$row_slides['slide_name'];
                    $slide_image=$row_slides['slide_image'];
                    $slide_row=$row_slides['slide_row'];
                    $slide_row_2=$row_slides['slide_row_2'];
                    $status=$row_slides['status'];
                    $slide_url=$row_slides['slide_url'];
                ?>

            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="admin_area/slides_images/<?php echo $slide_image; ?>"
                    style="width: 100%;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-1 <?php echo $status;?>">
                                    <?php  
                                        if($slide_row=="")
                                        {
                                        }else{?>
                                    <h2 class="slide-title"><?php echo  $slide_row; ?></h2>
                                    <h4 class="slide-desc pb-5"><?php echo  $slide_row_2;?></h4>
                                    <?php
                                        }?>
                                    <?php
                                        if($slide_url=="")
                                        {

                                        } 
                                        else{
                                        ?>
                                    <div class="pt-4"></div>
                                    <a href="<?php echo $slide_url; ?>" class="btn btn-hero">Shop Now</a>
                                    <?php 
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                }
                ?>
            <!-- single slider item end -->
        </div>
    </section>
    <!-- hero slider area end -->
    <!-- service policy area start -->
    <div class="service-policy section-padding ">
        <div class="container">
            <div class="row mtn-30">
                <?php
                $get_boxs="select * from boxes_section where box_status='yes'";
                $run_box=mysqli_query($con,$get_boxs);
                while($row_boxs=mysqli_fetch_array($run_box))
                {

                    ?>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-<?php echo $row_boxs["box_icon"] ?>"></i>
                        </div>
                        <div class="policy-content">
                            <h6><?php echo $row_boxs["box_title"]; ?></h6>
                            <p><?php echo $row_boxs["box_desc"]; ?></p>
                        </div>
                    </div>
                </div>
                <?php 
                }
                ?>
            </div>
        </div>
    </div>

    <section class="product-area section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <?php 
                                        getPro();
                                        ?>
                                </div>
                            </div>
                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- group product start -->
    <section class="group-product-area section-padding pt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>New Arrivals</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">
                                <!-- group list item start -->
                                <?php
                                    $select_new_product="select * from products where product_status='yes' and product_label='new' and product_status_top='yes'";
                                    $run_new_product=mysqli_query($con,$select_new_product);
                                    while($row_new_product=mysqli_fetch_array($run_new_product))
                                    {
                                        $product_img=$row_new_product['product_img1'];
                                        $product_title=$row_new_product['product_title'];
                                        $product_price=$row_new_product['product_price'];
                                        $product_id=$row_new_product['product_id'];
                                        ?>

                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href='bikes-<?php echo base64_encode($product_id);?>'>
                                                <img class='pri-img'
                                                    src='admin_area/product_images/<?php echo $product_img;?>'
                                                    alt='product'>
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a
                                                    href="bikes-<?php echo base64_encode($product_id);?>">
                                                    <?php echo $product_title; ?></a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">Rs.<?php echo $product_price; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    } 
                                     ?>
                                <!-- group list item end -->


                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>best seller Bicycles</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">
                                <!-- group list item start -->

                                <?php
                                    $select_selle_product="select * from products where product_status='yes' and product_status_top='yes'";
                                    $run_selle_product=mysqli_query($con,$select_selle_product);
                                    while($row_selle_product=mysqli_fetch_array($run_selle_product))
                                    {
                                        $product_qty=$row_selle_product['product_qty'];
                                        $available_qty=$row_selle_product['available_qty'];
                                        $shold_out=$product_qty-$available_qty;
                                        if($shold_out>5)
                                        {
                                        $product_imgs=$row_selle_product['product_img1'];
                                        $product_titles=$row_selle_product['product_title'];
                                        $product_prices=$row_selle_product['product_price'];
                                        $product_ids=$row_selle_product['product_id'];
                                        $product_labels=$row_selle_product['product_label'];
                                        $product_discount_price=$row_selle_product['product_discount_price'];

                                        ?>
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href='bikes-<?php echo base64_encode($product_ids);?>'>
                                                <img class='pri-img'
                                                    src='admin_area/product_images/<?php echo $product_imgs;?>'
                                                    alt='product'>
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a
                                                    href="bikes-<?php echo base64_encode($product_ids);?>">
                                                    <?php echo $product_titles; ?></a></h5>
                                            <div class="price-box">
                                                <?php
                                                    if($product_labels=="new")
                                                    { 
                                                    ?>
                                                <span class="price-regular">Rs.<?php echo $product_prices; ?></span>
                                                <?php
                                                    }
                                                    else{
                                                        ?>
                                                <span class="price-regular">Rs.<?php echo $product_prices; ?></span>
                                                <span
                                                    class="price-old"><del>Rs.<?php echo $product_discount_price; ?></del></span>
                                                <?php 
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->
                                <?php
                                        }
                                    } 
                                        ?>

                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>on-sale Bicycles</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">
                                <!-- group list item start -->

                                <?php
                                    $select_sale_product="select * from products where product_status='yes' and product_label='sale' and product_status_top='yes'";
                                    $run_sale_product=mysqli_query($con,$select_sale_product);
                                    while($row_sale_product=mysqli_fetch_array($run_sale_product))
                                    {
                                        $product_imgl=$row_sale_product['product_img1'];
                                        $product_titlel=$row_sale_product['product_title'];
                                        $product_pricel=$row_sale_product['product_price'];
                                        $product_idl=$row_sale_product['product_id'];
                                        $product_discount_pricel=$row_sale_product['product_discount_price'];
                                        ?>
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href='bikes-<?php echo base64_encode($product_idl);?>'>
                                                <img class='pri-img'
                                                    src='admin_area/product_images/<?php echo $product_imgl;?>'
                                                    alt='product'>
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a
                                                    href="bikes-<?php echo base64_encode($product_idl);?>">
                                                    <?php echo $product_titlel; ?></a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">Rs.<?php echo $product_pricel; ?></span>
                                                <span
                                                    class="price-old"><del>Rs.<?php echo $product_discount_pricel; ?></del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    } 
                                            ?>
                            </div>
                        </div>
                        <!-- group list item end -->


                    </div>
                </div>
                <!-- group list carousel start -->
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- group product end -->
    <!-- product area end -->
    <section class="product-area section-padding pt-0 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <?php 
                                        getAcc();
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial area start -->
    <section class="testimonial-area section-padding  bg-img " data-bg="assets/img/testimonial/testimonials-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Customer Reviews</h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-thumb-wrapper">
                        <div class="testimonial-thumb-carousel">
                            <?php 
                    
                            $get_terms = "select * from review where status='yes' and status_top='yes' LIMIT 0,1";
                            $run_terms = mysqli_query($con,$get_terms);
                            while($row_terms=mysqli_fetch_array($run_terms)){
                                $customer_email=$row_terms['customer_email'];
                                $get_customers="select * from customers where customer_email='$customer_email' and customer_status='yes'";
                                $run_customer=mysqli_query($con,$get_customers);
                                while($row_customer=mysqli_fetch_array($run_customer))
                                {
                                    if($row_customer['customer_image']=="")
                                    {
                                        ?>
                            <div class="testimonial-thumb">
                                <img src="customer/customer_images/user.png" alt="testimonial-thumb">
                            </div>
                            <?php
                                    }
                                    else{
                                    ?>

                            <div class="testimonial-thumb">
                                <img src="customer/customer_images/<?php echo $row_customer['customer_image']; ?>"
                                    alt="testimonial-thumb">
                            </div>
                            <?php
                                    }
                                }
                        }
                                            $count_terms = "select * from review  where status='yes' and status_top='yes'";
                                            $run_count_terms = mysqli_query($con,$count_terms);
                                            $count = mysqli_num_rows($run_count_terms);
                                            $get_terms = "select * from review where status='yes' and status_top='yes'  LIMIT 1,$count";
                                            $run_terms = mysqli_query($con,$get_terms);
                                            while ($row_terms=mysqli_fetch_array($run_terms)) {
                                                $customer_email=$row_terms['customer_email'];
                                                $get_customers="select * from customers where customer_email='$customer_email' and customer_status='yes'";
                                                    $run_customer=mysqli_query($con,$get_customers);
                                                    while($row_customer=mysqli_fetch_array($run_customer))
                                                    {

                                                        if($row_customer['customer_image']=="")
                                                        {
                                                            ?>
                            <div class="testimonial-thumb">
                                <img src="customer/customer_images/user.png" alt="testimonial-thumb">
                            </div>
                            <?php
                                                        }
                                                        else{
                                                        ?>

                            <div class="testimonial-thumb">
                                <img src="customer/customer_images/<?php echo $row_customer['customer_image']; ?>"
                                    alt="testimonial-thumb">
                            </div>
                            <?php
                                                        }
                                                    }
                                                ?>

                            <?php
                                            }
                                            ?>
                        </div>
                    </div>
                    <div class="testimonial-content-wrapper">
                        <div class="testimonial-content-carousel">

                            <?php
                            $get_termss = "select * from review where status='yes' and status_top='yes' LIMIT 0,1";
                            $run_termss = mysqli_query($con,$get_termss);
                            while($row_termss=mysqli_fetch_array($run_termss)){
                                $customer_email=$row_termss['customer_email'];
                                $product_id=$row_termss['product_id'];
                            ?>
                            <div class="testimonial-content">
                                <p><?php echo $row_termss['message'] ?></p>
                                <?php
                            if($row_termss['rating']==0) 
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <?php
                            }
                            else if($row_termss['rating']==1)
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <?php
                            }
                            else if($row_termss['rating']==2)
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <?php
                            }
                            else if($row_termss['rating']==3)
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <?php
                            }
                            else if($row_termss['rating']==4)
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <?php
                            }
                            else if($row_termss['rating']==5)
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div>
                                <?php
                            }
                            ?>
                                <div class="product-caption text-center pt-0">
                                    <?php
                            $get_customerss="select * from customers where customer_email='$customer_email' and customer_status='yes'";
                                $run_customers=mysqli_query($con,$get_customerss);
                                while($row_customers=mysqli_fetch_array($run_customers))
                                {
                                    ?>
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><?php echo $row_customers['customer_name']; ?></p>
                                    </div>
                                    <?php
                                }
                                if($row_termss['papage']==0)
                                {
                            $get_product="select * from products where product_id='$product_id' and product_status='yes'";
                            $run_product=mysqli_query($con,$get_product);
                            while($row_product=mysqli_fetch_array($run_product))
                            {
                                ?>
                                    <h6 class="product-name">
                                        <a
                                            href="bikes-<?php echo base64_encode($row_product['product_id']); ?>"><?php echo $row_product['product_title']; ?></a>
                                    </h6>
                                    <?php
                            }
                        }
                        if($row_termss['papage']==1)
                        {
                            $get_accessories="select * from accessories where accessories_id='$product_id' and accessories_status='yes'";
                            $run_accessories=mysqli_query($con,$get_accessories);
                            while($row_accessories=mysqli_fetch_array($run_accessories))
                            {
                                ?>
                                    <h6 class="product-name">
                                        <a
                                            href="accessories-<?php echo  base64_encode($row_accessories['accessories_id']);?>"><?php echo $row_accessories['accessories_name']; ?></a>
                                    </h6>
                                    <?php
                            }
                        }
                                ?>

                                </div>
                            </div>
                            <?php    
                        }   
                                            $count_terms = "select * from review  where status='yes' and status_top='yes'";
                                            $run_count_terms = mysqli_query($con,$count_terms);
                                            $count = mysqli_num_rows($run_count_terms);
                                            $get_terms = "select * from review where status='yes' and status_top='yes' LIMIT 1,$count";
                                            $run_terms = mysqli_query($con,$get_terms);
                                            while ($row_termss=mysqli_fetch_array($run_terms)) {
                                                $customer_email=$row_termss['customer_email'];
                                                $product_id=$row_termss['product_id'];
                                                ?>
                            <div class="testimonial-content">
                                <p><?php echo $row_termss['message'] ?></p>
                                <?php
                            if($row_termss['rating']==0) 
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <?php
                            }
                            else if($row_termss['rating']==1)
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <?php
                            }
                            else if($row_termss['rating']==2)
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <?php
                            }
                            else if($row_termss['rating']==3)
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <?php
                            }
                            else if($row_termss['rating']==4)
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <?php
                            }
                            else if($row_termss['rating']==5)
                            {
                                ?>
                                <div class="ratings">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div>
                                <?php
                            }
                            ?>
                                <div class="product-caption text-center pt-0">
                                    <?php
                            $get_customerss="select * from customers where customer_email='$customer_email' and customer_status='yes'";
                                $run_customers=mysqli_query($con,$get_customerss);
                                while($row_customers=mysqli_fetch_array($run_customers))
                                {
                                    ?>
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><?php echo $row_customers['customer_name']; ?></p>
                                    </div>
                                    <?php
                                }
                                if($row_termss['papage']==0)
                                {
                            $get_product="select * from products where product_id='$product_id' and product_status='yes'";
                            $run_product=mysqli_query($con,$get_product);
                            while($row_product=mysqli_fetch_array($run_product))
                            {
                                ?>
                                    <h6 class="product-name">
                                        <a
                                            href="bikes-<?php echo base64_encode($row_product['product_id']); ?>"><?php echo $row_product['product_title']; ?></a>
                                    </h6>
                                    <?php
                            }
                        }
                        if($row_termss['papage']==1)
                        {
                            $get_accessories="select * from accessories where accessories_id='$product_id' and accessories_status='yes'";
                            $run_accessories=mysqli_query($con,$get_accessories);
                            while($row_accessories=mysqli_fetch_array($run_accessories))
                            {
                                ?>
                                    <h6 class="product-name">
                                        <a
                                            href="accessories-<?php echo  base64_encode($row_accessories['accessories_id']);?>"><?php echo $row_accessories['accessories_name']; ?></a>
                                    </h6>
                                    <?php
                            }
                        }
                                ?>

                                </div>
                            </div>
                            <?php
                        }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial area end -->

    <!-- brand logo area start -->
    <div class="brand-logo section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                        <!-- single brand start -->
                        <?php
                            logo(); 
                            ?>
                        <!-- single brand end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo area end -->
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
</body>


</html>