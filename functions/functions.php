<?php

$db=mysqli_connect("localhost","root","","ecom_store");

function wishlist($product_idss,$customer_emailss,$papage)
{
    global $db;
    $insert_wishlist="insert into wishlist(product_id,customer_email,papage,status) values('$product_idss','$customer_emailss','$papage','yes')";
    $run_wishlist=mysqli_query($db,$insert_wishlist);
    if($run_wishlist)
    {
        if($papage==0)
        {
            ?>
<script>
window.open('bikes-<?php echo base64_encode($product_idss); ?>', '_self')
</script>
<?php 
        }
        if($papage==1)
        {
            ?>
<script>
window.open('accessories-<?php echo base64_encode($product_idss);?> ', '_self')
</script>
<?php   
        }
    }
}

function compare($p_id,$product_name,$papage)
{
    if(isset($_SESSION['compare']))
   {
       $count=count($_SESSION['compare']);
       if($papage==0)
       {
        $product= array(
            'item_id' => $p_id,
            'item_name' => $product_name,
            'papage' => $papage
        );
        $_SESSION['compare'][$count]=$product;
        ?>
<script>
window.open('bikes-<?php echo base64_encode($p_id); ?>', '_self')
</script>
<?php
        }
        if($papage==1)
        {
            $product= array(
                'item_id' => $p_id,
                'item_name' => $product_name,
                'papage' => $papage
            );
            $_SESSION['compare'][$count]=$product;
            ?>
<script>
window.open('accessories-<?php echo base64_encode($p_id); ?>', '_self')
</script>
<?php
        }
        ?>
<?php 
   }
   else{
    $product= array(
        'item_id' => $p_id,
        'item_name' => $product_name,
        'papage' => $papage
    );
    $_SESSION['compare'][0]=$product;
    if($papage==0)
    {
        ?>
<script>
window.open('bikes-<?php echo base64_encode($p_id); ?>', '_self')
</script>
<?php
    }
    if($papage==1)
    {
        ?>
<script>
window.open('accessories-<?php echo base64_encode($p_id); ?>', '_self')
</script>
<?php
    }
    ?>
<script>
window.open('compare', '_self')
</script>
<?php
    
   }
  // print_r($_SESSION['compare']);
}

function add_cart($p_id,$product_img,$product_qty,$product_name,$product_price,$product_size,$papage){
   if(isset($_SESSION['shopping_cart']))
   {
       $count=count($_SESSION['shopping_cart']);
       if ($papage==0) {
        $product= array(
            'item_id' => $p_id,
            'item_img' => $product_img,
            'item_qty' => $product_qty,
            'item_name' => $product_name,
            'item_price' => $product_price,
            'item_size' => $product_size,
            'papage' => $papage
        );
        $_SESSION['shopping_cart'][$count]=$product;
        ?>
<script>
window.open('bikes-<?php echo base64_encode($p_id); ?> ', '_self')
</script>
<?php 
    }
    if($papage==1)
    {
            $product= array(
                    'item_id' => $p_id,
                    'item_img' => $product_img,
                    'item_qty' => $product_qty,
                    'item_name' => $product_name,
                    'item_price' => $product_price,
                    'item_size' => $product_size,
                    'papage' => $papage
            );
            $_SESSION['shopping_cart'][$count]=$product;
            ?>
<script>
window.open('accessories-<?php echo base64_encode($p_id); ?> ', '_self')
</script>
<?php 
    }

   }
   else{
    $product= array(
        'item_id' => $p_id,
        'item_img' => $product_img,
        'item_qty' => $product_qty,
        'item_name' => $product_name,
        'item_price' => $product_price,
        'item_size' => $product_size,
        'papage' => $papage
    );
    $_SESSION['shopping_cart'][0]=$product;
    if($papage==0)
    {
     ?>
<script>
window.open('bikes-<?php echo base64_encode($p_id); ?> ', '_self')
</script>
<?php    
    }
    if($papage==1)
    {
        ?>
<script>
window.open('accessories-<?php echo base64_encode($p_id); ?> ', '_self')
</script>
<?php
    }
   }

}

