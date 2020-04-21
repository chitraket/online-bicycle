<?php

$db=mysqli_connect("localhost","root","","ecom_store");

function load_state()
{
    global $db;
    $output='';
    $sqls="select * from country";
    $results=mysqli_query($db,$sqls);
    while($rows=mysqli_fetch_array($results))
    {
        $output .='<option value="'.$rows["country_id"].'">'.$rows["country_name"].'</option>';
    }
    return $output;

}

function wishlist($product_idss,$customer_emailss,$papage)
{
    global $db;
    $insert_wishlist="insert into wishlist(product_id,customer_email,papage) values('$product_idss','$customer_emailss','$papage')";
    $run_wishlist=mysqli_query($db,$insert_wishlist);
    if($run_wishlist)
    {
        if($papage==0)
        {
            ?>
        <script>window.open('bikes-details?pro_id=<?php echo base64_encode($product_idss); ?>','_self')</script> 
        <?php 
        }
        if($papage==1)
        {
            ?>
            <script>window.open('accessories-details?accessories_id=<?php echo base64_encode($product_idss);?> ','_self')</script>
            <?php   
        }
    }
}
function add_cart($p_id,$product_img,$product_qty,$product_name,$product_price,$product_size,$papage){
   if ($papage==0) {
        $product= array($product_img,$product_name,$product_price,$product_qty,$p_id,$product_size,$papage);
        $_SESSION[$product_name.$p_id]=$product;
        ?>
    <script>window.open('bikes-details?pro_id=<?php echo base64_encode($p_id); ?> ','_self')</script>
    <?php 
   }
   if($papage==1)
   {
        $product= array($product_img,$product_name,$product_price,$product_qty,$p_id,$product_size,$papage);
        $_SESSION[$product_name.$p_id]=$product;
        ?>
       <script>window.open('accessories-details?accessories_id=<?php echo base64_encode($p_id); ?> ','_self')</script>
    <?php 
   }

}

