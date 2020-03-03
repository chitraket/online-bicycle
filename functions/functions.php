<?php

$db=mysqli_connect("localhost","root","","ecom_store");

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR']; 
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}
function add_cart($p_id,$product_img,$product_qty,$product_name,$product_price){

    
   $product= array($product_img,$product_name,$product_price,$product_qty,$p_id);
   $_SESSION[$product_name]=$product;
   echo "<script>window.open('product-details.php?pro_id=$p_id ','_self')</script>";

}
function getPro(){
    global $db;
    $get_products="select * from products where p_cat_id='1'";
    $run_products=mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products))
    {
        $pro_id=$row_products['product_id'];
        $pro_title=$row_products['product_title'];
        $pro_price=$row_products['product_price'];
        $pro_img1=$row_products['product_img1'];
        $pro_img2=$row_products['product_img2'];
        echo"
        <div class='product-item'>
            <figure class='product-thumb'>
                <a href='product-details.php?pro_id=$pro_id'>
                    <img class='pri-img' src='admin_area/product_images/$pro_img1' alt='product' style='height:180px;'>
                    <img class='sec-img' src='admin_area/product_images/$pro_img2' alt='product' style='height:180px;'>
                </a>
                <div class='product-badge'>
                    <div class='product-label new'>
                        <span>new</span>
                    </div>
                  <!--  <div class='product-label discount'>
                        <span>10%</span>
                    </div>-->
                </div>
                <div class='button-group'>
                    <a href='wishlist.html' data-toggle='tooltip' data-placement='left' title='Add to wishlist'><i class='pe-7s-like'></i></a>
                    <a href='compare.html' data-toggle='tooltip' data-placement='left' title='Add to Compare'><i class='pe-7s-refresh-2'></i></a>
                    
                </div>
          </figure>
                <div class='product-caption text-center'>
                    <h6 class='product-name'>
                        <a href='product-details.php?pro_id=$pro_id'>$pro_title</a>
                    </h6>
                    <div class='price-box'>
                        <span class='price-regular'>Rs.$pro_price</span>
                        <span class='price-old'><del></del></span>
                    </div>
                </div>
    </div>
        ";
    }
    
}

function getPro_1(){
    global $db;
    $get_products="select * from products where p_cat_id='2'";
    $run_products=mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products))
    {
        $pro_id=$row_products['product_id'];
        $pro_title=$row_products['product_title'];
        $pro_price=$row_products['product_price'];
        $pro_img1=$row_products['product_img1'];
        $pro_img2=$row_products['product_img2'];
        echo"
        <div class='product-item'>
            <figure class='product-thumb'>
                <a href='product-details.php?pro_id=$pro_id'>
                    <img class='pri-img' src='admin_area/product_images/$pro_img1' alt='product' style='height:180px;'>
                    <img class='sec-img' src='admin_area/product_images/$pro_img2' alt='product' style='height:180px;'>
                </a>
                <div class='product-badge'>
                    <div class='product-label new'>
                        <span>new</span>
                    </div>
                  <!--  <div class='product-label discount'>
                        <span>10%</span>
                    </div>-->
                </div>
                <div class='button-group'>
                    <a href='wishlist.html' data-toggle='tooltip' data-placement='left' title='Add to wishlist'><i class='pe-7s-like'></i></a>
                    <a href='compare.html' data-toggle='tooltip' data-placement='left' title='Add to Compare'><i class='pe-7s-refresh-2'></i></a>
                    
                </div>
          </figure>
                <div class='product-caption text-center'>
                    <h6 class='product-name'>
                        <a href='product-details.php?pro_id=$pro_id'>$pro_title</a>
                    </h6>
                    <div class='price-box'>
                        <span class='price-regular'>Rs.$pro_price</span>
                        <span class='price-old'><del></del></span>
                    </div>
                </div>
    </div>
        ";
    }
    
}

