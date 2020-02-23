<?php
$active='Shop';
include("includes/header.php");
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
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">shop</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- sidebar area start -->
                    <?php
                        include("includes/sidebar.php");
                    ?>
                    <!-- sidebar area end -->
                  
                    
                    
                    <div class="col-lg-9 order-1 order-lg-2">
                   
                        <div class="shop-product-wrapper">

                        <?php 
               
                                if(!isset($_GET['p_cat'])){
                                    
                                    if(!isset($_GET['cat'])){
                                        ?>
                                        
                                        <div class="col-12">
                                            <!-- section title start -->
                                            <div class="section-title text-center">
                                                <h2 class="title">our products</h2>
                                            </div>
                                            <!-- section title start -->
                                        </div>

                                       <?php 
                                        
                                    }
                                    
                                }
                    
                        ?>
                        <?php
                                if(!isset($_GET['p_cat']))
                                    {
                                        if(!isset($_GET['cat']))
                                        {
                                            $per_page=15;
                                            if(isset($_GET['page']))
                                            {
                                                $page=$_GET['page'];
                                            }
                                            else
                                                {
                                                $page=1;
                                                }
                                                $start_from=($page-1) * $per_page;
                                                $get_products="select * from products order by 1  DESC LIMIT $start_from,$per_page";
                                                $run_products=mysqli_query($con,$get_products);
                        ?>    
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="shop-product-wrap grid-view row mbn-30">
                        <?php
                                        while($row_products=mysqli_fetch_array($run_products))
                                                {
                                                    $pro_id=$row_products['product_id'];
                                                    $pro_title=$row_products['product_title'];
                                                    $pro_price=$row_products['product_price'];
                                                    $pro_img1=$row_products['product_img1'];
                                                    $pro_img2=$row_products['product_img2'];
                                                    $pro_desc=$row_products['product_desc'];              
                        ?> 

                                <div class="col-md-4 col-sm-6">
                                    <!-- product grid start -->
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.php?pro_id=<?php echo $pro_id;?>">
                                                <img class="pri-img" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product" style="height:180px;">
                                                <img class="sec-img" src="admin_area/product_images/<?php echo $pro_img2;?>" alt="product" style="height:180px;">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <div class="cart-hover">
                                           <!-- <a href='product-details.php?pro_id=<?php echo $pro_id;?>' class='btn btn-cart'>add to cart</a>-->
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="product-details.php?pro_id=<?php echo $pro_id;?>">Platinum</a></p>
                                            </div>
                                            <h6 class="product-name">
                                                <a href="product-details.php?pro_id=<?php echo $pro_id;?>"><?php echo $pro_title;?></a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Rs.<?php echo $pro_price; ?></span>
                                                <span class="price-old"><del>Rs.50000</del></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->

                                    <!-- product list item end -->
                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.php?pro_id=<?php echo $pro_id;?>">
                                                <img class="pri-img" src="admin_area/product_images/<?php echo  $pro_img1; ?>" alt="product" style="height:180px;">
                                                <img class="sec-img" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product" style="height:180px;">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <div class="cart-hover">
                                           <!-- <a href='product-details.php?pro_id=<?php echo $pro_id;?>' class='btn btn-cart'>add to cart</a>-->
                                            </div>
                                        </figure>
                                        <div class="product-content-list">
                                            <div class="manufacturer-name">
                                                <a href="product-details.php?pro_id=<?php echo $pro_id;?>">Platinum</a>
                                            </div>

                                            <h5 class="product-name"><a href="product-details.php?pro_id=<?php echo $pro_id;?>"><?php echo $pro_title; ?></a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">Rs.<?php echo $pro_price; ?></span>
                                                <span class="price-old"><del>Rs.5000</del></span>
                                            </div>
                                            <p><?php echo $pro_desc; ?></p>
                                        </div>
                                    </div>
                                    <!-- product list item end -->
                                </div> 
                              <?php
                                                }
                              ?>
                             
                            
                        </div>
                       
                       
                         <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                <?php
                            
                                        $query="select * from products";
                                        $result=mysqli_query($con,$query);
                                        $total_records=mysqli_num_rows($result);
                                        $total_pages=ceil($total_records/$per_page);
                                        echo"
                                        <li><a class='previous' href='shop.php?page=1'><i class='pe-7s-angle-left'></i></a></li>
                                        ";
                                        for($i=1;$i<=$total_pages;$i++)
                                        {
                                            echo"
                                            <li class='active'><a href='shop.php?page=".$i."'>".$i."</a></li>
                                            ";
                                        }
                                        echo"
                                        <li><a class='next' href='shop.php?page=$total_pages'><i class='pe-7s-angle-right'></i></a></li>
                                        
                                        ";
                                                    }
                                            }
                            
                            ?>
                                </ul>
                            </div>

                    <?php
                                if(isset($_GET['p_cat']))
                                    {
                                             $p_cat_id = $_GET['p_cat'];
                                            $per_page=15;
                                            if(isset($_GET['page']))
                                            {
                                                $page=$_GET['page'];
                                            }
                                            else
                                                {
                                                $page=1;
                                                }
                                                $start_from=($page-1) * $per_page;
                                                $get_p_cat ="select * from product_categories where p_cat_id='$p_cat_id'";
                                                $run_p_cat = mysqli_query($db,$get_p_cat);
                                                $row_p_cat = mysqli_fetch_array($run_p_cat);
                                                $p_cat_title = $row_p_cat['p_cat_title'];
                                                $get_products="select * from products where p_cat_id='$p_cat_id' order by 1  DESC LIMIT $start_from,$per_page ";
                                                $run_products=mysqli_query($con,$get_products);
                                                $count = mysqli_num_rows($run_products);
        
                                                if($count==0){
                                                    ?>
                                                            <div class="col-12">
                                                            <!-- section title start -->
                                                            <div class="section-title text-center">
                                                                <h2 class="title">No Product Found In This Product Categories</h2>
                                                            </div>
                                                            <!-- section title start -->
                                                             </div>
                                                            
                                                      <?php      
            
                                                }else{
                                                    
                                                   ?>
                                                        <div class="col-12">
                                                                <!-- section title start -->
                                                                <div class="section-title text-center">
                                                                    <h2 class="title"><?php echo $p_cat_title;?></h2>
                                                                </div>
                                                                <!-- section title start -->
                                                            </div>
                                                   
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="shop-product-wrap grid-view row mbn-30">
                        <?php
                                        while($row_products=mysqli_fetch_array($run_products))
                                                {
                                                    $pro_id=$row_products['product_id'];
                                                    $pro_title=$row_products['product_title'];
                                                    $pro_price=$row_products['product_price'];
                                                    $pro_img1=$row_products['product_img1'];
                                                    $pro_img2=$row_products['product_img2'];
                                                    $pro_desc=$row_products['product_desc'];              
                        ?> 

                                <div class="col-md-4 col-sm-6">
                                    <!-- product grid start -->
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.php?pro_id=<?php echo $pro_id;?>">
                                                <img class="pri-img" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product" style="height:180px;">
                                                <img class="sec-img" src="admin_area/product_images/<?php echo $pro_img2;?>" alt="product" style="height:180px;">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                            </div>
                                           <!-- <div class="cart-hover">
                                            <a href='product-details.php?pro_id=<?php echo $pro_id;?>' class='btn btn-cart'>add to cart</a>
                                            </div>-->
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="product-details.php?pro_id=<?php echo $pro_id;?>">Platinum</a></p>
                                            </div>
                                            <h6 class="product-name">
                                                <a href="product-details.php?pro_id=<?php echo $pro_id;?>"><?php echo $pro_title;?></a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Rs.<?php echo $pro_price; ?></span>
                                                <span class="price-old"><del>Rs.5000</del></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->

                                    <!-- product list item end -->
                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.php?pro_id=<?php echo $pro_id;?>">
                                                <img class="pri-img" src="admin_area/product_images/<?php echo  $pro_img1; ?>" alt="product" style="height:180px;">
                                                <img class="sec-img" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product" style="height:180px;">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <div class="cart-hover">
                                            <!--<a href='product-details.php?pro_id= <?php echo $pro_id;?>' class='btn btn-cart'>add to cart</a>-->
                                            </div>
                                        </figure>
                                        <div class="product-content-list">
                                            <div class="manufacturer-name">
                                                <a href="product-details.php?pro_id=<?php echo $pro_id;?>">Platinum</a>
                                            </div>

                                            <h5 class="product-name"><a href="product-details.php?pro_id=<?php echo $pro_id;?>"><?php echo  $pro_title;?></a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">Rs.<?php echo $pro_price; ?></span>
                                                <span class="price-old"><del>Rs.5000</del></span>
                                            </div>
                                            <p><?php echo $pro_desc; ?></p>
                                        </div>
                                    </div>
                                    <!-- product list item end -->
                                </div> 
                              <?php
                                                }
                              ?>
                             
                            
                        </div>
                       
                       
                         <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                <?php
                            
                                        $query="select * from products";
                                        $result=mysqli_query($con,$query);
                                        $total_records=mysqli_num_rows($result);
                                        $total_pages=ceil($total_records/$per_page);
                                        echo"
                                        <li><a class='previous' href='shop.php?page=1'><i class='pe-7s-angle-left'></i></a></li>
                                        ";
                                        for($i=1;$i<=$total_pages;$i++)
                                        {
                                            echo"
                                            <li class='active'><a href='shop.php?page=".$i."'>".$i."</a></li>
                                            ";
                                        }
                                        echo"
                                        <li><a class='next' href='shop.php?page=$total_pages'><i class='pe-7s-angle-right'></i></a></li>
                                        
                                        ";
                                                    }
                            
                            ?>
                                </ul>
                            </div>
                          
                                                    <?php
                                    } 
                                                    ?>

                        <?php
                                if(isset($_GET['cat']))
                                    {
                                             $cat_id = $_GET['cat'];
                                            $per_page=15;
                                            if(isset($_GET['page']))
                                            {
                                                $page=$_GET['page'];
                                            }
                                            else
                                                {
                                                $page=1;
                                                }
                                                $start_from=($page-1) * $per_page;
                                                $get_p_cat ="select * from categories where cat_id='$cat_id'";
                                                $run_p_cat = mysqli_query($db,$get_p_cat);
                                                $row_p_cat = mysqli_fetch_array($run_p_cat);
                                                $cat_title = $row_p_cat['cat_title'];
                                                $get_products="select * from products where cat_id='$cat_id' order by 1  DESC LIMIT $start_from,$per_page ";
                                                $run_products=mysqli_query($con,$get_products);
                                                $count = mysqli_num_rows($run_products);
        
                                                if($count==0){
                                                  ?>
                                                            <div class="col-12">
                                                            <!-- section title start -->
                                                            <div class="section-title text-center">
                                                                <h2 class="title">No Product Found In This Product Categories</h2>
                                                            </div>
                                                            <!-- section title start -->
                                                             </div>
                                                            
                                                        <?php 
            
                                                }else{
                                                    ?>
                                                
                                                        <div class="col-12">
                                                                <!-- section title start -->
                                                                <div class="section-title text-center">
                                                                    <h2 class="title"><?php echo $cat_title; ?></h2>
                                                                </div>
                                                                <!-- section title start -->
                                                            </div>  
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="shop-product-wrap grid-view row mbn-30">
                        <?php
                                        while($row_products=mysqli_fetch_array($run_products))
                                                {
                                                    $pro_id=$row_products['product_id'];
                                                    $pro_title=$row_products['product_title'];
                                                    $pro_price=$row_products['product_price'];
                                                    $pro_img1=$row_products['product_img1'];
                                                    $pro_img2=$row_products['product_img2'];
                                                    $pro_desc=$row_products['product_desc'];              
                        ?> 

                                <div class="col-md-4 col-sm-6">
                                    <!-- product grid start -->
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.php?pro_id=<?php echo $pro_id;?>">
                                                <img class="pri-img" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product" style="height:180px;">
                                                <img class="sec-img" src="admin_area/product_images/<?php echo $pro_img2;?>" alt="product" style="height:180px;">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <div class="cart-hover">
                                           <!-- <a href='product-details.php?pro_id=<?php echo $pro_id;?>' class='btn btn-cart'>add to cart</a>-->
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="product-details.php?pro_id=<?php echo $pro_id;?>">Platinum</a></p>
                                            </div>
                                            <h6 class="product-name">
                                                <a href="product-details.php?pro_id=<?php echo $pro_id;?>"><?php echo $pro_title;?></a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Rs.<?php echo $pro_price; ?></span>
                                                <span class="price-old"><del>Rs.5000</del></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->

                                    <!-- product list item end -->
                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.php?pro_id=<?php echo $pro_id;?>">
                                                <img class="pri-img" src="admin_area/product_images/<?php echo  $pro_img1; ?>" alt="product" style="height:180px;">
                                                <img class="sec-img" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product" style="height:180px;">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <div class="cart-hover">
                                          <!--  <a href='product-details.php?pro_id= <?php echo $pro_id;?>' class='btn btn-cart'>add to cart</a>-->
                                            </div>
                                        </figure>
                                        <div class="product-content-list">
                                            <div class="manufacturer-name">
                                                <a href="product-details.php?pro_id=<?php echo $pro_id;?>">Platinum</a>
                                            </div>

                                            <h5 class="product-name"><a href="product-details.php?pro_id=<?php echo $pro_id;?>"><?php echo  $pro_title;?></a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">Rs.<?php echo $pro_price; ?></span>
                                                <span class="price-old"><del>Rs.5000</del></span>
                                            </div>
                                            <p><?php echo $pro_desc; ?></p>
                                        </div>
                                    </div>
                                    <!-- product list item end -->
                                </div> 
                              <?php
                                                }
                              ?>
                             
                            
                        </div>
                       
                       
                         <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                <?php
                            
                                        $query="select * from products";
                                        $result=mysqli_query($con,$query);
                                        $total_records=mysqli_num_rows($result);
                                        $total_pages=ceil($total_records/$per_page);
                                        echo"
                                        <li><a class='previous' href='shop.php?page=1'><i class='pe-7s-angle-left'></i></a></li>
                                        ";
                                        for($i=1;$i<=$total_pages;$i++)
                                        {
                                            echo"
                                            <li class='active'><a href='shop.php?page=".$i."'>".$i."</a></li>
                                            ";
                                        }
                                        echo"
                                        <li><a class='next' href='shop.php?page=$total_pages'><i class='pe-7s-angle-right'></i></a></li>
                                        
                                        ";
                                                    }
                            
                            ?>
                                </ul>
                            </div>
                          
                                                    <?php
                                    } 
                                                    ?>
                        </div> 
                       
                    </div> 
                   
                </div>
            </div>
        </div>
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
    <!-- offcanvas mini cart end -->
    <?php
     include("includes/cart1.php");
     
    ?>
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


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2019 11:22:04 GMT -->
</html>