function getPro(){
    global $db;
    $get_products="select * from products where product_status_top='yes' and product_status='yes'";
    $run_products=mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products))
    {
        $pro_id=$row_products['product_id'];
        $pro_title=$row_products['product_title'];
        $pro_price=$row_products['product_price'];
        $pro_img1=$row_products['product_img1'];
        $pro_img2=$row_products['product_img2'];
        $pro_label=$row_products['product_label'];
        $pro_discount=$row_products['product_discount'];
        $pro_d_price=$row_products['product_discount_price'];
        $manufacturer_id=$row_products['manufacturer_id'];
      ?>
        <div class='product-item'>
            <figure class='product-thumb'>
                <a href='bikes-details?pro_id=<?php echo base64_encode($pro_id);?>'>
                    <img class='pri-img' src='admin_area/product_images/<?php echo $pro_img1;?>' alt='product' style='height:180px;'>
                    <?php
                    if($pro_img2=="")
                    {
                        ?>
                        <img class='sec-img' src='admin_area/product_images/<?php echo $pro_img1;?>' alt='product' style='height:180px;'>
                        <?php 
                    } 
                    else
                    {
                    ?>
                    <img class='sec-img' src='admin_area/product_images/<?php echo $pro_img2;?>' alt='product' style='height:180px;'>
                    <?php 
                    }
                    ?>
                </a>
                <div class='product-badge'>
                    <?php
                    if($pro_label=="new")
                    { 
                    ?>
                        <div class='product-label new'>
                            <span>New</span>
                        </div>
                    <?php 
                    }
                    if($pro_label=="sale")
                    {
                    ?>
                    <div class='product-label new'>
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
                <div class='product-caption text-center'>
                <div class="manufacturer-name">
                    <?php
                            $query3="select * from manufacturers where manufacturer_id='$manufacturer_id'";
                            $run_carts=mysqli_query($db, $query3);
                            while ($row_carts=mysqli_fetch_array($run_carts)) { 
                    ?>
                            <a href="bikes?manufacturer_id=<?php echo base64_encode($manufacturer_id);?>"><?php echo $row_carts['manufacturer_title']; ?></a>
                                    <?php 
                        }
                                                ?>
                                            </div>
                    <h6 class='product-name'>
                        <a href='bikes-details?pro_id=<?php echo base64_encode($pro_id);?>'><?php echo $pro_title;?></a>
                    </h6>
                    <div class='price-box'>
                        <?php
                        if($pro_label=="new") 
                        {
                        ?>
                        <span class='price-regular'>Rs.<?php echo $pro_price;?></span>
                        <?php 
                        }
                        if($pro_label=="sale")
                        {
                        ?>
                        <span class='price-regular'>Rs.<?php echo $pro_price;?></span>
                        <span class='price-old'><del>Rs.<?php echo $pro_d_price; ?></del></span>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
    </div>
        <?php
    }
    
}

function getAcc()
{
    global $db;
    $get_accessories="select * from accessories where accessories_status_top='yes' and  accessories_status='yes'";
    $run_accessories=mysqli_query($db,$get_accessories);
    while($row_accessories=mysqli_fetch_array($run_accessories))
    {
        $pro_id=$row_accessories['accessories_id'];
        $pro_title=$row_accessories['accessories_name'];
        $pro_price=$row_accessories['accessories_prices'];
        $pro_img1=$row_accessories['accessories_image_1'];
        $pro_img2=$row_accessories['accessories_image_2'];
        $pro_label=$row_accessories['accessories_label'];
        $pro_discount=$row_accessories['accessories_discount'];
        $pro_d_price=$row_accessories['accessories_discount_price'];
        $accessories_brand=$row_accessories['accessories_brand'];
        

        ?>
        <div class='product-item'>
            <figure class='product-thumb'>
                <a href='accessories-details?accessories_id=<?php echo base64_encode($pro_id);?>'>
                    <img class='pri-img' src='admin_area/accessories_images/<?php echo $pro_img1;?>' alt='product' style='height:180px;'>
                    <?php
                    if($pro_img2=="")
                    {
                        ?>
                        <img class='sec-img' src='admin_area/accessories_images/<?php echo $pro_img1;?>' alt='product' style='height:180px;'>
                        <?php
                    } 
                    else{
                    ?>
                    <img class='sec-img' src='admin_area/accessories_images/<?php echo $pro_img2;?>' alt='product' style='height:180px;'>
                    <?php
                    } 
                    ?>
                </a>
                <div class='product-badge'>
                <?php
                    if($pro_label=="new")
                    { 
                    ?>
                        <div class='product-label new'>
                            <span>New</span>
                        </div>
                    <?php 
                    }
                    if($pro_label=="sale")
                    {
                    ?>
                    <div class='product-label new'>
                            <span>Sale</span>
                        </div>
                    <div class='product-label discount'>
                        <span><?php echo $pro_discount; ?>%</span>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <!--<div class='button-group'>
                    <a href='wishlist.html' data-toggle='tooltip' data-placement='left' title='Add to wishlist'><i class='pe-7s-like'></i></a> 
                </div>-->
          </figure>
                <div class='product-caption text-center'>
                <div class="manufacturer-name">
                <?php
                            $query3="select * from accessories_brand where accessories_brand_id='$accessories_brand'";
                            $run_carts=mysqli_query($db, $query3);
                            while ($row_carts=mysqli_fetch_array($run_carts)) { 
                    ?>
                            <a href="accessories?manufacturer_id=<?php echo base64_encode($accessories_brand);?>"><?php echo $row_carts['accessories_brand']; ?></a>
                                    <?php 
                        }
                                                ?>
                </div>
                    <h6 class='product-name'>
                        <a href='accessories-details?accessories_id=<?php echo base64_encode($pro_id);?>'><?php echo$pro_title;?></a>
                    </h6>
                    <div class='price-box'>
                    <?php
                        if($pro_label=="new") 
                        {
                        ?>
                        <span class='price-regular'>Rs.<?php echo $pro_price;?></span>
                       
                        <?php 
                        }
                        if($pro_label=="sale")
                        {
                        ?>
                        <span class='price-regular'>Rs.<?php echo $pro_price;?></span>
                        <span class='price-old'><del>Rs.<?php echo $pro_d_price; ?></del></span>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
    </div>
        <?php
    }
}



function getPCats(){
    global $db;
    $sql="SELECT * FROM product_categories where p_cat_top='yes' and p_cat_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
        ?>
        <li>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class=" common_selector p_cat_id custom-control-input" id="<?php echo $row['p_cat_title']; ?>" value="<?php echo  $row['p_cat_id']; ?>"
            <?php
            if(isset($_GET['category_id']))
            {
                if(base64_decode($_GET['category_id'])==$row['p_cat_id'])
                {
                    echo "checked";
                }
            }
             ?>>
            <label class="common_selector p_cat_id custom-control-label" for="<?php echo  $row['p_cat_title']; ?>"><?php echo  $row['p_cat_title'] ?></label>
        </div>
        </li>
    <?php 
            
    }
    $sql="SELECT * FROM product_categories where p_cat_top='no' and p_cat_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
        ?>
        <li>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class=" common_selector p_cat_id custom-control-input" id="<?php echo $row['p_cat_title']; ?>" value="<?php echo $row['p_cat_id']; ?>"
            <?php
            if(isset($_GET['category_id']))
            {
                if(base64_decode($_GET['category_id'])==$row['p_cat_id'])
                {
                    echo "checked";
                }
            }
             ?>>
            <label class="common_selector p_cat_id custom-control-label" for="<?php echo  $row['p_cat_title']; ?>"><?php echo $row['p_cat_title']; ?></label>
        </div>
        </li>
        <?php 
    }
}
function getCats(){
    global $db;
    $sql="SELECT * FROM categories where cat_top='yes' and cat_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
?>
        <li>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="common_selector cat_id custom-control-input" id="<?php echo $row['cat_title'];?>" value="<?php  echo  $row['cat_id']; ?>" >
            <label class="common_selector cat_id custom-control-label" for="<?php echo  $row['cat_title']; ?>"><?php echo $row['cat_title']; ?></label>
        </div>
        </li>
    <?php
            
    }
    $sql="SELECT * FROM categories where cat_top='no' and cat_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
?>
        <li>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="common_selector cat_id custom-control-input" id="<?php echo $row['cat_title']; ?>" value="<?php echo  $row['cat_id']; ?>">
            <label class="common_selector cat_id custom-control-label" for="<?php echo $row['cat_title']; ?>"><?php echo  $row['cat_title']; ?></label>
        </div>
        </li>
        <?php 
            
    }
}

