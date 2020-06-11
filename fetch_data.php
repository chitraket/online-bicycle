<?php
include('includes/db.php');
if(isset($_POST["action"]))
{
    $record_per_page = 21;  
    $page = '';  
    $output = ''; 
    if(isset($_POST["page"]))  
    {  
         $page = $_POST["page"];  
    }  
    else  
    {  
         $page = 1;  
    }  
    $start_from = ($page - 1)*$record_per_page;  
 $query = "
  SELECT * FROM products  WHERE  manufacturer_id!='' AND product_status='yes'  ";
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }
 if(isset($_POST["brand"]))
 {
  $brand_filter = implode("','", $_POST["brand"]);
  $query .= "
   AND manufacturer_id IN('".$brand_filter."')
  ";

 }
 if(isset($_POST["ram"]))
 {
  $ram_filter = implode("','", $_POST["ram"]);
  $query .= "
   AND cat_id IN('".$ram_filter."')
  ";
 }
 if(isset($_POST["storage"]))
 {
  $storage_filter = implode("','", $_POST["storage"]);
  $query .= "
   AND p_cat_id IN('".$storage_filter."')
  ";
 }
 if(isset($_POST["colour"]))
 {
  $colour_filter = implode("','", $_POST["colour"]);
  $query .= "
   AND product_colour IN('".$colour_filter."')
  ";
 }
 if(isset($_POST["sale"]))
 {
     $sale_filter= implode("','", $_POST["sale"]);
     $query .="
     AND product_label IN('".$sale_filter."')
     ";
 }
 if(isset($_POST["size"]))
 {
  foreach($_POST["size"] as $key => $word){
    if($key==0)
    {
        $sqls='AND product_size LIKE "%'.$word.'%" AND product_status="yes"';   
    }
    else
    {
        $sqls .=' OR product_size LIKE "%'.$word.'%" AND product_status="yes"';
    }
   
    }
    $query .=$sqls;
 }
 $query2 = $query;
 $query.="ORDER BY available_qty DESC,product_id DESC LIMIT "  . $start_from."," .$record_per_page;
 $result=mysqli_query($con,$query);
 $total_count=mysqli_num_rows($result);

$outputs='';

 if (mysqli_num_rows($result)>0) {
     ?>
     <div class="shop-product-wrap grid-view row mbn-30">
     <?php
     while ($row=mysqli_fetch_assoc($result)) {
         $manufacturer_id=$row['manufacturer_id'];
         ?>
<div class="col-md-4 col-sm-6">
    <!-- product grid start -->
    <div class="product-item">
        <figure class="product-thumb">
            <a href="bikes-<?php echo base64_encode($row['product_id']);?>">
                <img class="pri-img" src="admin_area/product_images/<?php echo $row['product_img1'];?>" alt="product">
                <?php 
                                                if($row['product_img2']=="")
                                                {
                                                    ?>
                <img class="sec-img" src="admin_area/product_images/<?php echo $row['product_img1'];?>" alt="product">
                <?php 
                                                }
                                                else{
                                                ?>
                <img class="sec-img" src="admin_area/product_images/<?php echo $row['product_img2'];?>" alt="product">
                <?php
                                                } 
                                                ?>
            </a>
            <div class="product-badge">
                <?php
                                                if($row['product_label']=="new")
                                                { 
                                            ?>
                <div class="product-label new">
                    <span>New</span>
                </div>
                <?php
                                                }
                                                if($row['product_label']=="old")
                                                { 
                                                }
                                                if($row['product_label']=="sale")
                                                { 
                                                ?>
                <div class="product-label new">
                    <span>Sale</span>
                </div>
                <div class="product-label discount">
                    <span><?php echo $row['product_discount'] ?>%</span>
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
                                            $run_carts=mysqli_query($con, $query3);
                                            while ($row_carts=mysqli_fetch_array($run_carts)) { 
                                            ?>
                <a
                    href="bikes_manufacturer-<?php echo base64_encode($manufacturer_id);?>"><?php echo $row_carts['manufacturer_title']; ?></a>
                <?php 
                                            }
                                                ?>
            </div>
            <h6 class="product-name">
                <a href="bikes-<?php echo base64_encode($row['product_id']); ?>"><?php echo $row['product_title'] ?></a>
            </h6>
            <div class="price-box">
                <?php
                                            if($row['product_label']=="new")
                                            { 
                                            ?>
                <span class="price-regular">Rs.<?php echo $row['product_price'] ?></span>
                <?php 
                                            }
                                            if($row['product_label']=="old")
                                            { 
                                            ?>
                <span class="price-regular">Rs.<?php echo $row['product_price'] ?></span>
                <?php 
                                            }
                                            if($row['product_label']=="sale")
                                            {
                                            ?>
                <span class="price-regular">Rs.<?php echo $row['product_price']; ?></span>
                <span class="price-old"><del>Rs.<?php echo $row['product_discount_price']; ?></del></span>
                <?php 
                                            }
                                            ?>
            </div>
        </div>
    </div>
</div>


<?php 
     } 
     ?>
     </div>
     <?php
 }
 
else
 {
?>
<div class="col-12">
    <!-- section title start -->
    <div class="section-title text-center">
        <h2 class="title">No products Found</h2>
    </div>
    <!-- section title start -->
</div>
<style>
.paginatoin-area {
    display: none;
}
</style>
<?php 
 }

}

if (isset($_POST['firsttime']) && $_POST["firsttime"]=="0") {

    $page_query = $query2;  
    $firsttime = 0;
}
else
{
    $page_query = "SELECT * FROM products where product_status='yes'"; 
    $firsttime = 1; 
}

$page_result = mysqli_query($con, $page_query);  
$total_records = mysqli_num_rows($page_result);  
$total_pages = ceil($total_records/$record_per_page); 

?>
<div class="paginatoin-area text-center">
<ul class="pagination-box">
<li><a class='previous'><span class='pagination_link' id='1'><i class='pe-7s-angle-left'></i></span></a></li>
<?php
 for($i=1; $i<=$total_pages; $i++)  
 {  
?>
      <li class='active'>
      <a><span class='pagination_link' id='<?php echo $i ?>'><?php echo $i ?></span></a>
      <input type='hidden' value="<?php echo $firsttime; ?>" id='firsttime<?php echo $i ?>' />
      </li> 
      <?php
 } 
 ?>
<li><a class='next'><span class='pagination_link' id='<?php echo $total_pages; ?>'><i class='pe-7s-angle-right'></i></span></a></li>
 </ul>
 </div> 