function getPro_2(){
    global $db;
    $get_products="select * from products where p_cat_id='3'";
    $run_products=mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products))
    {
        $pro_id=$row_products['product_id'];
        $pro_title=$row_products['product_title'];
        $pro_price=$row_products['product_price'];
        $pro_img1=$row_products['product_img1'];
        $pro_img2=$row_products['product_img2'];
        echo"
        <div class='product-item'>
            <figure class='product-thumb'>
                <a href='product-details.php?pro_id=$pro_id'>
                    <img class='pri-img' src='admin_area/product_images/$pro_img1' alt='product' style='height:180px;'>
                    <img class='sec-img' src='admin_area/product_images/$pro_img2' alt='product' style='height:180px;'>
                </a>
                <div class='product-badge'>
                    <div class='product-label new'>
                        <span>new</span>
                    </div>
                  <!--  <div class='product-label discount'>
                        <span>10%</span>
                    </div>-->
                </div>
                <div class='button-group'>
                    <a href='wishlist.html' data-toggle='tooltip' data-placement='left' title='Add to wishlist'><i class='pe-7s-like'></i></a>
                    <a href='compare.html' data-toggle='tooltip' data-placement='left' title='Add to Compare'><i class='pe-7s-refresh-2'></i></a>
                    
                </div>
          </figure>
                <div class='product-caption text-center'>
                    <h6 class='product-name'>
                        <a href='product-details.php?pro_id=$pro_id'>$pro_title</a>
                    </h6>
                    <div class='price-box'>
                        <span class='price-regular'>Rs.$pro_price</span>
                        <span class='price-old'><del></del></span>
                    </div>
                </div>
    </div>
        ";
    }
    
}
function getPro_3(){
    global $db;
    $get_products="select * from products where p_cat_id='4'";
    $run_products=mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products))
    {
        $pro_id=$row_products['product_id'];
        $pro_title=$row_products['product_title'];
        $pro_price=$row_products['product_price'];
        $pro_img1=$row_products['product_img1'];
        $pro_img2=$row_products['product_img2'];
        echo"
        <div class='product-item'>
            <figure class='product-thumb'>
                <a href='product-details.php?pro_id=$pro_id'>
                    <img class='pri-img' src='admin_area/product_images/$pro_img1' alt='product' style='height:180px;'>
                    <img class='sec-img' src='admin_area/product_images/$pro_img2' alt='product' style='height:180px;'>
                </a>
                <div class='product-badge'>
                    <div class='product-label new'>
                        <span>new</span>
                    </div>
                  <!--  <div class='product-label discount'>
                        <span>10%</span>
                    </div>-->
                </div>
                <div class='button-group'>
                    <a href='wishlist.html' data-toggle='tooltip' data-placement='left' title='Add to wishlist'><i class='pe-7s-like'></i></a>
                    <a href='compare.html' data-toggle='tooltip' data-placement='left' title='Add to Compare'><i class='pe-7s-refresh-2'></i></a>
                    
                </div>
          </figure>
                <div class='product-caption text-center'>
                    <h6 class='product-name'>
                        <a href='product-details.php?pro_id=$pro_id'>$pro_title</a>
                    </h6>
                    <div class='price-box'>
                        <span class='price-regular'>Rs.$pro_price</span>
                        <span class='price-old'><del></del></span>
                    </div>
                </div>
    </div>
        ";
    }
    
}
function getPCats(){
    global $db;
    $get_p_cats="select * from product_categories";
    $run_p_cats=mysqli_query($db,$get_p_cats);
    while($row_p_cats=mysqli_fetch_array($run_p_cats))
    {
        $p_cat_id=$row_p_cats['p_cat_id'];
        $p_cat_title=$row_p_cats['p_cat_title'];
        echo"
        <li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title </a></li> 
        ";
    }
}
function getCats(){
    global $db;
    $get_cats="select * from categories";
    $run_cats=mysqli_query($db,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats))
    {
        $cat_id=$row_cats['cat_id'];
        $cat_title=$row_cats['cat_title'];
        echo"
       <li>
        <div class='custom-control custom-checkbox'>
            <input type='checkbox' class='custom-control-input' id='customCheck3'>
            <label class='custom-control-label' for='customCheck3'><a href='shop.php?cat=$cat_id'>$cat_title</a></label>
        </div>
        </li>
        
        ";
    }

}

function getMCats(){
    global $db;
   

}


function items()
{
    global $db;
    $ip_add=getRealIpUser();
    $get_items="select * from cart where ip_add='$ip_add'";
    $run_items=mysqli_query($db,$get_items);
    $count_items=mysqli_num_rows($run_items);
    echo $count_items;

}
function update_cart(){                            
    global $con;
    if(isset($_GET['p_id'])){
       $p_ids=$_GET['p_id'];
            
            $get_p_cats="select * from cart where p_id='$p_ids'";
            $run_p_cats=mysqli_query($con,$get_p_cats);
            while($row_p_cats=mysqli_fetch_array($run_p_cats))
            {
                $p_qty=$row_p_cats['qty'];
            }
            $querys="update products set available_qty=available_qty+$p_qty where product_id='$p_ids' ";
            $run_querys=mysqli_query($con,$querys);
            $delete_product = "delete from cart where p_id='$p_ids'"; 
            $run_delete = mysqli_query($con,$delete_product);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
                
            }   
        }
}
?>