function  getAbrand(){
    global $db;
    $sql="SELECT  * FROM accessories_brand WHERE accessories_brand_top='yes' and accessories_brand_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
        ?>
    <li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class=" common_selector accessories_brand_id custom-control-input" id="<?php echo $row['accessories_brand'];?>" value="<?php echo $row['accessories_brand_id']?>"
        <?php if(isset($_GET['manufacturer_id']))
            {
                if(base64_decode($_GET['manufacturer_id'])==$row['accessories_brand_id'])
                {
                      echo "checked";  
                }
            }?> >
        <label class="common_selector accessories_brand_id custom-control-label" for="<?php echo  $row['accessories_brand']; ?>"><?php echo  $row['accessories_brand']; ?></label>
    </div>
    </li>
    <?php
    }
    $sql="SELECT DISTINCT * FROM accessories_brand WHERE accessories_brand_top='no' and accessories_brand_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
        ?>
    <li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class=" common_selector accessories_brand_id custom-control-input" id="<?php echo $row['accessories_brand']; ?>" value="<?php echo $row['accessories_brand_id'];?>"
        <?php if(isset($_GET['manufacturer_id']))
            {
                if(base64_decode($_GET['manufacturer_id'])==$row['accessories_brand_id'])
                {
                      echo "checked";  
                }
            }?>>
        <label class="common_selector accessories_brand_id custom-control-label" for="<?php echo  $row['accessories_brand']; ?>"><?php echo  $row['accessories_brand']; ?></label>
    </div>
    </li>
    <?php 
    }
}
function getAcategory(){
    global $db;
    $sql="SELECT *  FROM accessories_category WHERE accessories_category_top='yes' and accessories_category_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
        ?>
    <li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class=" common_selector accessories_category custom-control-input" id="<?php echo $row['accessories_category']; ?>" value="<?php echo  $row['accessories_category_id']; ?>"
        <?php if(isset($_GET['category_id']))
            {
                if(base64_decode($_GET['category_id'])==$row['accessories_category_id'])
                {
                      echo "checked";  
                }
            }?>>
        <label class="common_selector accessories_category custom-control-label" for="<?php echo $row['accessories_category']; ?>"><?php echo $row['accessories_category']; ?></label>
    </div>
    </li>
    <?php 
    }
    $sql="SELECT *  FROM accessories_category WHERE accessories_category_top='no' and accessories_category_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
        ?>
    <li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class=" common_selector accessories_category custom-control-input" id="<?php echo $row['accessories_category']; ?>" value="<?php echo $row['accessories_category_id']; ?>"
        <?php if(isset($_GET['category_id']))
            {
                if(base64_decode($_GET['category_id'])==$row['accessories_category_id'])
                {
                      echo "checked";  
                }
            }?>>
        <label class="common_selector accessories_category custom-control-label" for="<?php echo $row['accessories_category']; ?>">'. $row['accessories_category'].'</label>
    </div>
    </li>
    <?php
    }
}
function getMCats(){
    global $db;
    $sql="SELECT * FROM manufacturers WHERE manufacturer_top='yes' and manufacturer_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
        ?>
        <li>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class=" common_selector manufacturer_id custom-control-input" id="<?php echo $row['manufacturer_title'];?>" value="<?php echo  $row['manufacturer_id']; ?>" 
            <?php if(isset($_GET['manufacturer_id']))
            {
                if(base64_decode($_GET['manufacturer_id'])==$row['manufacturer_id'])
                {
                      echo "checked";  
                }
            }?>>
            <label class="common_selector manufacturer_id custom-control-label" for="<?php echo  $row['manufacturer_title']; ?>"><?php echo $row['manufacturer_title']; ?></label>
        </div>
        </li>
        <?php 
    }
    $sql="SELECT * FROM manufacturers WHERE manufacturer_top='no' and manufacturer_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
        ?>
        <li>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class=" common_selector manufacturer_id custom-control-input" id="<?php echo  $row['manufacturer_title']; ?>" value="<?php echo  $row['manufacturer_id'];?>"
            <?php if(isset($_GET['manufacturer_id']))
            {
                if(base64_decode($_GET['manufacturer_id'])==$row['manufacturer_id'])
                {
                      echo "checked";  
                }
            }?>>
            <label class="common_selector manufacturer_id custom-control-label" for="<?php echo  $row['manufacturer_title']; ?>"><?php echo  $row['manufacturer_title']; ?></label>
        </div>
        </li>
        <?php 
    }
}
function logo()
    {
        global $db;
        $get_logo="select * from logo where logo_status='yes'";
        $run_logo=mysqli_query($db,$get_logo);
        while ($row_logo=mysqli_fetch_array($run_logo)) {
            echo '
                <div class="brand-item">
                    <a href="#">
                        <img src="admin_area/logo/'.$row_logo['logo_img'].'" alt="">
                    </a>
                </div>
            ';
        }  
    }
?>
