<?php
include("includes/db.php");
if (isset($_POST["accessories_id"])) {
    //echo $_POST['accessories_id'];
    $accessories_id=$_POST['accessories_id'];
    $get_accessories="select * from accessories where accessories_id=$accessories_id";
    $run_accessories=mysqli_query($con,$get_accessories);
    $row_accessories=mysqli_fetch_array($run_accessories);
   $accessories_brand=$row_accessories['accessories_brand'];
   if($accessories_brand==null)
   {
       $accessories_brand="N/A";
   }
   else{
    $accessories_brand=$row_accessories['accessories_brand'];
   }
   $accessories_material=$row_accessories['accessories_material'];
   if($accessories_material==null)
   {
       $accessories_material="N/A";
   }
   else{
    $accessories_material=$row_accessories['accessories_material'];   
   }
   $accessories_color=$row_accessories['accessories_color'];
   if($accessories_color==null)
   {
       $accessories_color="N/A";
   }
   else
   {
        $accessories_color=$row_accessories['accessories_color'];
   }
   $accessories_desc=$row_accessories['accessories_desc'];
   if($accessories_desc==null)
   {
       $accessories_desc="N/A";
   }
   else{
    $accessories_desc=$row_accessories['accessories_desc'];
   }
$get_accessories_manufacturerss = "select * from accessories_brand where accessories_brand_id='$accessories_brand'";
$run_accessories_manufacturerss = mysqli_query($con,$get_accessories_manufacturerss);

while ($row_accessories_manufacturerss=mysqli_fetch_array($run_accessories_manufacturerss)) {
    $manufacturer_accessories_ids=$row_accessories_manufacturerss['accessories_brand_id'];
    $manufacturer_accessories_titles = $row_accessories_manufacturerss['accessories_brand'];
}  

    ?>
                <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Brand</td>
                                                            <td><?php echo $manufacturer_accessories_titles; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Material</td>
                                                            <td><?php echo $accessories_material; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Color</td>
                                                            <td><?php echo $accessories_color; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>desc</td>
                                                            <td><?php echo $accessories_desc; ?></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
<?php
}
?>