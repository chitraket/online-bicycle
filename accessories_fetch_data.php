<?php
include('includes/db.php');
if(isset($_POST["action"]))
{
    $record_per_page = 12;  
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
  SELECT * FROM accessories  WHERE accessories_brand!='' AND accessories_status='yes'";
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND accessories_prices BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }
 if(isset($_POST["brand"]))
 {
  $brand_filter = implode("','", $_POST["brand"]);
  $query .= "
   AND accessories_brand IN('".$brand_filter."')
  ";

 }
 if(isset($_POST["ram"]))
 {
  $ram_filter = implode("','", $_POST["ram"]);
  $query .= "
   AND accessories_category IN('".$ram_filter."')
  ";
 }
 if(isset($_POST["sales"]))
 {
     $sales_filter =implode("','", $_POST["sales"]);
     $query .="
     AND accessories_label IN('".$sales_filter."')
     ";
 }
 
 $query2 = $query;
 $query.="ORDER BY available_qty DESC,accessories_id DESC LIMIT "  . $start_from."," .$record_per_page;

 $result=mysqli_query($con,$query);
 $total_count=mysqli_num_rows($result);

$outputs='';

 if (mysqli_num_rows($result)>0) {
     ?>
    <div class="shop-product-wrap grid-view row mbn-30">
    <?php
     while ($row=mysqli_fetch_assoc($result)) {
        $accessories_brand_id=$row['accessories_brand'];
            ?>
<div class="col-md-4 col-sm-6">
    <!-- product grid start -->
    <div class="product-item">
        <figure class="product-thumb">
            <a href="accessories-<?php echo base64_encode($row['accessories_id']);?>">
                <img class="pri-img" src="admin_area/accessories_images/<?php echo $row['accessories_image_1'];?>"
                    alt="product">
                <?php
                                                if($row['accessories_image_2']=="")
                                                {
                                                    ?>
                <img class="sec-img" src="admin_area/accessories_images/<?php echo $row['accessories_image_1'];?>"
                    alt="product">
                <?php 
                                                } 
                                                else{
                                                ?>
                <img class="sec-img" src="admin_area/accessories_images/<?php echo $row['accessories_image_2'];?>"
                    alt="product">
                <?php 
                                                }?>
            </a>
            <div class="product-badge">
                <?php
                                                if($row['accessories_label']=="new")
                                                { 
                                            ?>
                <div class="product-label new">
                    <span>New</span>
                </div>
                <?php
                                                }
                                                if($row['accessories_label']=="old")
                                                { 
                                            ?>
                <?php
                                                }
                                                if($row['accessories_label']=="sale")
                                                { 
                                                ?>
                <div class="product-label new">
                    <span>Sale</span>
                </div>
                <div class="product-label discount">
                    <span><?php echo $row['accessories_discount'] ?>%</span>
                </div>
                <?php 
                                                }
                                                ?>
            </div>

        </figure>
        <div class="product-caption text-center">
            <div class="manufacturer-name">
                <?php
                                            $query3="select * from accessories_brand where accessories_brand_id='$accessories_brand_id'";
                                            $run_carts=mysqli_query($con, $query3);
                                            while ($row_carts=mysqli_fetch_array($run_carts)) { 
                                            ?>
                <a
                    href="accessories_manufacturer-<?php echo base64_encode($accessories_brand_id);?>"><?php echo $row_carts['accessories_brand']; ?></a>
                <?php 
                                            }
                                                ?>
            </div>
            <h6 class="product-name">
                <a
                    href="accessories-<?php echo  base64_encode($row['accessories_id']);?>"><?php echo $row['accessories_name'];?></a>
            </h6>
            <div class="price-box">
                <?php
                                            if($row['accessories_label']=="new")
                                            { 
                                            ?>
                <span class="price-regular">Rs.<?php echo $row['accessories_prices'] ?></span>
                <?php 
                                            }
                                            if($row['accessories_label']=="old")
                                            { 
                                            ?>
                <span class="price-regular">Rs.<?php echo $row['accessories_prices'] ?></span>
                <?php 
                                            }
                                            if($row['accessories_label']=="sale")
                                            {
                                            ?>
                <span class="price-regular">Rs.<?php echo $row['accessories_prices']; ?></span>
                <span class="price-old"><del>Rs.<?php echo $row['accessories_discount_price']; ?></del></span>
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
        <h2 class="title">No Accessories Found</h2>
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
    $page_query = "SELECT * FROM accessories where accessories_status='yes'"; 
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