function getPro(){
    global $db;
    $get_products="select * from products where not available_qty=0 and product_status_top='yes' and product_status='yes' ";
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
        <a href='bikes-<?php echo base64_encode($pro_id);?>'>
            <img class='pri-img' src='admin_area/product_images/<?php echo $pro_img1;?>' alt='product'>
            <?php
                    if($pro_img2=="")
                    {
                        ?>
            <img class='sec-img' src='admin_area/product_images/<?php echo $pro_img1;?>' alt='product'>
            <?php 
                    } 
                    else
                    {
                    ?>
            <img class='sec-img' src='admin_area/product_images/<?php echo $pro_img2;?>' alt='product'>
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
                    if($pro_label=="old")
                    {

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
            <a
                href="bikes_manufacturer-<?php echo base64_encode($manufacturer_id);?>"><?php echo $row_carts['manufacturer_title']; ?></a>
            <?php 
                        }
                                                ?>
        </div>
        <h6 class='product-name'>
            <a href='bikes-<?php echo base64_encode($pro_id);?>'><?php echo $pro_title;?></a>
        </h6>
        <div class='price-box'>
            <?php
                        if($pro_label=="new") 
                        {
                        ?>
            <span class='price-regular'>Rs.<?php echo $pro_price;?></span>
            <?php 
                        }
                        if($pro_label=="old") 
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
    $get_accessories="select * from accessories where not available_qty=0 and accessories_status_top='yes' and  accessories_status='yes'";
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
        <a href='accessories-<?php echo base64_encode($pro_id);?>'>
            <img class='pri-img' src='admin_area/accessories_images/<?php echo $pro_img1;?>' alt='product'>
            <?php
                    if($pro_img2=="")
                    {
                        ?>
            <img class='sec-img' src='admin_area/accessories_images/<?php echo $pro_img1;?>' alt='product'>
            <?php
                    } 
                    else{
                    ?>
            <img class='sec-img' src='admin_area/accessories_images/<?php echo $pro_img2;?>' alt='product'>
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
                    if($pro_label=="old")
                    { 
                    ?>
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
                            $query3="select * from accessories_brand where accessories_brand_id='$accessories_brand'";
                            $run_carts=mysqli_query($db, $query3);
                            while ($row_carts=mysqli_fetch_array($run_carts)) { 
                    ?>
            <a
                href="accessories_manufacturer-<?php echo base64_encode($accessories_brand);?>"><?php echo $row_carts['accessories_brand']; ?></a>
            <?php 
                        }
                    ?>
        </div>
        <h6 class='product-name'>
            <a href='accessories-<?php echo base64_encode($pro_id);?>'><?php echo$pro_title;?></a>
        </h6>
        <div class='price-box'>
            <?php
                        if($pro_label=="new") 
                        {
                        ?>
            <span class='price-regular'>Rs.<?php echo $pro_price;?></span>
            <?php 
                        }
                        if($pro_label=="old") 
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
        <input type="checkbox" class=" common_selector p_cat_id custom-control-input"
            id="<?php echo $row['p_cat_title']; ?>" value="<?php echo  $row['p_cat_id']; ?>" <?php
            if(isset($_GET['category_id']))
            {
                if(base64_decode($_GET['category_id'])==$row['p_cat_id'])
                {
                    echo "checked";
                }
            }
             ?>>
        <label class="common_selector p_cat_id custom-control-label"
            for="<?php echo  $row['p_cat_title']; ?>"><?php echo  $row['p_cat_title'] ?></label>
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
        <input type="checkbox" class=" common_selector p_cat_id custom-control-input"
            id="<?php echo $row['p_cat_title']; ?>" value="<?php echo $row['p_cat_id']; ?>" <?php
            if(isset($_GET['category_id']))
            {
                if(base64_decode($_GET['category_id'])==$row['p_cat_id'])
                {
                    echo "checked";
                }
            }
             ?>>
        <label class="common_selector p_cat_id custom-control-label"
            for="<?php echo  $row['p_cat_title']; ?>"><?php echo $row['p_cat_title']; ?></label>
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
        <input type="checkbox" class="common_selector cat_id custom-control-input" id="<?php echo $row['cat_title'];?>"
            value="<?php  echo  $row['cat_id']; ?>">
        <label class="common_selector cat_id custom-control-label"
            for="<?php echo  $row['cat_title']; ?>"><?php echo $row['cat_title']; ?></label>
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
        <input type="checkbox" class="common_selector cat_id custom-control-input" id="<?php echo $row['cat_title']; ?>"
            value="<?php echo  $row['cat_id']; ?>">
        <label class="common_selector cat_id custom-control-label"
            for="<?php echo $row['cat_title']; ?>"><?php echo  $row['cat_title']; ?></label>
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
        <input type="checkbox" class=" common_selector accessories_brand_id custom-control-input"
            id="<?php echo $row['accessories_brand'];?>" value="<?php echo $row['accessories_brand_id']?>" <?php if(isset($_GET['manufacturer_id']))
            {
                if(base64_decode($_GET['manufacturer_id'])==$row['accessories_brand_id'])
                {
                      echo "checked";  
                }
            }?>>
        <label class="common_selector accessories_brand_id custom-control-label"
            for="<?php echo  $row['accessories_brand']; ?>"><?php echo  $row['accessories_brand']; ?></label>
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
        <input type="checkbox" class=" common_selector accessories_brand_id custom-control-input"
            id="<?php echo $row['accessories_brand']; ?>" value="<?php echo $row['accessories_brand_id'];?>" <?php if(isset($_GET['manufacturer_id']))
            {
                if(base64_decode($_GET['manufacturer_id'])==$row['accessories_brand_id'])
                {
                      echo "checked";  
                }
            }?>>
        <label class="common_selector accessories_brand_id custom-control-label"
            for="<?php echo  $row['accessories_brand']; ?>"><?php echo  $row['accessories_brand']; ?></label>
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
        <input type="checkbox" class=" common_selector accessories_category custom-control-input"
            id="<?php echo $row['accessories_category']; ?>" value="<?php echo  $row['accessories_category_id']; ?>" <?php if(isset($_GET['category_id']))
            {
                if(base64_decode($_GET['category_id'])==$row['accessories_category_id'])
                {
                      echo "checked";  
                }
            }?>>
        <label class="common_selector accessories_category custom-control-label"
            for="<?php echo $row['accessories_category']; ?>"><?php echo $row['accessories_category']; ?></label>
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
        <input type="checkbox" class=" common_selector accessories_category custom-control-input"
            id="<?php echo $row['accessories_category']; ?>" value="<?php echo $row['accessories_category_id']; ?>" <?php if(isset($_GET['category_id']))
            {
                if(base64_decode($_GET['category_id'])==$row['accessories_category_id'])
                {
                      echo "checked";  
                }
                else{
                   echo "<script>window.open('accessories','_self')</script>"; 
                }
            }?>>
        <label class="common_selector accessories_category custom-control-label"
            for="<?php echo $row['accessories_category']; ?>">'. $row['accessories_category'].'</label>
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
        <input type="checkbox" class=" common_selector manufacturer_id custom-control-input"
            id="<?php echo $row['manufacturer_title'];?>" value="<?php echo  $row['manufacturer_id']; ?>" <?php if(isset($_GET['manufacturer_id']))
            {
                if(base64_decode($_GET['manufacturer_id'])==$row['manufacturer_id'])
                {
                      echo "checked";  
                }
            }?>>
        <label class="common_selector manufacturer_id custom-control-label"
            for="<?php echo  $row['manufacturer_title']; ?>"><?php echo $row['manufacturer_title']; ?></label>
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
        <input type="checkbox" class=" common_selector manufacturer_id custom-control-input"
            id="<?php echo  $row['manufacturer_title']; ?>" value="<?php echo  $row['manufacturer_id'];?>" <?php if(isset($_GET['manufacturer_id']))
            {
                if(base64_decode($_GET['manufacturer_id'])==$row['manufacturer_id'])
                {
                      echo "checked";  
                }
            }?>>
        <label class="common_selector manufacturer_id custom-control-label"
            for="<?php echo  $row['manufacturer_title']; ?>"><?php echo  $row['manufacturer_title']; ?></label>
    </div>
</li>
<?php 
    }
}
function getcolor()
{
    global $db;
    $sql="SELECT DISTINCT product_colour FROM products where  product_status='yes'";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()) {
?>
<li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="common_selector colour custom-control-input"
            id="<?php echo $row['product_colour'];?>" value="<?php  echo  $row['product_colour']; ?>">
        <label class="common_selector colour custom-control-label"
            for="<?php echo  $row['product_colour']; ?>"><?php echo $row['product_colour']; ?></label>
    </div>
</li>
<?php
            
    }   
}
function getsize()
{

       
            ?>
<li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="common_selector size custom-control-input" id="33cms" value="33cms">
        <label class="common_selector size custom-control-label" for="33cms">33cms</label>
    </div>
</li>

<li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="common_selector size custom-control-input" id="38cms" value="38cms">
        <label class="common_selector size custom-control-label" for="38cms">38cms</label>
    </div>
</li>

<li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="common_selector size custom-control-input" id="40cms" value="40cms">
        <label class="common_selector size custom-control-label" for="40cms">40cms</label>
    </div>
</li>
<li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="common_selector size custom-control-input" id="45cms" value="45cms">
        <label class="common_selector size custom-control-label" for="45cms">45cms</label>
    </div>
</li>
<li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="common_selector size custom-control-input" id="48cms" value="48cms">
        <label class="common_selector size custom-control-label" for="48cms">48cms</label>
    </div>
</li>
<li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="common_selector size custom-control-input" id="53cms" value="53cms">
        <label class="common_selector size custom-control-label" for="53cms">53cms</label>
    </div>
</li>
<li>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="common_selector size custom-control-input" id="55cms" value="55cms">
        <label class="common_selector size custom-control-label" for="55cms">55cms</label>
    </div>
</li>
<?php
            
    }   


    function getSale()
    {
        global $db;
        $sql="SELECT DISTINCT product_label FROM products where product_label IN ('sale','new') AND product_status='yes'";
        $result=$db->query($sql);
        while ($row=$result->fetch_assoc()) {
    ?>
    <li>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="common_selector sale custom-control-input"
                id="<?php echo $row['product_label'];?>" value="<?php  echo  $row['product_label']; ?>">
            <label class="common_selector sale custom-control-label"
                for="<?php echo  $row['product_label']; ?>"><?php echo $row['product_label']; ?></label>
        </div>
    </li>
    <?php
                
        }   
    }
    function getASale()
    {
        global $db;
        $sql="SELECT DISTINCT accessories_label FROM accessories where accessories_label IN ('sale','new') AND accessories_status='yes'";
        $result=$db->query($sql);
        while ($row=$result->fetch_assoc()) {
    ?>
    <li>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="common_selector sales custom-control-input"
                id="<?php echo $row['accessories_label'];?>" value="<?php  echo  $row['accessories_label']; ?>">
            <label class="common_selector sales custom-control-label"
                for="<?php echo  $row['accessories_label']; ?>"><?php echo $row['accessories_label']; ?></label>
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
            ?>
<div class="brand-item">
    <a href="<?php echo $row_logo['logo_link']; ?>">
        <center><img src="admin_area/logo/<?php echo $row_logo['logo_img'] ?>"
                alt="<?php echo $row_logo['logo_name']; ?>"></center>
    </a>
</div>
<?php 
        }  
    }
?>