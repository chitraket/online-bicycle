<?php
include("includes/db.php");
if (isset($_POST["accessories_id"])) {
    //echo $_POST['accessories_id'];
    $accessories_id=$_POST['accessories_id'];
    $get_accessories="select * from accessories where accessories_id=$accessories_id";
    $run_accessories=mysqli_query($con,$get_accessories);
    $row_accessories=mysqli_fetch_array($run_accessories);
   $accessories_brand=$row_accessories['accessories_brand'];
   $accessories_material=$row_accessories['accessories_material'];
   $accessories_color=$row_accessories['accessories_color'];
   $accessories_desc=$row_accessories['accessories_desc'];
    ?>
                <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Brand</td>
                                                            <td><?php echo $accessories_brand; ?></td>
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