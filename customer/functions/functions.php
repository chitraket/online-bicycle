
<?php
$db=mysqli_connect("localhost","root","","ecom_store");

function add_cart($p_id,$product_img,$product_qty,$product_name,$product_price,$product_size,$papage){
   if ($papage==0) {
        $product= array($product_img,$product_name,$product_price,$product_qty,$p_id,$product_size,$papage);
        $_SESSION[$product_name]=$product;
       echo "<script>window.open('product-details.php?pro_id=$p_id ','_self')</script>";
   }
   if($papage==1)
   {
        $product= array($product_img,$product_name,$product_price,$product_qty,$p_id,$product_size,$papage);
        $_SESSION[$product_name]=$product;
        echo "<script>window.open('accessories-details.php?accessories_id=$p_id ','_self')</script>";
   }

}

function getPro(){
    global $db;
    
    $get_products="select * from products";
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
                    <img class='pri-img' src='assets/img/product/$pro_img1' alt='product' style='height:180px;'>
                    <img class='sec-img' src='assets/img/product/$pro_img2' alt='product' style='height:180px;'>
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
                <div class='cart-hover'>
                    <button class='btn btn-cart'>add to cart</button>
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
       <!-- <li>
        <div class='custom-control custom-checkbox'>
            <input type='checkbox' class='custom-control-input' id='customCheck2'>
            <label class='custom-control-label' for='customCheck2'>Studio (3)</label>
        </div>
        </li>-->
        <li><a href='shop.php?cat=$cat_id'>$cat_title </a></li> 
        ";
    }

}






?>